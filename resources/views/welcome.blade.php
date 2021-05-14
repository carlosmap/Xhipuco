@extends('cabecera')


    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <img src="{{ asset('img/shop-icon.png') }}" width="150" height="150">
                    Antojitos
                </div>
                <div class="title m-b-md">
                    <img src="{{ asset('img/supermercado2.jpg') }}" alt="">
                </div>
                <div class="links">
                </div>

            </div>
        </div>
    </body>
</html>
