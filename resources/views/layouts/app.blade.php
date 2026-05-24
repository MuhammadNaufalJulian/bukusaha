<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])


        <style>

*{
    box-sizing:border-box;
}

img{
    max-width:100%;
}

table{
    width:100%;
}

body{
    overflow-x:hidden;
}

/*
|--------------------------------------------------------------------------
| MOBILE RESPONSIVE
|--------------------------------------------------------------------------
*/

@media(max-width:768px){

    h1{
        font-size:28px !important;
    }

    h2{
        font-size:22px !important;
    }

    h3{
        font-size:18px !important;
    }

    /*
    |--------------------------------------------------------------------------
    | FLEX MOBILE
    |--------------------------------------------------------------------------
    */

    .mobile-column{
        flex-direction:column !important;
        align-items:flex-start !important;
    }

    /*
    |--------------------------------------------------------------------------
    | GRID MOBILE
    |--------------------------------------------------------------------------
    */

    .mobile-grid-1{
        grid-template-columns:1fr !important;
    }

    /*
    |--------------------------------------------------------------------------
    | TABLE MOBILE
    |--------------------------------------------------------------------------
    */

    .table-responsive{
        overflow-x:auto;
    }

    /*
    |--------------------------------------------------------------------------
    | CARD TRANSACTION
    |--------------------------------------------------------------------------
    */

    .transaction-card{

        flex-direction:column !important;
        align-items:flex-start !important;
        gap:20px;
    }

    .transaction-right{

        width:100%;
        text-align:left !important;
    }

    /*
    |--------------------------------------------------------------------------
    | BUTTON MOBILE
    |--------------------------------------------------------------------------
    */

    .mobile-full{
        width:100%;
    }

}

</style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
