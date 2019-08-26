@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Roles
@endsection

@section('main-content')
    <div class="panel panel-default">
        <div class="panel-heading">Roles</div>
        <div class="panel-body">

            <a href="{{ route('rol.create') }}" class="btn btn-info">Registrar nuevo rol</a>

            <!-- BUSCADOR DE TAGS -->
            {!! Form::open(['route' => 'rol.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
            <div class="input-group">
                {!! Form::text('buscar',null, ['class' => 'form-control', 'placeholder' => 'busccar rol...', 'aria-describedby' => 'search']) !!}
                <span class="input-group-addon" id="search">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                </span>
            </div>
            {!! Form::close() !!}
                    <!-- FIN DEL BUSCADOR -->

            @if(count($roles)>0)
                <table class="table table-stripped">
                    <thead>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Habilitado</th>
                    </thead>

                    <tbody>
                    @foreach($roles As $rol)
                        <tr>
                            <td>{{$rol->id}}</td>
                            <td>{{$rol->nombre}}</td>
                            <td>{{$rol->habilitado}}</td>
                            <td>
                                <a href="{{route('rol.edit',$rol->id)}}" class="btn btn-warning">
                                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                </a>
                                <a href="{{route('rol.destroy',$rol->id)}}" onclick=" return confirm('Desea eliminar este usuario?')" class="btn btn-danger">
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
            {!! $roles->render() !!}
        </div>
    </div>
@endsection


