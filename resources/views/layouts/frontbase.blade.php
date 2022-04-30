<!doctype html>
<html lang="en">
    <head>
        <title>@yield('title')</title>
        @yield('head')
    </head>
    <body>

        <h1>Header</h1>

        @section('sidebar')
            This is the master sidebar.
        @show
        <div class="container">
            @yield('content')
        </div>
        <h1>Footer</h1>
        @yield('footer')

    </body>
</html>
