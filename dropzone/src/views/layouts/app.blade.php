<!doctype html>
<html>
<head>
    @include('Dropzone::layouts.head')
</head>
<body>
<div class="container">

    <header class="row">
        @include('Dropzone::layouts.header')
    </header>

    <div id="main" class="row">

        @yield('content')

    </div>

    <footer class="row">
        @include('Dropzone::layouts.footer')
    </footer>

</div>
</body>
</html>