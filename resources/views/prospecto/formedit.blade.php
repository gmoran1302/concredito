
<div class="box box-info padding-1">
    <div class="box-body">
        
            <div class="col-md-8">
                <div class="card">
                   
        <div class="form-group">
            {{ Form::label('nombre') }}  
            {{ Form::text('nombre', $prospecto->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre', 'readonly']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('apellidoP') }}
            {{ Form::text('apellidoP', $prospecto->apellidoP, ['class' => 'form-control' . ($errors->has('apellidoP') ? ' is-invalid' : ''), 'placeholder' => 'Apellidop', 'readonly']) }}
            {!! $errors->first('apellidoP', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('apellidoM') }}
            {{ Form::text('apellidoM', $prospecto->apellidoM, ['class' => 'form-control' . ($errors->has('apellidoM') ? ' is-invalid' : ''), 'placeholder' => 'Apellidom', 'readonly']) }}
            {!! $errors->first('apellidoM', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('calle') }}
            {{ Form::text('calle', $prospecto->calle, ['class' => 'form-control' . ($errors->has('calle') ? ' is-invalid' : ''), 'placeholder' => 'Calle', 'readonly']) }}
            {!! $errors->first('calle', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('num') }}
            {{ Form::text('num', $prospecto->num, ['class' => 'form-control' . ($errors->has('num') ? ' is-invalid' : ''), 'placeholder' => 'Num', 'readonly']) }}
            {!! $errors->first('num', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('col') }}
            {{ Form::text('col', $prospecto->col, ['class' => 'form-control' . ($errors->has('col') ? ' is-invalid' : ''), 'placeholder' => 'Col', 'readonly']) }}
            {!! $errors->first('col', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cp') }}
            {{ Form::text('cp', $prospecto->cp, ['class' => 'form-control' . ($errors->has('cp') ? ' is-invalid' : ''), 'placeholder' => 'Cp', 'readonly']) }}
            {!! $errors->first('cp', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tel') }}
            {{ Form::text('tel', $prospecto->tel, ['class' => 'form-control' . ($errors->has('tel') ? ' is-invalid' : ''), 'placeholder' => 'Tel', 'readonly']) }}
            {!! $errors->first('tel', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('rfc') }}
            {{ Form::text('rfc', $prospecto->rfc, ['class' => 'form-control' . ($errors->has('rfc') ? ' is-invalid' : ''), 'placeholder' => 'Rfc', 'readonly']) }}
            {!! $errors->first('rfc', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div>
<strong>Estatus</strong>
@php($status = ['Enviado','Autorizado','Rechazado'])
<select name="estatus" class="form-control">
<option class="hidden"  disabled >Status</option>
@foreach($status as $sta)
<option @if($prospecto -> estatus == $sta ) 
selected
    @endif
</option>{{$sta}}</option>
@endforeach
</select>

</div>
<div>
@if ( $status == 'Rechazado' )
        <div class="form-group">
            <strong>Observaciones</strong>
            {{ Form::textarea('obse', $prospecto->obse, ['class' => 'form-control' . ($errors->has('obse') ? ' is-invalid' : ''), 'placeholder' => 'Observacion']) }}
            {!! $errors->first('obse', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        @endif
</div> 

    </div>
            </div>
 
  
 </div>
  <br>
            <div class="col-md-6 ">
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
                                <td>{{$loop->iteration }}</td>
                                <td>{{ $documento->nombre_document }}</td>
                                <td><a class="btn btn-danger" href="{{ $documento->url_document }}" target="_blank"> Ver</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
</div>
  
<br>
    <div class="d-grid gap-2 d-md-block">
      <a class="btn btn-danger" href="{{ route('prospectos.index') }}"> Regresar</a>
      <button type="submit" class="btn btn-success"> Enviar</button>
    </div>
</div>
