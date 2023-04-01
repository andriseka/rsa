<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Dashboard - Evoting</title>
    <!-- CSS files -->

    <link rel="stylesheet" href="{{asset('assets/css/tabler.min.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    @yield('css')

  </head>
  <body >
    <div class="page">
        @include('sweetalert::alert')

        @include('admin.layouts.sidebar')
        @include('admin.layouts.header')
        <div class="page-wrapper">
            <div class="container-xl">
                <!-- Page title -->
                <div class="page-header d-print-none">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            @yield('content-title')
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-body">
                <div class="container-xl">
                    <div class="row row-deck">
                        @yield('content')
                    </div>
                </div>
            </div>
            @include('admin.layouts.footer')
        </div>
    </div>

    <script src="{{asset('assets/js/tabler.min.js')}}"></script>
    <script src="{{asset('assets/js/demo.min.js')}}"></script>
    @yield('js')

  </body>
</html>
