@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Crear usuario
@endsection


@section('main-content')

 <div class="panel panel-default">
        <div class="panel-heading">Crear usuario</div>
        <div class="panel-body">

    <div class="form-group">
        {!! Form::open(['route' => 'objetivo.store', 'method' => 'POST']) !!}

    <div class="panel panel-default">
        <div class="panel-heading">Objetivo</div>
        <div class="panel-body">
            
                  <div class="form-group">
                    {!! Form::text('nombreIndicador',null,['class' => 'form-control', 'placeholder' => 'nombre objetivo', 'required']) !!}
                </div>
              
        </div>
    </div>   
              
    <div class="panel panel-default">
        <div class="panel-heading">Indicadores</div>
        <div class="panel-body">
            
                <div class="form-group">
                    {!! Form::text('nombreIndicador',null,['class' => 'form-control', 'placeholder' => 'nombre indicador', 'required']) !!}
                </div>
              
        </div>
    </div> 

    <div class="panel panel-default">
        <div class="panel-heading">Metas</div>
        <div class="panel-body">
            
                <div class="form-group">
                    {!! Form::text('nombreMeta',null,['class' => 'form-control', 'placeholder' => 'nombre meta', 'required']) !!}
                </div>
              
        </div>
    </div>                 

    <div class="panel panel-default">
        <div class="panel-heading">Iniciativas</div>
        <div class="panel-body">
            
                <div class="form-group">
                    {!! Form::text('nombreIniciativa',null,['class' => 'form-control', 'placeholder' => 'nombre iniciativa', 'required']) !!}
                </div>
              
        </div>
    </div>  
                <div class="form-group">
                    {!! Form::submit('Registrar',['class' => 'btn btn-primary pull-right'])!!}

                    <a href="{{route('objetivo.index_objetivos')}}" class="btn btn-default ">
                          Volver
                    </a>
                </div>

                {!! Form::close() !!}
            </div>

        </div>
    </div>

    </div>
</div>
@endsection
