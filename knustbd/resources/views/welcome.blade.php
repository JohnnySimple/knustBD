<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>knustbd</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            /* html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            } */

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
                color: #fff;
            }

            .title {
                font-size: 84px;
                font-family: "Shadows Into Light" Cursive;
            }

            .links > a {
                color: #fff;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .banner {
                background-image: linear-gradient(to bottom, #001d38 0%, rgba(0, 29, 56, 0.6) 100%),
                    url('imgs/banner.png'););
                background-size: cover;
                height: 700px;
                width: 100%;   
            }

            .search-form {
                margin-left: 400px;
            }

            @media only screen and (max-width: 700px) {
                .search-form {
                    margin-left: 10px;
                }
            }
            
        </style>
    </head>
    <body>
        <div class="flex-center position-ref">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif
        </div>
        
        <div class="container-fluid banner">
            <div class="content" style="margin-top:200px;">
                <p class="title">Search business</p>
                <div class="row" >
                <div class="search-form col-md-4">
                    <form method="get" action="{{ route('Overall.searched') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <select name="category" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-danger" value="Search">
                        </div>
                    </form>
                </div>
                
                <div>
            </div>
            
        </div>

        <!-- <div class="container-fluid banner" >
            <div class="content" style="margin-top:200px;">
                <a href="{{ route('login') }}"><button class="btn btn-danger">Login</button></a>
                <a href="{{ route('register') }}"><button class="btn btn-danger">Register</button></a>
            </div>
        </div> -->

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
