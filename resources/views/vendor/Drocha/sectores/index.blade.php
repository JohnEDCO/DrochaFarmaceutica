@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Objetivos
@endsection

@section('main-content')
    <div class="panel panel-default">
        <div class="panel-heading">Objetivos</div>
        <div class="panel-body">

            <a href="{{ route('objetivo.create') }}" class="btn btn-info">Registrar nuevo objetivo</a>

            <!-- BUSCADOR DE TAGS -->
            {!! Form::open(['route' => 'objetivo.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
            
            <div class="input-group">
                {!! Form::text('buscar',null, ['class' => 'form-control', 'placeholder' => 'busccar objetivo...', 'aria-describedby' => 'search']) !!}
                <span class="input-group-addon" id="search">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                </span>
            </div>
            {!! Form::close() !!}
                    <!-- FIN DEL BUSCADOR -->

            @if(count($objetivos)>0)
                <table class="table table-stripped">
                    <thead>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Rol</th>
                    <th>Accion</th>
                    </thead>

                    <tbody>
                    @foreach($objetivos As $objetivo)
                        <tr>
                            <td>{{$objetivo->id}}</td>
                            <td>{{$objetivo->nombre}}</td>
                            <td>{{$objetivo->rol->nombre}}</td>                            
                            <td>
                                
                                <a href="{{route('objetivo.edit',$objetivo->id)}}" class="btn btn-warning">
                                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                </a>
                            
                                <a href="{{route('objetivo.destroy',$objetivo->id)}}" onclick=" return confirm('Desea eliminar este objetivo?')" class="btn btn-danger">
                                <span class="glyphicon glyphicon-remove" aria-hidden="true">
                                </span>
                                </a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <hr>
                <p class="bg-warning text-center">
                    No se han registrado roles
                </p>
            @endif
            {!! $objetivos->render() !!}
        </div>
    </div>
@endsection


