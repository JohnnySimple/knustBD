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
    .review {
    }
    
</style>
@section('content')

    <div class="container">

      <div class="blog-header">
        <h2>{{ $business->name }}</h2>
      </div>

      <div class="row">
        <div class="col-sm-8 blog-main">
            
             <!-- single business -->
             <div class="business-post">
                                <a href="/businesses/{{ $business->id }}"><div class="col-md-3 col-sm-3 business-img" 
                                style="background-image:url('/imgs/offer-img.png');background-size:cover;">
                                </div></a>
                                <div class="col-md-8 col-sm-8">
                                <a href="/businesses/{{ $business->id }}" style="text-decoration:none;">
                                  <p class="business-name" style="color:black;">
                                    {{ $business->name }}
                                  </p>
                                </a>
                                <p style="color:blue;">{{ $business->location }} - 0{{ $business->phone }}</p>
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
            <h2>Reviews</h2>
            @foreach($business->comments as $comment)
                <div class="review">
                    
                    @foreach($users as $user)
                        @if($user->id == $comment->user_id)
                            <p style="color:blue;">{{ $user->name }}</p>
                        @endif
                    @endforeach
                    @for($i=0; $i<$comment->rating; $i++)
                        <span class="fas fa-star" style="color:white;background-color:orange;
                            padding:2px;border-radius:15%;"></span>
                    @endfor
                    @for($i=1; $i < 6-$comment->rating; $i++)
                        <span class="fas fa-star" style="color:white;background-color:#ccc;
                                padding:2px;border-radius:15%;"></span>
                    @endfor
                    <br>
                    
                    {{$comment->body}}
                </div>
                <hr>
            @endforeach
            <h3>Add review</h3>
                <!-- Example row of columns -->
                <div class="row" style="margin:10px;">
                        <form method="post" action="{{ route('comments.store') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="commentable_type" value="App\Business">
                            <input type="hidden" name="commentable_id" value="{{$business->id}}">
                            <div class="form-group">
                                <label for="star-rating">Rating</label>
                                <select name="rating" id="star-rating" class="form-control" required>
                                    <option selected>--select rating--</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="comment-content">Comment</label>
                                <textarea name="body" id="comment-content" placeholder="Comment"
                                cols="30" rows="5" spellcheck="false" required class="form-control autosize-target text-left"
                                style="resize:vertical;"></textarea>
                            </div>
                            
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Add comment">
                            </div>
                        </form>
                </div>
            <!-- single comment -->
            <div class="comment-post">
                
            </div>
            <!-- single comment -->
            

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