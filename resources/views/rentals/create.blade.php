@extends('layouts.main')

@section('content')
<h2>Agregar Arriendo</h2>

<form action="{{ route('rentals.store') }}" method="post">
    @csrf

    // Campos para el cliente (puedes usar un dropdown para seleccionar uno existente o campos para agregar uno nuevo)
    <div>
        <label>Nombre Cliente:</label>
        <input type="text" name="first_name">
    </div>
    // ... otros campos del cliente

    // Campo para la patente del vehículo
    <div>
        <label>Patente:</label>
        <input type="text" name="vehicle_patent">
    </div>

    // Fechas de arriendo
    <div>
        <label>Fecha de inicio:</label>
        <input type="date" name="rental_start">
    </div>
    <div>
        <label>Fecha de termino:</label>
        <input type="date" name="rental_end">
    </div>

    <button type="submit">Guardar</button>
</form>
@endsection
