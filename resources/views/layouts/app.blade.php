<html>
@php
$quienesSomos = App\confrm::nivel(11);
$redesSociales = App\confrm::nivel(13);
$ultimasNoticias = App\confrm::nivel(14);
$usuarios = App\confrm::nivel(16);
$gestionarMenu = App\confrm::nivel(17);
$gestionarServicios = App\confrm::nivel(18);
$gestionarContactos = App\confrm::nivel(20);
$gestionarSucursales = App\confrs::gallery_sucursales();
@endphp

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
    <meta property="og:url" content="https://www.ademonline.com/" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Facebook Share Button with Control Images and Text of Your Website" />
    <meta property="og:description"
        content="Sometimes we see that our Android device is run out of internal storage space automatically. If we store data, apps and other thinks on Sd card then also it happens. Why ? Because the Apps which are run on our device, build Cached Data on Internal Memory. If we don't delete them in time then.." />
    <meta property="og:image" content="https://www.ademonline.com/images/1573846135.jpg" />
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
    <link href="/css/magnific-popup.css" rel="stylesheet">
    <link href="/css/jquery.fancybox.min.css" rel="stylesheet">
    <link href="/css/jquery.mCustomScrollbar.min.css" rel="stylesheet">
    <link href="/css/menu.css" rel="stylesheet">
    <link href="/css/select2.min.css" rel="stylesheet" />
    <link href="/css/sweetalert2.min.css" rel="stylesheet">

    <link href="/css/style.css?q={{ time() }}" rel="stylesheet">
    <link href="/css/responsive.css?q={{ time() }}" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="/css/select2-bootstrap4.min.css" rel="stylesheet">
    <link href="/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="/css/custom.css?q={{ time() }}" rel="stylesheet">
    <link href='/css/immersive-slider.css' rel='stylesheet' type='text/css'>
    <link href='/css/fancy.css?q={{ time() }}' rel='stylesheet' type='text/css'>

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
        @include('layouts.modal-edit-quienes-somos')
        @include('layouts.modal-new-quienes-somos')
        @include('layouts.modal-redes-sociales')
        @include('layouts.modal-edit-redes-sociales')
        @include('layouts.modal-edit-servicios')
        @include('layouts.modal-new-redes-sociales')
        @include('layouts.modal-new-menu-principal')
        @include('layouts.modal-new-servicios')
        @include('layouts.modal-edit-menu-principal')
        @include('layouts.modal-menu-principal')
        @include('layouts.modal-servicios')
        @include('layouts.modal-contactos')
        @include('layouts.modal-new-contactos')
        @include('layouts.modal-edit-contactos')

        @include('layouts.modal-user')
        @include('layouts.modal-new-user')
        @include('layouts.modal-edit-user')
        @endif
        @endauth
    </div>
    <script src="/js/jquery.js"></script>

    <script src="/js/moment.min.js"></script>
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
    <script src="/js/jquery.uploadPreview.js"></script>
    <script src="/js/jquery.validate.min.js"></script>
    <script src="/js/jquery.dataTables.min.js"></script>
    <script src="/js/dataTables.bootstrap4.min.js"></script>
    <script src="/js/dataTables.buttons.min.js" type="text/javascript"></script>
    <script src="/js/buttons.bootstrap4.min.js" type="text/javascript"></script>
    <script src="/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
    <script src="/js/buttons.colVis.js" type="text/javascript"></script>
    <script src="/js/select2.min.js" type="text/javascript"></script>
    <script src="/js/es.js" type="text/javascript"></script>
    <script src="/js/ellipsis.js" type="text/javascript"></script>
    <script src="/js/sweetalert2.min.js" type="text/javascript"></script>
    <script src="/js/js-yaml.min.js" type="text/javascript"></script>
    <script src="/js/icons.js" type="text/javascript"></script>
    <script src="/js/datatables-index.js?q={{ time() }}" type="text/javascript"></script>
    <script src="/js/jquery.immersive-slider.js" type="text/javascript"></script>
    <script src="/js/fancy.js" type="text/javascript"></script>

    <script type="text/javascript">
        const modal_quienes_somos = @json(App\confrm::nivel(11));
        const modal_redes_sociales = @json($redesSociales);
        const modal_usuarios = @json($usuarios);
        const gestionar_menu = @json($gestionarMenu);
        const gestionar_servicios = @json($gestionarServicios);
        const gestionar_contactos = @json($gestionarContactos);
        const gestionar_sucursales = @json($gestionarSucursales);
        @if (Auth::check())
        const employee = @json(\Auth::user()->employee());
        @endif
    </script>
    <script src="/js/index.js?q={{ time() }}"></script>
    <script>
        function initMap() {
            gestionar_sucursales.forEach(data => {
                var maps = new google.maps.Map(document.getElementById('map-'+data.concooscode), {
                    center: {lat:parseFloat(data.concooslati), lng: parseFloat(data.concooslegt)},
                    zoom: 12
                });
                var marker1 = new google.maps.Marker({
                position: {lat: parseFloat(data.concooslati), lng: parseFloat(data.concooslegt)},
                draggable: false
                });
                marker1.setMap(maps);
                maps = null;
                marker1 = null;
          });
        }
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqvbCfygRs0u5SPYcDkghxVLpbk0O7Inw&callback=initMap">
    </script>
    <script src="/js/user/js_index_user.js?q={{ time() }}"></script>
    <script src="/js/user/js_create_user.js?q={{ time() }}"></script>
    <script src="/js/user/js_edit_user.js?q={{ time() }}"></script>

    <script src="/js/services/js_index_services.js?q={{ time() }}"></script>
    <script src="/js/services/js_create_services.js?q={{ time() }}"></script>
    <script src="/js/services/js_edit_services.js?q={{ time() }}"></script>

    <script src="/js/aboutus/js_index_aboutus.js?q={{ time() }}"></script>
    <script src="/js/aboutus/js_create_aboutus.js?q={{ time() }}"></script>
    <script src="/js/aboutus/js_edit_aboutus.js?q={{ time() }}"></script>


    <script src="/js/contacts/js_index_contacts.js?q={{ time() }}"></script>
    <script src="/js/contacts/js_create_contacts.js?q={{ time() }}"></script>
    <script src="/js/contacts/js_edit_contacts.js?q={{ time() }}"></script>

    <script src="/js/social_networks/js_index_social_networks.js?q={{ time() }}"></script>
    <script src="/js/social_networks/js_create_social_networks.js?q={{ time() }}"></script>
    <script src="/js/social_networks/js_edit_social_networks.js?q={{ time() }}"></script>

    <script src="/js/main_menu/js_index_main_menu.js?q={{ time() }}"></script>
    <script src="/js/main_menu/js_create_main_menu.js?q={{ time() }}"></script>
    <script src="/js/main_menu/js_edit_main_menu.js?q={{ time() }}"></script>
    {{--  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v5.0&appId=665910193938787&autoLogAppEvents=1"></script> --}}
    @stack('scripts')

</body>

</html>