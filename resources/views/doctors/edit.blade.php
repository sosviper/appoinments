@extends('layouts.panel')

@section('styles')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">
@endsection

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
          <div class="form-group">
            <label for="specialties">Especialidades</label>
            <select name="specialties[]" id="specialties" class="form-control selectpicker" data-style="btn-default" multiple title="Seleccione una o varias">
             @foreach ($specialties as $specialty)
               <option value="{{ $specialty->id }}">{{ $specialty->name }}</option>
             @endforeach
            </select>
          </div>
          <button type="submit" class="btn btn-primary mt-4">
            Guardar
          </button>
        </form>
      </div>
    </div>
    
@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>
  <script>
    $(document).ready(() => {
      $('#specialties').selectpicker('val', @json($specialty_ids));
    });
  </script>
@endsection
