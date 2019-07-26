@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Editar usuario
@endsection

@section('main-content')

    <div class="panel panel-default">
        <div class="panel-heading">Editar usuario</div>
        <div class="panel-body">
            <div class="form-group">
                {!! Form::open(['route' => ['user.perfil.actualizar',$user], 'method'=>'PUT']) !!}

                <div class="form-group">
                    {!! Form::label('name','Nombre') !!}
                    {!! Form::text('name',$user->name,['class' => 'form-control', 'placeholder' => 'Nombre del usuario', 'required']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email','Correo electrónico') !!}
                    {!! Form::text('email',$user->email,['class' => 'form-control', 'placeholder' => 'Correo electrónico', 'required']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password','Actualizar contraseña') !!}
                    {!! Form::password('password',['class' => 'form-control', 'placeholder' => '*********']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Actualizar',['class' => 'btn btn-primary'])!!}
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