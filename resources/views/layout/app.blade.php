<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title inertia>{{ env('APP_NAME') }}{{ $__env->yieldContent('title') ? ' - ' : '' }}@yield('title')</title>

        <link rel="icon" type="assets/image/png" href="{{ asset('assets/images/favicon.png') }}">

        @stack('head')

        <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{asset('assets/vendor/select2/select2.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/select2/select2-bootstrap5.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/animate/animate.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/fontawesome/css/all.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/intro/introjs.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/DataTables/dataTables.bootstrap5.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
        @stack('css')

    </head>

    <body>
        <div class="main-div">
            @include('layout.components.noscript')

            <div class="tema-servidor">
                <header>
                    @include('layout.components.topo')
                    @include('layout.components.header')
                </header>

                <div class="main-body container-fluid">
                    <div class="bg-white w-100 p-4" style="min-height: 75vh;">
                        @yield('content')
                    </div>
                </div>
                @include('layout.components.footer')
            </div>
        </div>


        @stack('pre-scripts')
        <script src="{{asset('assets/vendor/jquery/jquery-3.7.1.min.js')}}"></script>
        <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/vendor/popper/popper.min.js')}}"></script>
        <script src="{{asset('assets/vendor/intro/intro.min.js')}}"></script>
        <script src="{{asset('assets/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
        <script src="{{asset('assets/vendor/select2/select2.full.min.js')}}"></script>
        <script src="{{asset('assets/vendor/select2/pt-BR.js')}}"></script>
        <script src="{{asset('assets/vendor/mask/jquery.mask.min.js')}}"></script>
        <script src="{{asset('assets/vendor/sweetalert/sweetalert2.all.min.js')}}"></script>
        <script src="{{asset('assets/vendor/DataTables/datatables.js')}}"></script>
        <script src="{{asset('assets/js/app.js')}}"></script>
        {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
        <script>
            $(document).ready(function() {
                $('.voltar').on('click', function() {
                    window.history.back();
                });
            });
        </script>

        @vite(['resources/js/app.js'])

        @stack('scripts')

    </body>
</html>
