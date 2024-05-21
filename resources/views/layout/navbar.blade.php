<!Doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}"/>
    <!-- <link rel="stylesheet" href="{{ asset('css/all.min.css') }}"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.css" />
    @yield('css')
    @yield('dataTablesCss')
</head>
<?php
$session_area = session('session_area');
?>
<header class="header" id="header">
    <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    @auth
    <div class="header_text">
        {{ auth()->user()->nombre .' '. auth()->user()->app .' '. auth()->user()->apm}}
    </div>
    &nbsp;&nbsp;
    <div class="header_img"> <img src="{{ asset('img/post/'.auth()->user()->foto) }}" alt="img"> </div>
    @endauth
    <!-- @auth {{ auth()->user()->name ?? auth()->user()->username }} @endauth -->
</header>

<body id="body-pd">
    <div class="l-navbar" id="nav-bar">
        <nav class="navSidebar">
            <div>
                <a href="{{ route('dashboard') }}" class="nav_link"><i class='bx bx-home nav_icon'></i><span class="nav_logo-name">SIPPyEM</span></a>
                <!-- bx bx-home-alt-2 logo de home  -->
                <!-- <a href="#" class="nav_logo"><img src="{{ asset('logos/SIPPyEMlogo.png') }}" alt="SIPPyEM" style="height: 70px;"></a> -->
                <div class="nav_list">
                    @if(auth()->user())
                        @if(auth()->user()->id_tipo == 5)
                        <a href="{{ route('graficos') }}" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Reportes</span> </a>
                        <a href="{{ route('EditarPerfil') }}" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Perfíl</span> </a>
                        @endif
                        @if(auth()->user()->id_tipo != 5)
                            <a href="{{ route('registrosA', ['id' => $session_area]) }}" class="nav_link"> <i class='bx bxs-edit'></i></i> <span class="nav_name">Registros</span> </a>
                            <a href="{{ route('graficos') }}" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Reportes</span> </a>
                            <a href="{{ route('calendario') }}" class="nav_link"> <i class='bx bx-calendar nav_icon'></i> <span class="nav_name">Calendario</span> </a>
                            @if(auth()->user()->id_tipo == 1 || auth()->user()->id_tipo == 2)
                                <a href="{{ route('correo') }}" class="nav_link"> <i class="bx bx-envelope nav_icon"></i> <span class="nav_name">Correo</span></a>
                            @endif
                            <a href="{{ route('perfil') }}" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Perfíl</span> </a>
                        @endif
                    @endif
                </div>
            </div>
            @if(auth()->user())
            <a href="/logout" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Cerrar Sesión</span> </a>
            @else
            <a href="{{ route('login') }}" class="nav_link"> <i class='bx bx-log-in nav_icon'></i> <span class="nav_name">Iniciar Sesión</span> </a>
            @endif
        </nav>
    </div>

    <!--Container Main start-->
    <div class="height-100">
        @yield('content')
    </div>
    <!--Container Main end-->

    <!-- Scripts START -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/3aafa2d207.js') }}"></script>
    <script src="{{ asset('js/menu.js') }}"></script>
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <!-- <script src="{{ asset('js/jquery-3.6.4.min.js') }}"></script> -->
    <!-- <script src="{{ asset('js/datatables.min.js') }}"></script>  -->
    <script>
        (function($) {
            "use strict"; // Start of use strict

            // Toggle the side navigation
            $("#l-navbarToggle, #l-navbarToggleTop").on('click', function(e) {
                $("body").toggleClass("l-navbar-toggled");
                $(".l-navbar").toggleClass("toggled");
                if ($(".l-navbar").hasClass("toggled")) {
                    $('.l-navbar .collapse').collapse('hide');
                };
            });

            // Close any open menu accordions when window is resized below 768px
            $(window).resize(function() {
                if ($(window).width() < 768) {
                    $('.l-navbar .collapse').collapse('hide');
                };

                // Toggle the side navigation when window is resized below 480px
                if ($(window).width() < 480 && !$(".l-navbar").hasClass("toggled")) {
                    $("body").addClass("l-navbar-toggled");
                    $(".l-navbar").addClass("toggled");
                    $('.l-navbar .collapse').collapse('hide');
                };
            });

            // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
            $('body.fixed-nav .l-navbar').on('mousewheel DOMMouseScroll wheel', function(e) {
                if ($(window).width() > 768) {
                    var e0 = e.originalEvent,
                        delta = e0.wheelDelta || -e0.detail;
                    this.scrollTop += (delta < 0 ? 1 : -1) * 30;
                    e.preventDefault();
                }
            });

            // Scroll to top button appear
            $(document).on('scroll', function() {
                var scrollDistance = $(this).scrollTop();
                if (scrollDistance > 100) {
                    $('.scroll-to-top').fadeIn();
                } else {
                    $('.scroll-to-top').fadeOut();
                }
            });

            // Smooth scrolling using jQuery easing
            $(document).on('click', 'a.scroll-to-top', function(e) {
                var $anchor = $(this);
                $('html, body').stop().animate({
                    scrollTop: ($($anchor.attr('href')).offset().top)
                }, 1000, 'easeInOutExpo');
                e.preventDefault();
            });

        })(jQuery); // End of use strict
    </script>
    @yield('js')
    <!-- Scripts END -->
</body>

</html>