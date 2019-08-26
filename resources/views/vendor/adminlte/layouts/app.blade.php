<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

@section('htmlheader')
    @include('adminlte::layouts.partials.htmlheader')
@show

<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->

<body class="skin-red sidebar-mini">

    <div class="loader"></div>

<div id="app">
    <div class="wrapper">

    @include('adminlte::layouts.partials.mainheader')

    @include('adminlte::layouts.partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @include('adminlte::layouts.partials.contentheader')

        <!-- Main content -->
        <section class="content">

            <!-- Incluimos la libreria flash, para mostrar las ventanas con los mensajes -->
            @include('flash::message')
            
            <!-- Your Page Content Here -->
            @yield('main-content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    @include('adminlte::layouts.partials.footer')

</div><!-- ./wrapper -->
</div>

@section('scripts')
    @include('adminlte::layouts.partials.scripts')
@show

<!-- Usamos la libreria chosen, para dar estilo a las listas depegables -->
<script src="{{asset('plugins/chosen/chosen.jquery.js')}}"></script>
<!-- Usamos la libreria trumbowyg para dar estilo y agregar funciones a los text area -->
<script src="{{asset('plugins/trumbowyg/trumbowyg.js')}}"></script>

{{-- Script para desaparecer el loader --}}
<script>
    $(document).ready(function() {
        $(".loader").fadeOut("slow");;
    });

</script>

    @yield('js')


</body>
</html>
