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
    <h4 class="my-4">Lista de Categorías</h4>
    <hr />

<p>Total de arriendos en el sistema: {{ $totalRentals }}</p>
<hr />

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Categoría</th>
                <th scope="col">Número de Vehículos</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>{{ $category->vehicles_count }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
