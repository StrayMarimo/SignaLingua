<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Signa Lingua') }}</title>

    <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
    <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>
<body>
    <div class="w-full sm:w-[450px] h-full bg-[#FEFEFE] m-auto p-0 relative sm:border-x">
        <main>
            @yield('content')
        </main>
    </div>
</body>
@yield('javascript')
@stack('script')
</html>

