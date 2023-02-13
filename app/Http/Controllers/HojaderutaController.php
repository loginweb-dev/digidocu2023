<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hojaderuta;
use App\DataTables\HojaderutaDataTable;
use Flash;
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
        Hojaderuta::create($request->all());
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
