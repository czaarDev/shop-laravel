<!DOCTYPE html>
<html lang="pt-BR" data-bs-theme="light">
<head>
    <meta charset="utf-8"/>
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover"
    />

    <title>@yield('title', config('app.name'))</title>
    <meta
        name="description"
        content="@yield('description', config('app.name'))"
    />

    @include('includes.shop-css')
    @vite(['resources/js/app.js'])
</head>

<body>
<div class="d-flex flex-column" id="app" style="min-height: 100vh;">
    @include('includes.shop-cart-off-canvas')
    @include('includes.shop-header')

    <main class="content-wrapper">
        @yield('content')
    </main>

    @include('includes.shop-footer')
</div>
@include('includes.shop-js')
</body>
</html>
