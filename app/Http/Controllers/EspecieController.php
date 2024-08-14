<?php

namespace App\Http\Controllers;

use App\Especie;
use Illuminate\Http\Request;
use App\Http\Requests\EspecieRequest;

class EspecieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $especies = Especie::all();
        return view('especies.index', compact('especies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('especies.create');
    }

    /**
     * Store a newly created  in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EspecieRequest $request)
    {
        $especie = new Especie();
        $especie->nome = $request->nome;
        $especie->save();
        return redirect('/especie');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Especie  $especie
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $especie = Especie::findOrFail($id);
        return view('especies.show', compact('especie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Especie  $especie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $especie = Especie::findOrFail($id);
        return view('especies.edit', compact('especie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Especie  $especie
     * @return \Illuminate\Http\Response
     */
    public function update(EspecieRequest $request, $id)
    {
        $especie = Especie::findOrFail($id);
        $especie->nome = $request->nome;
        $especie->save();
        return redirect('/especie');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Especie  $especie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $especie = Especie::findOrFail($id);
        $especie->delete();
        return redirect('/especie');
    }
}
