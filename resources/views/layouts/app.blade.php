<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Lavendulce - Sweet Perfection</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        {{-- image icon --}}
        <link rel="icon" href="{{ asset('images/logo-square.png') }}" type="image/png">

        <!-- Scripts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">


        <style>
            .main-container {
                font-family: 'Poppins', sans-serif;
                width: fit-content;
                margin-left: auto;
                margin-right: auto;
            }

            .ck-content {
                font-family: 'Poppins', sans-serif;
                line-height: 1.6;
                word-break: break-word;
            }

            .editor-container_classic-editor .editor-container__editor {
                min-width: 795px;
                max-width: 795px;
            }
            .ck .ck-evaluation-badge {
                display: none;
            }
            .ck.ck-content li { margin-left: 24px; }
        </style>
		<link rel="stylesheet" href="/css/ckeditor5.css">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @isset($css)
            {{ $css }}
        @endisset
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
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
        <script src="/js/ckeditor5.umd.js"></script>
        @isset($js)
            {{ $js }}
        @endisset
    </body>
</html>
