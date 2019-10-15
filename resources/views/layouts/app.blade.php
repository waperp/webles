<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    {{-- <meta charset="utf-8"> --}}
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <meta charset="UTF-8">
    <meta name="description"
        content="LES, LABORATORIO ENDOGENETICA SANTA CRUZ, QUÍMICA SANGUINEA!, INMUNOLOGÍA Y SEROLOGÍA!, HORMONAS - PRUEBAS ESPECIALES!">
    <meta name="keywords" content="LAB. DE ANÁLISIS CLÍNICOS
QUÍMICA SANGUINEA
* Glucosa, Hemoglobina Glucosilada(HBA1C)
* Urea, Creatinina, Acido Urico
* Triglicéridos, Colesterol (HDL, LDL, VLDL)
* Riesgo Cardiaco
* Proteínas Totales y Fracciones
* Perfil Hepático (TGO, TGP, GGT, Bilirrubinas)
* Fosfatasa Alcalina, Amilasa, Lipasa
* Perfil Cardíaco (CPK, CKMB, LDH)
* Electrolítos (Sodio, Potasio, Cloro)
* Calcio Total e Iónico, Magnesio, Fosforo
INMUNOLOGÍA Y SEROLOGIA
HORMONAS - PRUEBAS FUNCIONALES
MARCADORES TUMORALES
HEMATOLOGIA Y COAGULOGRAMA
ANALISIS DE ORINA Y PARASITOLOGICO
BACTERIOLOGÍA">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link
        href="https://fonts.googleapis.com/css?family=Exo:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i"
        rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">

    <title>ENDOGENETICA</title>

    <!-- Stylesheets -->
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/jquery-ui.css" rel="stylesheet">
    <link href="/css/icomoon-icons.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/flaticon.css" rel="stylesheet">
    <link href="/css/owl.css" rel="stylesheet">
    <link href="/css/animation.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/magnific-popup.css">
    <link href="/css/jquery.fancybox.min.css" rel="stylesheet">
    <link href="/css/jquery.mCustomScrollbar.min.css" rel="stylesheet">
    <link href="/css/menu.css" rel="stylesheet">
    <link href="/css/style.css?q={{ time() }}" rel="stylesheet">
    <link href="/css/responsive.css?q={{ time() }}" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="/css/select2-bootstrap4.min.css" rel="stylesheet">
	<link href="/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="/css/custom.css?q={{ time() }}" rel="stylesheet">
    {{-- <script src="https://use.fontawesome.com/a9c4c94471.js"></script> --}}
    {{-- <link href="css/fontawesome.min.css" rel="stylesheet"> --}}

</head>

<body>
    <div class="page-wrapper">
        <!-- Preloader -->
        <div class="preloader"></div>
        @yield('content')
        @auth
        @include('layouts.modal-perfil')
        @if (Auth::user()->contypscode == 1)
        @include('layouts.modal-quienes-somos')

        @endif
        @endauth
    </div>
    <script src="/js/jquery.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/jquery-ui.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery.fancybox.js"></script>
    <script src="/js/jquery.magnific-popup.min.js"></script>
    <script src="/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="/js/owl.js"></script>
    <script src="/js/paroller.js"></script>
    <script src="/js/wow.js"></script>
    <script src="/js/main.js"></script>
    <script src="/js/nav-tool.js"></script>
    <script src="/js/jquery-ui.js"></script>
    <script src="/js/appear.js"></script>
    <script src="/js/script.js"></script>
    <script src="/js/jquery.uploadPreview.js">
    </script>
    <script src="/js/jquery.validate.min.js"></script>
    <script src="/js/jquery.dataTables.min.js"></script>
	<script src="/js/dataTables.bootstrap4.min.js"></script>
	<script src="/js/dataTables.buttons.min.js" type="text/javascript"></script>
	<script src="/js/buttons.bootstrap4.min.js" type="text/javascript"></script>
	<script src="/js/buttons.colVis.js" type="text/javascript"></script>
    <script type="text/javascript">
        const modal_quienes_somos = @json(App\confrm::nivel(11));
        console.log(modal_quienes_somos)
    </script>
    <script src="/js/index.js?q={{ time() }}"></script>

    
</body>

</html>