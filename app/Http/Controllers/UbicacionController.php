<?php

namespace App\Http\Controllers;

use App\DataTables\UbicacionDataTable;
use App\Models\Tipo;
use App\Models\Ubicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UbicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UbicacionDataTable $dataTable)
    {
      return  $dataTable->render('ubicacion.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('ubicacion.create',['tipos'=>Tipo::get()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request['tipo_id']=$request->tipo;
        Ubicacion::create($request->all());
        Session::flash('success','Ubicacion ingresado.');
        return redirect()->route('ubicaciones.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ubicacion $ubicacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $ubicacion)
    {
        $u=Ubicacion::find($ubicacion);
        return view('ubicacion.edit',['u'=>$u,'tipos'=>Tipo::get()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $ubicacion)
    {
        $u=Ubicacion::find($ubicacion);
        $u->nombre=$request->nombre;
        $u->tipo_id=$request->tipo;
        $u->save();
        Session::flash('success','Ubicación actualizado');
        return redirect()->route('ubicaciones.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($request)
    {
        
        try {
            $ubicacion=Ubicacion::find($request);
            $ubicacion->delete();
            Session::flash('success','Ubicación eliminado');
        } catch (\Throwable $th) {
            Session::flash('info','Ubicación no eliminado');
        }
        return redirect()->route('ubicaciones.index');
    }
}
