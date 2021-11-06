@extends('layouts.panel')

@section('content')
    <div class="card shadow">
      <div class="card-header border-0">
        <div class="row align-items-center">
          <div class="col">
            <h3 class="mb-0">Editar Médico</h3>
          </div>
          <div class="col text-right">
            <a href="{{ url('doctors') }}" class="btn btn-sm btn-default">
              Cancelar y Volver
            </a>
          </div>
        </div>
      </div>
      <div class="card-body">  
        @if ($errors->any())
        <div class="alert alert-danger" role="alert">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        <form action="{{ url('doctors/'. $doctor->id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="from-group">
            <label for="name">Nombre de la Especialidad</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $doctor->name) }}">
          </div>
          <div class="from-group">
            <label for="email">Correo Electrónico</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $doctor->email) }}">
          </div>
          <div class="from-group">
            <label for="dni">DNI</label>
            <input type="text" name="dni" class="form-control" value="{{ old('dni', $doctor->dni) }}">
          </div>
          <div class="from-group">
            <label for="address">Dirección</label>
            <input type="text" name="address" class="form-control" value="{{ old('address', $doctor->address) }}">
          </div>
          <div class="from-group">
            <label for="phone">Teléfono / Móvil</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone', $doctor->phone) }}">
          </div>
          <div class="from-group">
            <label for="password">Contraseña</label>
            <input type="text" name="password" class="form-control" value="{{ str_random(6), $doctor->password }}">
            <p>Ingrese un valor sólo si desee modificar la contraseña</p>
          </div>
         
          <button type="submit" class="btn btn-primary mt-4">
            Guardar
          </button>
        </form>
      </div>
    </div>
@endsection
