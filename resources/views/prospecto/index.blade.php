@extends('layouts.app')

@section('template_title')
    Prospecto
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Prospecto') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('prospectos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Agregar') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>Id</th>
                                        
										<th>Nombre del Prospecto</th>
										<th>Primer Apellido</th>
										<th>Segundo Apellido</th>
										<th>Estatus</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($prospectos as $prospecto)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $prospecto->nombre }}</td>
											<td>{{ $prospecto->apellidoP }}</td>
											<td>{{ $prospecto->apellidoM }}</td>
											<td>{{ $prospecto->estatus }}</td>

                                            <td>
                                                <form action="{{ route('prospectos.destroy',$prospecto->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('prospectos.show',$prospecto->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('prospectos.edit',$prospecto->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $prospectos->links() !!}
            </div>
        </div>
    </div>
@endsection
