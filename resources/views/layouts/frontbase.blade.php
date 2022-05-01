<!doctype html>
<html lang="en">
        @include('home.head')
    <body class="js">
        @include('home.header')

        @section('content')@show

        @section('footer')
           @include('home.footer')
        @show
    </body>
</html>
