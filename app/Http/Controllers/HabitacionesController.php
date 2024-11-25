<?php

namespace App\Http\Controllers;

use App\Models\habitaciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HabitacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexh()
    {
        $habitaciones= habitaciones::orderBy('id','ASC')->get();
        return view('modulos.modhabi.listadoh',[
            'habitaciones' =>  $habitaciones
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createh()
    {
        return view('modulos.modhabi.createh');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeh(Request $request)
    {
        $rules = [
            'tipo_habitacion' => 'required|min:2',
            'acomodacion' => 'required|min:2',
        ];
      
        $validator = Validator::make($request->all(),$rules);
        
        if ($validator->fails()) {
            return redirect()->route('habitacion.create')->withInput()->withErrors($validator);
        }
      
 
        $habitaciones = new habitaciones();
        $habitaciones->tipo_habitacion = $request->tipo_habitacion;
        $habitaciones->acomodacion = $request->acomodacion;
        $habitaciones->save();

        return redirect()->route('habitacion.index')->with('success','Habitacion Agregada Correctamente');
  
    }

    /**
     * Display the specified resource.
     */
    public function showh(habitaciones $habitaciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edith(habitaciones  $habitaciones)
    {
        return view('modulos.modhabi.editarh',[
            'habitaciones' => $habitaciones
        ]);
        $validator = Validator::make($request->all(),$rules);
        
        if ($validator->fails()) {
            return redirect()->route('habitacion.edit',$habitaciones)->withInput()->withErrors($validator);
        }
        $habitaciones = new habitaciones();
        $habitaciones->tipo_habitacion = $request->tipo_habitacion;
        $habitaciones->acomodacion = $request->acomodacion;
        $habitaciones->save();
        
        return redirect()->route('habitacion.index')->with('success','Habitacion Actualizada Correctamente');

    }

    /**
     * Update the specified resource in storage.
     */
    public function updateh(Request $request, habitaciones $habitaciones)
    {
        $rules = [
            'tipo_habitacion' => 'required|min:2',
            'acomodacion' => 'required|min:2',
        ];
      
      
        $validator = Validator::make($request->all(),$rules);
        
        if ($validator->fails()) {
            return redirect()->route('habitacion.edit',$habitaciones)->withInput()->withErrors($validator);
        }

            $habitaciones->tipo_habitacion = $request->tipo_habitacion;
            $habitaciones->acomodacion = $request->acomodacion;
            $habitaciones->save();

        return redirect()->route('habitacion.index')->with('success','Habitacion Actualizada Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyh(habitaciones $habitaciones)
    {
        $habitaciones->delete();

        return redirect()->route('habitacion.index')->with('success','Se borro la habitaciones correctamente');
    }
}
