@extends('layouts.app')

<style>

    .single-post{
        box-shadow:0 0 5px #000;
        border-radius:5px;
        margin:20px;
        height:200px;
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

<div class="container">
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
</div>
@endsection
