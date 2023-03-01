<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hojaderuta;
use App\DataTables\HojaderutaDataTable;
use Flash;
use App\User;
use Carbon\Carbon;
use RicardoPaes\Whaticket\Api;
use Illuminate\Support\Facades\Auth;
class HojaderutaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(HojaderutaDataTable $hrdt)
    {
        // return view('hojaderutas.index');
        return $hrdt->render('hojaderutas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hojaderutas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'text' => 'required',
            'start' => 'required'
        ]);
        
        Hojaderuta::create($request->all());
        Flash::success("Hoja de ruta guardado exitosamente..");

        //envio de notififacion
        if (Auth::user()->phone) {
            $api = new Api(config('settings.WHATICKET_BASEURL'), config('settings.WHATICKET_TOKEN'));
            $api->sendMessage($phone, 'Hoja de ruta guardado exitosamente..', ucfirst(config('settings.WHATICKET_WHATSAPP_ID')));    
        }
        return redirect(route('hojaderutas.index'));
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
        $hr = Hojaderuta::find($id);
        return view('hojaderutas.edit', compact('id', 'hr'));
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
        $validatedData = $request->validate([
            'name' => 'required',
            'text' => 'required',
            'start' => 'required'
        ]);
        $miedit = Hojaderuta::find($id);
        $miedit->fill($request->all())->save();
        Flash::success('Hoja de ruta actualizado exitosamente.');
        return redirect(route('hojaderutas.index'));
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
