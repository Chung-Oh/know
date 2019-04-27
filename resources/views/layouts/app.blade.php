<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="author" content="Daniel Chung">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<body>
    <section id="app">
        <!-- Condition to not show Welcome Page, only member and future members -->
        @if (Request::path() != '/')
            @component('layouts.components.header') @endcomponent <!-- Navegation Bar -->
        @endif

        <!----------------------------- lOADING ANIMATION ----------------------------->
        @Loading @endLoading

        <main class="bg-dark">
            @yield('content') <!-- Principal content -->
        </main>

    </section>

    <!-- Button Go Top -->
    @component('layouts.components.btn-go-top') @endcomponent

    <!-- Footer -->
    @component('layouts.components.footer') @endcomponent

    <script src="{{ mix('js/app.js') }}"></script>

    <!-- Calling the jQuery Plugin function to sort the tables -->
    <script>
        $(function(){
            $('.tablesorter').tablesorter();
        });
    </script>

    <!-- Condition in this script only when you have the Welcome page -->
    @if (Request::path() == '/')
        <script>
            /**
             * Function below moves to section slowly
             */
            ativaScrollSuave = selector => {
                $(selector).click(function(event) {
                    event.preventDefault();
                    let target = $(this).attr('href');
                    $('html, body').animate({
                        scrollTop: $(target).offset().top
                    }, 700)
                });
            }
            /**
             * Put listeners on buttons
             */
            ativaScrollSuave('a[href*=panel-about]');
            ativaScrollSuave('a[href*=panel-plataform]');
            ativaScrollSuave('a[href*=panel-test]');
        </script>
    @endif
</body>
</html>
