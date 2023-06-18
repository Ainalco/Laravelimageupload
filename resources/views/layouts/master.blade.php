<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Module Users</title>
        
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
        
       {{-- Laravel Vite - CSS File --}}
       {{-- {{ module_vite('build-users', 'Resources/assets/sass/app.scss') }} --}}

    </head>
     <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <div class="container">
        @yield('content')
        </div>
        {{-- Laravel Vite - JS File --}}
        {{-- {{ module_vite('build-users', 'Resources/assets/js/app.js') }} --}}
    </div>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    </body>
</html>