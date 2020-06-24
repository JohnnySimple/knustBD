@extends('layouts.app')

<style>
/* 
    .single-post{
        box-shadow:0 0 5px #000;
        border-radius:5px;
        margin:20px;
        height:200px;
    } */

    
    .content {
                text-align: center;
                color: #fff;
            }

            .title {
                font-size: 84px;
                font-family: "Shadows Into Light" Cursive;
            }

    .banner {
                background-image: linear-gradient(to bottom, #001d38 0%, rgba(0, 29, 56, 0.6) 100%),
                    url('imgs/banner.png'););
                background-size: cover;
                height: 700px;
                width: 100%;
                position: relative;
                top: -30px;
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
@section('content')
<!-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div> -->



<div class="container-fluid banner" >
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



<!-- <div class="container">
<div align="center"><h3>Hot New Businesses</h3><hr style="width:20%"></div>
    <div class="row">
        @foreach($businesses as $business)
            <div class="col-md-2 col-lg-2 col-sm-2 single-post">
                <div style="height:60%;border-bottom:1px solid #ccc;
                background-image:url({{'imgs/img1.jpeg'}});background-size:cover;background-position:center;">

                </div>
                <div style="margin-top:10px;" align="center">
                    <span class="text-center">{{ $business->name }}</span><br>
                    <span class="pull-left"></span>{{ $business->location }} 
                    <span class="pull-right">0{{ $business->phone }}</span>
                  
                </div>
            </div>
        @endforeach
    </div>
</div> -->
@endsection
