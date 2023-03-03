<?php

namespace App\Http\Controllers;

use App\DataTables\ComunicacionDataTable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Comunicaciones;
use App\Document;
use App\User;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use App\Hojaderuta;
use Flash;

class ComunicacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ComunicacionDataTable $mitable)
    {
        return $mitable->render('comunicaciones.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = \App\User::where("type", "Interno")->where("id", "<>", 1)->get();
        $user= \App\User::find(Auth::user()->id);
        $hr = Hojaderuta::all();
        return view('comunicaciones.create', compact('users', 'user', 'hr'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $api = new Api('WHATICKET_BASEURL', 'WHATICKET_TOKEN');
        // $api->sendMessage('NUMBER', 'Whaticket api test', 'WHATICKET_WHATSAPP_ID or null');
        
        $new = Comunicaciones::create($request->all());
        // return $request->de_id;
        $document = Document::create([
            'name' =>  'Comunicacion Interna #'.$new->id,
            'status' => config('constants.STATUS.PENDING'),
            'created_by' => Auth::id(),
            'hojaderuta' => $request->hojaderuta_id,
            'code' => $request->code,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'type' => 'Interno',
            'remitente_id' => $request->de_id
        ]);
        $new->document_id = $document->id;
        $new->save();

        //create permission for new document
        foreach (config('constants.DOCUMENT_LEVEL_PERMISSIONS') as $perm_key => $perm) {
            Permission::create(['name' => $perm_key . $document->id]);
        }

        DB::table('documents_tags')->insert([
            [
                'document_id' => $document->id, 
                'tag_id' => config('settings.com_interna_tag')
            ]
        ]);

        $miuser = User::find(Auth::id());
        $document->newActivity("Comunicacion Interna Creada por: ".$miuser->name);

        Flash::success("Nota Guardada exitosamente");
        return redirect(route('comunicaciones.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
