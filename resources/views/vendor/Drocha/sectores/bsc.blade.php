@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Usuarios
@endsection

@section('main-content')

<div class="row"> <!-- parte superior-->
  <div class="col-sm-2"> </div>

  <div class="col-sm-8">

    <div class="panel panel-default" style="background-color: #04ba8a">
        
        <div class="panel-body" style="color: white"> 
            <h5><b>FINANCIERO</b>

              @if (strcasecmp(auth()->user()->Rol->nombre, 'Financiero') == 0 || strcasecmp(auth()->user()->Rol->nombre, 'Admin') == 0)
             <a href="{{route('objetivo.index')}}" class="btn btn-warning pull-right">Editar
            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
            </a>@endif</h5>

            
            <p>Para triunfar financieramente ¿Como debemos aparecer ante nuestros accionistas?</p>

            @if(count($objetivosF)>0)
            <div class="table-responsive">
                <table class="table table-bordered table-dark" style="color: white">
                    <thead>
                    <th scope="col">Objetivo</th>
                    <th scope="col">Indicadores</th>
                    <th scope="col">Metas</th>
                    <th scope="col">Iniciativas</th>
                    </thead>

                    <tbody>
                    @foreach($objetivosF As $objetivoF)
                        <tr>
                            <td>{{$objetivoF->nombre}}</td>

                             <td>
                             @foreach($objetivoF->Indicadores As $indicador)
                               • {{$indicador->nombre}}<br/>
                              @endforeach  
                            </td>

                             <td>
                             @foreach($objetivoF->Metas As $meta)
                               • {{$meta->nombre}}<br/>
                              @endforeach  
                            </td>

                             <td>
                             @foreach($objetivoF->Iniciativas As $iniciativa)
                               • {{$iniciativa->nombre}}<br/>
                              @endforeach  
                            </td>

                        </tr>
                    @endforeach
                    
                    </tbody>
                </table>
              </div>
            @else
                <hr>
                <p class="bg-default text-center">
                    No se han registrado objetivos
                </p>
            @endif
        </div>
    </div>
  </div>

  <div class="col-sm-4"></div>
</div>

<div class="row"><!-- parte media-->
  <div class="col-sm-5">
     <div  class="panel panel-default" style="background-color: #6118de">

        <div class="panel-body" style="color: white">
          <h5><b>CLIENTES</b>
            @if (strcasecmp(auth()->user()->Rol->nombre, 'Servicio al cliente') == 0 || strcasecmp(auth()->user()->Rol->nombre, 'Admin') == 0)
             <a href="{{route('objetivo.index')}}" class="btn btn-warning pull-right">Editar
            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
            </a>@endif</h5>
          <p>Para alcanzar los objetivos¿Como deberiamos ser vistos por los clientes?</p>
             @if(count($objetivosS)>0)

             <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <th scope="col">Objetivo</th>
                    <th scope="col">Indicadores</th>
                    <th scope="col">Metas</th>
                    <th scope="col">Iniciativas</th>
                    </thead>

                    <tbody>
                    @foreach($objetivosS As $objetivoS)
                        <tr>
                            <td>{{$objetivoS->nombre}}</td>

                             <td>
                             @foreach($objetivoS->Indicadores As $indicador)
                               • {{$indicador->nombre}}<br/>
                              @endforeach  
                            </td>

                             <td>
                             @foreach($objetivoS->Metas As $meta)
                               • {{$meta->nombre}}<br/>
                              @endforeach  
                            </td>

                             <td>
                             @foreach($objetivoS->Iniciativas As $iniciativa)
                               • {{$iniciativa->nombre}}<br/>
                              @endforeach  
                            </td>

                        </tr>
                    @endforeach
                    
                    </tbody>
                </table>
              </div>
            @else
                <hr>
                <p class="bg-default text-center">
                    No se han registrado objetivos
                </p>
            @endif
        </div>
    </div>
  </div>

    <div class="col-sm-2">
        <img class="img-responsive" src="../img/visionEstrategia.png" width="900", height="850"  >
    </div>
  
  <div class="col-sm-5">

    <div  class="panel panel-default" style="background-color: #2e2a36">
        <div class="panel-body" style="color: white">
            <h5><b>PROCESOS INTERNOS DE LA EMPRESA</b>
              @if (strcasecmp(auth()->user()->Rol->nombre, 'Innovacion y desarrollo') == 0 || strcasecmp(auth()->user()->Rol->nombre, 'Admin') == 0)
             <a href="{{route('objetivo.index')}}" class="btn btn-warning pull-right">Editar
            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
            </a>@endif</h5>
            <p>Para safisfacer a los clientes¿En que procesos se debe sobresalir?</p>

             @if(count($objetivosI)>0)
             <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <th scope="col">Objetivo</th>
                    <th scope="col">Indicadores</th>
                    <th scope="col">Metas</th>
                    <th scope="col">Iniciativas</th>
                    </thead>

                    <tbody>
                    @foreach($objetivosI As $objetivoI)
                        <tr>
                            <td>{{$objetivoI->nombre}}</td>

                             <td>
                             @foreach($objetivoI->Indicadores As $indicador)
                               • {{$indicador->nombre}}<br/>
                              @endforeach  
                            </td>

                             <td>
                             @foreach($objetivoI->Metas As $meta)
                               • {{$meta->nombre}}<br/>
                              @endforeach  
                            </td>

                             <td>
                             @foreach($objetivoI->Iniciativas As $iniciativa)
                               • {{$iniciativa->nombre}}<br/>
                              @endforeach  
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
              </div>
            @else
                <hr>
                <p class="bg-default text-center" >
                    No se han registrado objetivos
                </p>
            @endif
        </div>
    </div>   

  </div>
</div>

<div class="row"> <!-- parte inferior-->
  <div class="col-sm-2"> </div>

  <div class="col-sm-8">

    <div class="panel panel-default" style="background-color: #2683e0">
        <div class="panel-body" style="color: white">
            <h5><b>APRENDIZAJE Y CRECIMIENTO</b> 
              @if (strcasecmp(auth()->user()->Rol->nombre, 'Gestion humana') == 0 || strcasecmp(auth()->user()->Rol->nombre, 'Admin') == 0)
             <a href="{{route('objetivo.index')}}" class="btn btn-warning pull-right">Editar
            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
            </a>@endif</h5>
            <p>Para alcanzar los objetivos ¿Como mantener la habilidad de cambiar y progresar?</p>

               @if(count($objetivosG)>0)
               <div class="table-responsive">
                  <table class="table table-bordered">
                      <thead>
                      <th scope="col">Objetivo</th>
                      <th scope="col">Indicadores</th>
                      <th scope="col">Metas</th>
                      <th scope="col">Iniciativas</th>
                      </thead>

                    <tbody>
                    @foreach($objetivosG As $objetivoG)
                        <tr>
                            <td>{{$objetivoG->nombre}}</td>

                             <td>
                             @foreach($objetivoG->Indicadores As $indicador)
                               • {{$indicador->nombre}}<br/>
                              @endforeach  
                            </td>

                             <td>
                             @foreach($objetivoG->Metas As $meta)
                               • {{$meta->nombre}}<br/>
                              @endforeach  
                            </td>

                             <td>
                             @foreach($objetivoG->Iniciativas As $iniciativa)
                               • {{$iniciativa->nombre}}<br/>
                              @endforeach  
                            </td>

                        </tr>
                    @endforeach
                    
                    </tbody>
                </table>
              </div>
            @else
                <hr>
                <p class="bg-default text-center">
                    No se han registrado objetivos
                </p>

            @endif
        </div>
    </div>
  </div>

  <div class="col-sm-4"> </div>
</div>
@endsection


