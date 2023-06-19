<?php

namespace App\Http\Controllers;

use App\DataTables\TipoDataTable;
use App\Models\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TipoDataTable $dataTable)
    {
        return $dataTable->render('tipos.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tipos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Tipo::create($request->all());
        Session::flash('success','Tipo ingresado.');
        return redirect()->route('tipos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tipo $tipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tipo $tipo)
    {
        return view('tipos.edit',['tipo'=>$tipo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tipo $tipo)
    {
        $tipo->update($request->all());
        Session::flash('success','Tipo actualizado.');
        return redirect()->route('tipos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tipo $tipo)
    {
        try {
            $tipo->delete();
            Session::flash('success','Tipo eliminado');
        } catch (\Throwable $th) {
            Session::flash('info','Tipo no eliminado');
        }
        return redirect()->route('tipos.index');

    }
}
