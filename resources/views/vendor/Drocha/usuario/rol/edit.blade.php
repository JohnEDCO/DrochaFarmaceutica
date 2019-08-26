@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Editar rol
@endsection

@section('main-content')

  <!--  <div class="panel panel-default">
        <div class="panel-body">
            <a href="{{route('user.index')}}" class="btn btn-default">
                Volver
            </a>
        </div>
    </div>-->

    <div class="panel panel-default">
        <div class="panel-heading">Editar rol</div>
        <div class="panel-body">
            <div class="form-group">
                {!! Form::open(['route' => ['rol.update',$rol], 'method'=>'PUT']) !!}

                <div class="form-group">
                    {!! Form::label('nombre','Nombre') !!}
                    {!! Form::text('nombre',$rol->nombre,['class' => 'form-control', 'placeholder' => 'Nombre del rol', 'required']) !!}
                </div>


                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('habilitado',1,$rol->habilitado) !!}Habilitado
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::submit('Actualizar',['class' => 'btn btn-primary pull-right'])!!}

                    <a href="{{route('rol.index')}}" class="btn btn-default ">
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