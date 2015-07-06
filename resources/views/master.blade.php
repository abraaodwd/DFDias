<!DOCTYPE html>
<html class="no-js" lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Desenvolvimento de portais, sites corporativos e sistemas online para todos os tipos de negócio. Em São José dos Campos/SP.">
        <meta name="author" content="Diego Figueiró Dias">
        <meta name="robots" content="index, follow">
        <meta name="keywords" content="HTML,CSS,XML,JavaScript,Desenvolvimento Web,PHP,Programação web,Desenvolvimento sistemas web,Desenvolvimento de Sistemas São José dos Campos,Desenvolvimento remoto,Desenvolvimento a distância">
        <meta name="google-site-verification" content="J3IDl5Pr28EEYvLuOAEaCYiOj-kNGQKHJwQaZLWEp8Q" />
	<title>@yield('title')</title>

        <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon" />
        <link rel="stylesheet" type="text/css" href="{{asset('css/foundation.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome/css/font-awesome.min.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('js/pgwslider/pgwslider.css')}}"/>
        <link rel="stylesheet" type="text/css" media="screen"  href="{{asset('js/zurb-responsive-tables/responsive-tables.css')}}" />

        @yield('css', '')
        <script src="{{asset('js/vendor/modernizr.js')}}"></script>
</head>
<body class="text-justify">
    <div id="tudo">

        @include('menu')
        
	@yield('content')
        
        <div class="push"></div>
    </div>
       @include('footer')

        <!-- Código do Foundation -->
        <script src="{{asset('js/vendor/jquery.js')}}"></script>
        <script src="{{asset('js/foundation.min.js')}}"></script>
        <script src="{{asset('js/zurb-responsive-tables/responsive-tables.js')}}"></script>

        <script>
            $(document).foundation();
        </script>
        <!-- Fim código do Foundation -->
        {{--
        <!-- Slider -->
       
        <script src="{{asset('js/pgwslider/pgwslider.js')}}"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.pgwSlider').pgwSlider({ displayList: false,
                                            displayControls: false,
                                            maxHeight: 500
                                         });
            });
        </script>
                <!-- Fim slider -->
        --}}

        @yield('js', '')
</body>
</html>

