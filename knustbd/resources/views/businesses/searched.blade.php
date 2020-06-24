@extends('layouts.app')

<style>
    .business-post {
        /* border: 1px solid #ccc; */
        height: 120px;
        margin-top: 20px;
    }
    .business-img {
        height: 120px;
    }
    .business-name {
        font-size: 13px;
        font-weight: bold;
    }
    @media only screen and (max-width: 800px) {
      .business-post {
        margin-bottom: 150px;
      }
    }
    
</style>
@section('content')

    <div class="container">


      <div class="row">
        <div class="col-sm-8 blog-main">
          <div class="blog-header">
            <h2 class="blog-title">Search Results for {{ $cat->name }}</h2>
            <hr>
          </div>
            @foreach($businesses as $business)
                @foreach($business->categories as $category)
                    @if($category->id == $cat->id)

                         <!-- single business -->
                            <div class="business-post">
                                <a href="/businesses/{{ $business->id }}"><div class="col-md-3 col-sm-3 business-img" 
                                style="background-image:url('/imgs/businessImgs/{{ $business->imageName }}');background-size:cover;
                                background-position:center;">
                                </div></a>
                                <div class="col-md-8 col-sm-8">
                                <a href="/businesses/{{ $business->id }}" style="text-decoration:none;">
                                  <p class="business-name" style="color:black;">
                                    {{ $business->name }}
                                  </p>
                                </a>
                                <p style="color:blue;">{{ $business->location }} - 0{{ $business->phone }}</p>
                                
                                <p>
                                    @for($i=0; $i<$business->rating; $i++)
                                        <span class="fas fa-star" style="color:white;background-color:red;
                                            padding:2px;border-radius:15%;"></span>
                                    @endfor
                                    @for($i=1; $i < 6-$business->rating; $i++)
                                        <span class="fas fa-star" style="color:white;background-color:#ccc;
                                                padding:2px;border-radius:15%;"></span>
                                    @endfor
                                </p>
                                <p>
                                    <span style="color:blue;">Categories: </span>
                                    @foreach($business->categories as $cate)
                                        {{ $cate->name }},
                                    @endforeach
                                    
                                </p>
                                </div>
                            </div>
                            <hr>
                        <!-- end of single business -->
                    @endif
                @endforeach
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