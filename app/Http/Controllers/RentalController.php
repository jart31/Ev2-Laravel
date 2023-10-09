<?php

namespace App\Http\Controllers;
use App\Models\Rental;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function create()
    {
        $vehicles = Vehicle::all();
        return view('rentals.create', compact('vehicles'));
    }
    public function index()
    {
        $rentals = Rental::all();
        return view('rentals.index', compact('rentals'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'last_name' => 'required|string',
            'second_last_name' => 'required|string',
            'rut' => 'required|unique:rentals,rut',
            'email' => 'required|email',
            'vehicle_id' => 'required|exists:vehicles,id',
            'rental_start' => 'required|date',
            'rental_end' => 'required|date|after_or_equal:rental_start'
        ]);

        $data = $request->validate([
            // ... tus otras reglas de validación ...
            'vehicle_id' => ['required', 'exists:vehicles,id', function ($attribute, $value, $fail) use ($request) {
                $overlap = Rental::where('vehicle_id', $value)
                                 ->where(function($query) use ($request) {
                                     $query->whereBetween('rental_start', [$request->rental_start, $request->rental_end])
                                           ->orWhereBetween('rental_end', [$request->rental_start, $request->rental_end]);
                                 })
                                 ->exists();

                if ($overlap) {
                    $fail('El vehículo ya está arrendado en las fechas seleccionadas.');
                }
            }],
        ]);


        $rental = Rental::create($request->all());
        return redirect()->route('rentals.index')->with('success', 'Arriendo creado exitosamente.');

    }
    public function destroy($id) {
        $rental = Rental::findOrFail($id);
        $rental->delete();  // Esto realizará un soft delete debido al trait SoftDeletes en tu modelo.
    
        return redirect()->route('rentals.index')->with('success', 'Arriendo eliminado exitosamente');
    }
}
