@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Crear rol
@endsection


@section('main-content')
 @if (count($errors)>0)
        <div class="alert alert-danger" role="alert">

       <ul>
        @foreach($errors->all() as $error)

            <li>{{ $error}}</li>

        @endforeach
        </ul>

        </div>
    @endif
    <div class="panel panel-default">
        <div class="panel-heading">Crear rol</div>
        <div class="panel-body">
            <div class="form-group">
                
                {!! Form::open(['route' => 'rol.store', 'method' => 'POST']) !!}

                <div class="form-group">
                    {!! Form::label('nombre','Nombre') !!}
                    {!! Form::text('nombre',null,['class' => 'form-control', 'placeholder' => 'Nombre del rol', 'required']) !!}
                </div>

                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('habilitado',1,true) !!}Habilitado
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::submit('Registrar',['class' => 'btn btn-primary pull-right'])!!}

                    <a href="{{route('rol.index')}}" class="btn btn-default ">
                          Volver
                    </a>
                </div>

                {!! Form::close() !!}
            </div>

        </div>
    </div>

@endsection



