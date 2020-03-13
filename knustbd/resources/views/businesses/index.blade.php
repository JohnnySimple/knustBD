@extends('layouts.app')

<style>
    .business-post {
        /* border: 1px solid #ccc; */
        height: 120px;
        margin-top: 20px;
    }
    .business-img {
        height: 100%;
        border-radius: 10px;
    }
    .business-name {
        font-size: 13px;
        font-weight: bold;
    }
    
</style>
@section('content')

    <div class="container">

      <div class="blog-header">
        <h2 class="blog-title">My Businesses</h2>
      </div>

      <div class="row">
        <div class="col-md-8 col-sm-8 blog-main">
            @foreach($businesses as $business)
                @if($business->user_id == Auth::user()->id)
                    <!-- single business -->
                    <div class="business-post">
                                <div class="col-md-3 col-sm-3 business-img" 
                                style="background-image:url('/imgs/banner.png');background-size:cover;">

                                </div>
                                <div class="col-md-8 col-sm-8">
                                <p class="business-name">{{ $business->name }}</p>
                                <p style="color:blue;">{{ $business->location }} - 0{{ $business->phone }}</p>
                                </div>
                                <a href="/businesses/{{$business->id}}/edit"><button class="btn">Edit</button></a>
                    </div>
                            <hr>
                        <!-- end of single business -->
                @endif
            @endforeach

          <!-- <nav>
            <ul class="pager">
              <li><a href="#">Previous</a></li>
              <li><a href="#">Next</a></li>
            </ul>
          </nav> -->
        </div><!-- /.blog-main -->
        <!-- Sidebar begins -->
        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div>
          <div class="sidebar-module">
            <h4>Archives</h4>
            <ol class="list-unstyled">
              <li><a href="#">March 2014</a></li>
              <li><a href="#">February 2014</a></li>
              <li><a href="#">January 2014</a></li>
              <li><a href="#">December 2013</a></li>
              <li><a href="#">November 2013</a></li>
              <li><a href="#">October 2013</a></li>
              <li><a href="#">September 2013</a></li>
              <li><a href="#">August 2013</a></li>
              <li><a href="#">July 2013</a></li>
              <li><a href="#">June 2013</a></li>
              <li><a href="#">May 2013</a></li>
              <li><a href="#">April 2013</a></li>
            </ol>
          </div>
          <div class="sidebar-module">
            <h4>Elsewhere</h4>
            <ol class="list-unstyled">
              <li><a href="#">GitHub</a></li>
              <li><a href="#">Twitter</a></li>
              <li><a href="#">Facebook</a></li>
            </ol>
          </div>
        </div><!-- sidebar ends -->

      </div><!-- /.row -->

    </div>

@endsection