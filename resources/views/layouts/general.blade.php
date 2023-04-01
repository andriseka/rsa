<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>E VOTING</title>
    <!-- CSS files -->
    <link rel="stylesheet" href="{{asset('assets/css/tabler.min.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <style>
        .header {
            height: 80px;
            padding: 20px;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #ffffff;
            z-index: 9999;
        }
        .title {
            font-size: 18pt;
            font-weight: bold;
        }
        .sub-title {
            display: block;
        }
        .footer {
            position: fixed;
            width: 100%;
            bottom: 0;
            left: 0;
            box-shadow: 1px -1px 10px rgba(0, 0, 0, 0.144);
        }
        a:link {
            text-decoration: none;
        }
    </style>
    @yield('css')
  </head>
  <body  class="layout-fluid" style="background-color: #ffffff">
    <div class="page">
        <div class="page-wrapper p-3">
            <div class="header">
                <div class="d-flex justify-content-between">
                    <div>
                        <span class="title">@yield('title')</span>
                        <span class="sub-title text-secondary">@yield('sub-title')</span>
                    </div>
                    <div>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <img src="{{asset('assets/icon/logout.png')}}" alt="" width="30">
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
            <div class="page-body">
                <div class="container">
                    <div class="row">
                        @yield('content')
                    </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>

    <script src="{{asset('assets/js/tabler.min.js')}}"></script>

    @yield('js')
  </body>
</html>
