@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Usuarios
@endsection

@section('main-content')
    <div class="panel panel-default">
        <div class="panel-heading">Usuarios</div>
        <div class="panel-body">

            <a href="{{ route('user.create') }}" class="btn btn-info">Registrar nuevo usuario</a>

            <!-- BUSCADOR DE TAGS -->
            {!! Form::open(['route' => 'user.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
            <div class="input-group">
                {!! Form::text('buscar',null, ['class' => 'form-control', 'placeholder' => 'busccar usuario...', 'aria-describedby' => 'search']) !!}
                <span class="input-group-addon" id="search">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                </span>
            </div>
            {!! Form::close() !!}
                    <!-- FIN DEL BUSCADOR -->

            @if(count($usuarios)>0)
                <table class="table table-stripped">
                    <thead>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Habilitado</th>
                    </thead>

                    <tbody>
                    @foreach($usuarios As $usuario)
                        <tr>
                            <td>{{$usuario->id}}</td>
                            <td>{{$usuario->name}}</td>
                            <td>{{$usuario->email}}</td>
                            <td>{{$usuario->rol->nombre}}</td>
                            <td>{{$usuario->habilitado}}</td>
                            <td>
                                <a href="{{route('user.edit',$usuario->id)}}" class="btn btn-warning">
                                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                </a>
                                <a href="{{route('user.destroy',$usuario->id)}}" onclick=" return confirm('Desea eliminar este usuario?')" class="btn btn-danger">
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
            {!! $usuarios->render() !!}
        </div>
    </div>
@endsection


