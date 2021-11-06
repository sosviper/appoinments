@extends('layouts.panel')

@section('content')
    <div class="card shadow">
      <div class="card-header border-0">
        <div class="row align-items-center">
          <div class="col">
            <h3 class="mb-0">Editar Especialidad</h3>
          </div>
          <div class="col text-right">
            <a href="{{ url('specialties') }}" class="btn btn-sm btn-default">
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
        <form action="{{ url('specialties/'. $specialty->id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="from-group">
            <label for="name">Nombre de la Especialidad</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $specialty->name) }}">
          </div>
          <div class="from-group">
            <label for="description">Descripción</label>
            <input type="text" name="description" class="form-control" value="{{ old('description', $specialty->description) }}">
          </div>
         
          <button type="submit" class="btn btn-primary mt-4">
            Guardar
          </button>
        </form>
      </div>
    </div>
@endsection
