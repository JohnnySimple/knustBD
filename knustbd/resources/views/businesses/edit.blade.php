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
        <h2 class="blog-title">{{$business->name}}</h2>
      </div>

      <div class="row">
        <div class="col-md-8 col-sm-8 blog-main">
        <h2>Add category</h2>
                <form method="post" action="{{ route('businessescategories.store')}}">
                    {{ csrf_field() }}
                    <!-- <input type="hidden" name="_method" value="put"> -->
                    <input type="hidden" name="businessId" value="{{ $business->id }}">
                    <div class="form-group">
                    <label for="business-category">Business Category <span class="required">*</span></label>
                        <select name="category" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                     </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Add">
                    </div>
                </form>

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