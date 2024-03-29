<head>
    <meta charset="UTF-8">
    <!--para input dinamicos-->
    <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
    <title> @yield('htmlheader_title', 'Nada') </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('/css/all.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/css/loader.css') }}" rel="stylesheet" type="text/css"/>
    
       <!-- Incluimos el css de la libreria chosen -->
    <link rel="stylesheet" href="{{asset('plugins/chosen/chosen.css')}}">
    <!-- Libreria para el area de texto -->
    <link rel="stylesheet" href="{{asset('plugins/trumbowyg/ui/trumbowyg.min.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

</head>
