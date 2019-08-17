@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Editar usuario
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
        <div class="panel-heading">Editar objetivo</div>
        <div class="panel-body">
            <div class="form-group">
                {!! Form::open(['route' => ['objetivo.update',$objetivo], 'method'=>'PUT']) !!}

                <div class="panel panel-default">
                 <div class="panel-heading">Objetivo</div>
                    <div class="panel-body">
            
                        <div class="form-group">
                        {!! Form::label('nombreObjetivo','Nombre') !!}
                        {!! Form::text('nombreObjetivo',$objetivo->nombre,['class' => 'form-control', 'placeholder' => 'Nombre objetivo', 'required']) !!}
                        {!! Form::hidden('nombreObjetivoH',$objetivo->id) !!}
                         </div>
                  
                    </div>
                </div>   

                <div class="panel panel-default">
                    <div class="panel-heading">Indicadores</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="row"> 
                             @foreach($objetivo->Indicadores As $indicador)
                                <div class="col-sm-10" id="remInputIndicador">
                                    <br/>
                                    {!! Form::text('nombreIndicadorY[]',$indicador->nombre,['class' => 'form-control', 'placeholder' => 'Nombre del usuario', 'required']) !!}
                                    {!! Form::hidden('nombreIndicadorH[]',$indicador->id) !!}
                                </div>
                                

                                <div class="col-sm-2" ><br/>

                                <a href="{{route('indicador.destroy',[$indicador->id, $indicador->id_objetivo])}}" onclick=" return confirm('Desea eliminar este usuario?')" class="btn btn-danger" size="20"  >
                                    <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                                    Remover
                                </a></div>
                             @endforeach    

                                <div id="dynamicDivIndicador">

                                 </div>
                            </div>
                <!-- Adiccionar campo boton-->
                <!-- parte superior-->  

                    </div>
                    <br/>
                    <a class="btn btn-success pull-right" href="javascript:void(0)" id="addInputIndicador">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                      Adicionar Campo 
                    </a>
                     <!--Fin Adiccionar campo boton-->
                        </div>

                    </div>

                <div class="panel panel-default">
                    <div class="panel-heading">Metas</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="row"> 

                             @foreach($objetivo->Metas As $meta)

                                <div class="col-sm-10" >
                                    <br/>
                                    {!! Form::text('nombreMetaY[]',$meta->nombre,['class' => 'form-control', 'placeholder' => 'Nombre del usuario', 'required']) !!}
                                    {!! Form::hidden('nombreMetaH[]',$meta->id) !!}
                                </div>
                                

                                <div class="col-sm-2" ><br/>

                                <a href="#" onclick=" return confirm('Desea eliminar este usuario?')" class="btn btn-danger" size="20"  >
                                    <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                                    Remover
                                </a></div>
                             @endforeach    

                                <div id="dynamicDivMeta">

                                 </div>
                            </div>
                <!-- Adiccionar campo boton-->
                <!-- parte superior-->  

                    </div>
                    <br/>
                    <a class="btn btn-success pull-right" href="javascript:void(0)" id="addInputMeta">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                      Adicionar Campo 
                    </a>
                     <!--Fin Adiccionar campo boton-->
                    </div>
                      

              
                    </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Iniciativas</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="row"> 

                             @foreach($objetivo->Iniciativas As $iniciativa)
                                <div class="col-sm-10" >
                                    <br/>
                                    {!! Form::text('nombreIniciativaY[]',$iniciativa->nombre,['class' => 'form-control', 'placeholder' => 'Nombre del usuario', 'required']) !!}
                                    {!! Form::hidden('nombreIniciativaH[]',$iniciativa->id) !!}
                                </div>
                                
                                <div class="col-sm-2" ><br/>

                                <a href="#" onclick=" return confirm('Desea eliminar este usuario?')" class="btn btn-danger" size="20"  >
                                    <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                                    Remover
                                </a></div>
                             @endforeach    

                                <div id="dynamicDivIniciativa">

                                </div>
                            </div>
                <!-- Adiccionar campo boton-->
                <!-- parte superior-->  

                    </div>

                    <br/>
                    <a class="btn btn-success pull-right" href="javascript:void(0)" id="addInputIniciativa">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                      Adicionar Campo 
                    </a>
                     <!--Fin Adiccionar campo boton-->
                        </div>

              
                    </div>   

                <div class="form-group">
                    {!! Form::submit('Actualizar',['class' => 'btn btn-primary pull-right'])!!}

                    <a href="{{route('financiero.index')}}" class="btn btn-default ">
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
    <script>
            $(function () {
                var scntDiv = $('#dynamicDivIndicador');
                var scntDiv = $('#dynamicDivMeta');
                var scntDiv = $('#dynamicDivIniciativa');                    
                var contador1 = 0;
                var contador2 = 0;
                var contador3 = 0;
                $(document).on('click', '#addInputIndicador', function () {
                    contador1++;

                    $('<div class="col-sm-10" id="remInputIndicador'+contador1+'"> '+

                        '<br/>'+ '{!!Form::text('nombreIndicador[]',null, ['class' => 'form-control', 'placeholder' => 'nombre indicador','required']) !!}' +'</div>'+ 

                        '<div class="col-sm-2" id="remInputBIndicador'+contador1+'"> '+'<br/>'+

                        '<a class="btn btn-danger remInputIndicador" size="20" href="javascript:void(0)"  id="'+contador1+'">'+
                            '<span class="glyphicon glyphicon-minus" aria-hidden="true"></span> '+
                            'Remover'+
                        '</a>'+'</div>').appendTo(dynamicDivIndicador);
                });

                $(document).on('click', '#addInputMeta', function () {
                    contador2++;
                    $('<div class="col-sm-10" id="remInputMeta'+contador2+'"> '+

                        '<br/>'+ '{!!Form::text('nombreMeta[]',null, ['class' => 'form-control', 'placeholder' => 'nombre meta','required']) !!}' +'</div>'+ 

                        '<div class="col-sm-2" id="remInputBMeta'+contador2+'"> '+'<br/>'+

                        '<a class="btn btn-danger remInputMeta" size="20" href="javascript:void(0)"  id="'+contador2+'">'+
                            '<span class="glyphicon glyphicon-minus" aria-hidden="true"></span> '+
                            'Remover'+
                        '</a>'+'</div>').appendTo(dynamicDivMeta); 
                    return false;
                });

                $(document).on('click', '#addInputIniciativa', function () {
                    contador3++;
                    $('<div class="col-sm-10" id="remInputIniciativa'+contador3+'"> '+

                        '<br/>'+ '{!!Form::text('nombreIniciativa[]',null, ['class' => 'form-control', 'placeholder' => 'nombre meta','required']) !!}' +'</div>'+ 

                        '<div class="col-sm-2" id="remInputBIniciativa'+contador3+'"> '+'<br/>'+

                        '<a class="btn btn-danger remInputIniciativa" size="20" href="javascript:void(0)"  id="'+contador3+'">'+
                            '<span class="glyphicon glyphicon-minus" aria-hidden="true"></span> '+
                            'Remover'+
                        '</a>'+'</div>').appendTo(dynamicDivIniciativa); 
                    return false;
                });    
                $(document).on('click', '.remInputIndicador', function () {

                    console.log("HOLA1 = "+$(this).attr('id'));
                    var id = $(this).attr('id');
                    $('#remInputIndicador'+id).remove();
                    $('#remInputBIndicador'+id).remove();

                   
                    //$(this).parents('div').remove();
                    //return false;
                });
                $(document).on('click', '.remInputMeta', function () {

                    console.log("HOLA2 = "+$(this).attr('id'));
                    var id = $(this).attr('id');
                    $('#remInputMeta'+id).remove();
                    $('#remInputBMeta'+id).remove();

                //$(this).parents('div').remove();
                    //return false;
                });
                $(document).on('click', '.remInputIniciativa', function () {

                    console.log("HOLA3 = "+$(this).attr('id'));
                    var id = $(this).attr('id');
                    $('#remInputIniciativa'+id).remove();
                    $('#remInputBIniciativa'+id).remove();

                    
                    //$(this).parents('div').remove();
                    //return false;
                });
            });
    </script>
@endsection