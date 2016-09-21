<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
</head>
<body id="app-layout">
    @include('includes.header')
    <div class="container">
        @yield('content')
        
        <footer>
            @include('includes.footer')
        </footer>
    </div>
    @include('includes.js')
</body>
</html>
