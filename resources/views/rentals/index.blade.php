@extends('layouts.main')

@section('main-content')
<div class="container py-4">
<div class="d-flex justify-content-end">
    <a class="btn btn-primary my-4 mx-2" href="{{ route('home') }}">Home</a>
    <a class="btn btn-primary my-4 mx-2" href="{{ route('categories.index') }}">Ver Categorías</a>
    <a href="{{ route('rentals.create') }}" class="btn btn-primary my-4 mx-2">Nuevo Arriendo</a>
    <a href="{{ route('rentals.index') }}" class="btn btn-primary my-4 mx-2">Arriendos</a>
    <a class="btn btn-outline-primary my-4" href="{{ route('logout') }}">Cerrar Sesión</a>
</div>

    <h4>Lista de Arriendos</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>RUT</th>
                <th>Patente</th> <!-- Columna añadida -->
                <th>Entrega</th>
                <th>Devolución</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rentals as $rental)
            <tr>
                <td>{{ $rental->name }}</td>
                <td>{{ $rental->last_name }}</td>
                <td>{{ $rental->rut }}</td>
                <td>{{ $rental->vehicle->patent }}</td> <!-- Patente del vehículo -->
                <td>{{$rental->rental_start}}</td>
                <td>{{$rental->rental_end}}</td>
                <td>
                <form action="{{ route('rentals.destroy', $rental->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de querer eliminar este arriendo?');">Eliminar</button>
    </form>    <!-- Aquí puedes agregar botones para acciones como eliminar -->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
