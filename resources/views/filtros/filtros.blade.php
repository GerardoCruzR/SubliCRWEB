@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Filtros Disponibles</h2>
    <a href="{{ route('filtros.create') }}" class="btn btn-primary mb-3">Agregar Nuevo Filtro</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo</th>
                <th>Valor</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($filtros as $filtro)
            <tr>
                <td>{{ $filtro->id }}</td>
                <td>{{ $filtro->tipo }}</td>
                <td>{{ $filtro->valor }}</td>
                <td>
                    <a href="{{ route('filtros.edit', $filtro->id) }}" class="btn btn-warning">Editar</a>

                    <form action="{{ route('filtros.destroy', $filtro->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
