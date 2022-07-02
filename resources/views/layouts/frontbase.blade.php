<!doctype html>
<html lang="en">
        @include('home.head')
    <body class="js">
        @include('home.header')

        @yield('content')

        @include('home.footer')
        @yield('foot')
    </body>
</html>
