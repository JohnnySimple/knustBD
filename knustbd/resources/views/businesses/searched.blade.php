@extends('layouts.app')

@section('content')

    <div class="container">
        <!-- <h2>Businesses of a particular category will be listed here</h2> -->
        @foreach($businesses as $business)
            @foreach($business->categories as $category)
                @if($category->id == $cat->id)
                    <div>
                        <p>{{ $business->name }}</p>
                    </div>
                @endif
            @endforeach
        @endforeach
    </div>

@endsection