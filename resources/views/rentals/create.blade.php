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
    @if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif

    <h4>Crear nuevo arriendo</h4>
    <form action="{{ route('rentals.store') }}" method="POST">
        @csrf

        <div class="mb-3">
    <label  class="form-label">Nombre del Cliente</label>
    <input type="text" name="name"  class="form-control" required>
</div>

<div class="mb-3">
    <label class="form-label">Apellido Paterno</label>
    <input type="text" name="last_name"  class="form-control" required>
</div>

<div class="mb-3">
    <label class="form-label">Apellido Materno</label>
    <input type="text" name="second_last_name" class="form-control">
</div>

<div class="mb-3">
    <label  class="form-label">RUT</label>
    <input type="text" name="rut"  class="form-control" required>
</div>

<div class="mb-3">
    <label  class="form-label">Email</label>
    <input type="email" name="email" class="form-control" required>
</div>

        <div class="mb-3">
            <label for="vehicle_id" class="form-label">Vehículo (por patente)</label>
            <select name="vehicle_id" id="vehicle_id" class="form-control">
                @foreach($vehicles as $vehicle)
                    <option value="{{ $vehicle->id }}">{{ $vehicle->patent }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Fecha de inicio de arriendo</label>
            <input type="date" name="rental_start"  class="form-control">
        </div>

        <div class="mb-3">
            <label  class="form-label">Fecha de término de arriendo</label>
            <input type="date" name="rental_end" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Crear Arriendo</button>
    </form>
</div>
@endsection
