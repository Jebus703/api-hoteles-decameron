<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotel = Hotel::orderBy('id','ASC')->get();
        return view('listado',[
            'hotel' => $hotel
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('modulos.hoteles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'nombre' => ['required','unique:hoteles,nombre'],
            'direccion' => 'required|min:6',
            'ciudad' => 'required|min:6',
            'nit' => ['required', 'regex:/^\d{8,15}-\d{1}$/', 'unique:hoteles,nit'],
            'cantidad' => 'required|min:1' 

        ];
      
        $validator = Validator::make($request->all(),$rules);
        
        if ($validator->fails()) {
            return redirect()->route('hotel.create')->withInput()->withErrors($validator);
        }
        try {
 
        $hotel = new Hotel();
        $hotel->nombre = $request->nombre;
        $hotel->direccion = $request->direccion;
        $hotel->ciudad = $request->ciudad;
        $hotel->nit = $request->nit;
        $hotel->max_habitaciones = $request->cantidad;
        $hotel->save();

        return redirect()->route('hotel.index')->with('success','Hotel Agregado Correctamente');
    } catch (QueryException $e) {
        if ($e->getCode() === '23505') { 
            return redirect()->route('hotel.create')
                ->withInput($request->except(['nit', 'nombre']))
                ->with('error', 'El Nombre del hotel o el NIT ingresado ya están registrados.');
        }
    

        throw $e;
    }
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Hotel $hotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hotel $hotel)
{
    return view('modulos.hoteles.editar',[
        'hotel' => $hotel
    ]);
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Hotel $hotel, Request $request)
    {
        $rules = [
            'nombre' => ['required','unique:hoteles,nombre,'. $hotel->id],
            'direccion' => 'required|min:6',
            'ciudad' => 'required|min:6',
            'nit' => ['required', 'regex:/^\d{8,15}-\d{1}$/', 'unique:hoteles,nit,'. $hotel->id],
            'cantidad' => 'required|min:1' 

        ];
      
      
        $validator = Validator::make($request->all(),$rules);
        
        if ($validator->fails()) {
            return redirect()->route('hotel.edit',$hotel)->withInput()->withErrors($validator);
        }
        try {
        $hotel->nombre = $request->nombre;
        $hotel->direccion = $request->direccion;
        $hotel->ciudad = $request->ciudad;
        $hotel->nit = $request->nit;
        $hotel->max_habitaciones = $request->cantidad;
        $hotel->save();

        return redirect()->route('hotel.index')->with('success','Hotel Actualizado Correctamente');
    } catch (QueryException $e) {
        if ($e->getCode() === '23505') { 
            return redirect()->route('hotel.create')
                ->withInput($request->except(['nit', 'nombre']))
                ->with('error', 'El Nombre del hotel o el NIT ingresado ya están registrados.');
        }
  
        throw $e;
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotel $hotel)
    {
        $hotel->delete();

        return redirect()->route('hotel.index')->with('success','Se borro el hotel correctamente');
    }
}
