<?php

namespace App\Http\Controllers;

use App\DataTables\RegistroDataTable;
use App\Models\Registro;
use App\Models\Tipo;
use App\Models\Ubicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(RegistroDataTable $dataTable)
    {
        return $dataTable->render('registro.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipo=Tipo::get();
        return view('registro.create',['tipos'=>$tipo]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
        $rg_decimal="/^[0-9,]+(\.\d{0,2})?$/";
        $request->validate([
            'ubicacion'=>'required',
            'troza'=>'required|numeric|gt:0|regex:'.$rg_decimal,
            'carga'=>'required|numeric|gt:0|regex:'.$rg_decimal,
            'altura_a_1'=>'nullable|numeric|gte:0|regex:'.$rg_decimal,
            'altura_a_2'=>'nullable|numeric|gte:0|regex:'.$rg_decimal,
            'altura_a_3'=>'nullable|numeric|gte:0|regex:'.$rg_decimal,
            'altura_a_4'=>'nullable|numeric|gte:0|regex:'.$rg_decimal,
            'altura_a_5'=>'nullable|numeric|gte:0|regex:'.$rg_decimal,
            'altura_a_6'=>'nullable|numeric|gte:0|regex:'.$rg_decimal,
            'altura_a_7'=>'nullable|numeric|gte:0|regex:'.$rg_decimal,
            'altura_b_1'=>'nullable|numeric|gte:0|regex:'.$rg_decimal,
            'altura_b_2'=>'nullable|numeric|gte:0|regex:'.$rg_decimal,
            'altura_b_3'=>'nullable|numeric|gte:0|regex:'.$rg_decimal,
            'altura_b_4'=>'nullable|numeric|gte:0|regex:'.$rg_decimal,
            'altura_b_5'=>'nullable|numeric|gte:0|regex:'.$rg_decimal,
            'altura_b_6'=>'nullable|numeric|gte:0|regex:'.$rg_decimal,
            'altura_b_7'=>'nullable|numeric|gte:0|regex:'.$rg_decimal,
        ]);
        $request['ubicacion_id']=$request->ubicacion;
        $r=Registro::create($request->all());
        Session::flash('success','Registro ingresado.');
        return redirect()->route('registro.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Registro $registro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Registro $registro)
    {
        $tipo=Tipo::get();
        return view('registro.edit',['tipos'=>$tipo,'registro'=>$registro]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Registro $registro)
    {
        $request['ubicacion_id']=$request->ubicacion;
        $reg=$registro->update($request->all());
        $this->procesarCalculos($registro);
        Session::flash('success','Registro actualizado.');
        return redirect()->route('registro.index');

    }

    public function procesarCalculos($registro) {
        $registro->promedio=
        $registro->altura_a_1+
        $registro->altura_a_2+
        $registro->altura_a_3+
        $registro->altura_a_4+
        $registro->altura_a_5+
        $registro->altura_a_6+
        $registro->altura_a_7;
        $registro->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Registro $registro)
    {
        try {
            $registro->delete();
            Session::flash('success','Registro eliminado.');
        } catch (\Throwable $th) {
            Session::flash('success','Registro no eliminado.');
        }
        return redirect()->route('registro.index');
    }

    public function obtenerUbicaciones($id) {
        $Ubicaciones=Ubicacion::where('tipo_id',$id)->get();
        return $Ubicaciones;
    }
}
