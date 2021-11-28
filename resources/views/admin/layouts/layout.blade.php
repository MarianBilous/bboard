<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>

        @include('admin.includes.styles')

    </head>

    @php
        $theme = App\Models\Setting::where('item', 'theme')->first();

        if ($theme) {
            $theme = $theme->value;
        }
    @endphp

    <body class="bg-theme {{ $theme }}">
        <div class="wrapper">
            @if(Auth::check())
                @include('admin.includes.sidebar', ['title' => 'BBS'])

                @include('admin.includes.header')

                <div class="page-wrapper">
                    <div class="page-content-wrapper">
                        <div class="page-content">

                            @yield('content')

                        </div>
                    </div>
                </div>
            @else
                @yield('content')
            @endif
        </div>

        @include('admin.includes.js_library')

        @yield('additional_js')

    </body>
</html>
