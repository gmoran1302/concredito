@extends('layouts.app')

@section('template_title')
    {{ $prospecto->name ?? 'Show Prospecto' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Prospecto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-danger" href="{{ route('prospectos.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $prospecto->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Apellidop:</strong>
                            {{ $prospecto->apellidoP }}
                        </div>
                        <div class="form-group">
                            <strong>Apellidom:</strong>
                            {{ $prospecto->apellidoM }}
                        </div>
                        <div class="form-group">
                            <strong>Calle:</strong>
                            {{ $prospecto->calle }}
                        </div>
                        <div class="form-group">
                            <strong>Num:</strong>
                            {{ $prospecto->num }}
                        </div>
                        <div class="form-group">
                            <strong>Col:</strong>
                            {{ $prospecto->col }}
                        </div>
                        <div class="form-group">
                            <strong>Cp:</strong>
                            {{ $prospecto->cp }}
                        </div>
                        <div class="form-group">
                            <strong>Tel:</strong>
                            {{ $prospecto->tel }}
                        </div>
                        <div class="form-group">
                            <strong>Rfc:</strong>
                            {{ $prospecto->rfc }}
                        </div>
                        <div class="form-group">
                            <strong>Obse:</strong>
                            {{ $prospecto->obse }}
                        </div>
                        <div class="form-group">
                            <strong>Estatus:</strong>
                            {{ $prospecto->estatus }}
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Lista de Documentos</span>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre Documento</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($documentos as $documento)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $documento->nombre_document }}</td>
                                <td><a class="btn btn-danger" href="{{ $documento->url_document }}" target="_blank"> Ver</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
</div>
            </div>
        </div>
    </section>
@endsection
