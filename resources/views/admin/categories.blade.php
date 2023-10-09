@extends('layouts.main')

@section('main-content')
<div class="container py-4">
    <div class="d-flex justify-content-end">
        <a class="btn btn-outline-primary" href="{{ route('logout') }}">Cerrar Sesión</a>
        <a href="{{ route('rentals.create') }}" class="btn btn-primary">Agregar Nuevo Arriendo</a>

    </div>
    <h4 class="my-4">Lista de Categorías</h4>
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
