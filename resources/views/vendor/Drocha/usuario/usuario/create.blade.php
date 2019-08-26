@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Crear usuario
@endsection


@section('main-content')

    <div class="panel panel-default">
        <div class="panel-heading">Crear usuario</div>
        <div class="panel-body">
            <div class="form-group">
                
                {!! Form::open(['route' => 'user.store', 'method' => 'POST']) !!}

                <div class="form-group">
                    {!! Form::label('name','Nombre') !!}
                    {!! Form::text('name',null,['class' => 'form-control', 'placeholder' => 'Nombre del usuario', 'required']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email','Correo electrónico') !!}
                    {!! Form::text('email',null,['class' => 'form-control', 'placeholder' => 'Correo electrónico', 'required']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password','Contraseña') !!}
                    {!! Form::password('password',['class' => 'form-control', 'placeholder' => '*********', 'required']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('id_rol','Rol de usuario') !!}
                    {!! Form::select('id_rol',$roles,null,['class' => 'form-control select-rol', 'placeholder' => 'seleccione una opción', 'required']) !!}
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

                    <a href="{{route('user.index')}}" class="btn btn-default ">
                          Volver
                    </a>
                </div>

                {!! Form::close() !!}
            </div>

        </div>
    </div>

@endsection
@section('js')
    <script>
        $('.select-rol').chosen({
            placeholder_text_single:"Selecciona una opción",
            no_results_text:"No se han encontrado "
        });
    </script>
@endsection


