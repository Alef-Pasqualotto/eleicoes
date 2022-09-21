<!DOCTYPE html>
<html lang="pt-BR">
@include('base.header', ['title' => $title])
<body>
    @include('base.navbar')
    <div class="container mt-2 ">
        @yield('container')
    </div>

    @include('base.footer')
</body>
</html>
