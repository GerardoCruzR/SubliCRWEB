@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Documentación de {{ $truck->modelo }}</h1>

    @if ($documentos && count($documentos) > 0)
        <ul>
            @foreach ($documentos as $index => $documento)
                <li>
                    <a href="data:application/octet-stream;base64,{{ $documento }}" download="documento_{{ $index + 1 }}">Descargar Documento {{ $index + 1 }}</a>
                </li>
            @endforeach
        </ul>
    @else
        <p>No hay documentos disponibles.</p>
    @endif
</div>
@endsection
