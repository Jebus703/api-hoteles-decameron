<?php

namespace App\Http\Controllers;

use App\Models\habitaciones;
use App\Models\Hotel;
use App\Models\HotelHabitacion;
use App\Models\reservas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReservasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($hotel_id)
    {
        // Obtener la información del hotel
        $hotel = Hotel::findOrFail($hotel_id);
        
        // Sumar la cantidad de habitaciones ya reservadas (desde la vista)
        $totalReservas = reservas::where('hotel_id', $hotel_id)->sum('cantidad');
    
        // Comparar las habitaciones reservadas con la capacidad máxima
        $mensaje = null;
        if ($totalReservas >= $hotel->max_habitaciones) {
            $mensaje = "El hotel '{$hotel->nombre}' ha alcanzado la capacidad máxima de habitaciones.";
        }
    
        // Consultar las reservas
        $reservas = reservas::where('hotel_id', $hotel_id)->get();
    
        // Pasar las reservas, el mensaje, y la información del hotel a la vista de Blade
        return view('modulos.reservas.index', compact('reservas', 'mensaje', 'hotel'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create($hotel_id)
    {
    // Obtener la información del hotel para verificar o mostrar datos relacionados
    $hotel = Hotel::findOrFail($hotel_id);
        // Obtener la lista de tipos de habitaciones
        $habitaciones = habitaciones::all();


    // Pasar el ID del hotel y la información del hotel a la vista de creación
    return view('modulos.reservas.creater', compact('hotel','habitaciones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'hotel_id' => 'required|exists:hoteles,id',
            'tipo_habitacion' => 'required|exists:habitaciones,id',
            'cantidad' => 'required|integer|min:1',
        ]);
      
 
        $reserva = new HotelHabitacion();
        $reserva->hotel_id = $request->hotel_id;
        $reserva->habitacion_id = $request->tipo_habitacion; 
        $reserva->cantidad = $request->cantidad;
        $reserva->save();

    return redirect()->route('reserva.index', ['hotel_id' => $request->hotel_id])
                     ->with('success', 'Reserva agregada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(reservas $reservas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(reservas $reservas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, reservas $reservas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(reservas $reservas)
    {
        //
    }
}
