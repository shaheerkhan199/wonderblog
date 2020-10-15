@extends('viewer.master')
@section('title', 'WonderBlog')
@section('content')
    <div class="main-container">
         <!-- Banner -->
        <div class="bg-primary p-5 text-light">
            <div class="container">
                <h2>Welcome to my awesome blog</h2>
                <p>You can post an article here.</p>
            </div>
        </div>

        <!-- Body -->
        <div class="container">
            <!-- First post -->
            <h4 class="mt-4">Search Results of <b>'{{ $searchQuery}}'</b></h4>
            @if(count($searchResults) > 0)
                @foreach($searchResults as $single_post)
                <div class="row bg-light p-4 mt-3">
                    <div class="col-md-12">
                        <a href="{{ route('readPost') }}/?post_id={{$single_post->postID }}">
                            <h4>{{$single_post->postTitle}}</h4>
                        </a>
                        <p class="text-justify">{{Illuminate\Support\Str::limit($single_post->description, 300, $end='...')}} </p>
                        <div>
                            Posted on <span class="bg-dark text-light p-1"> {{$single_post->created_at}}</span>
                            <a href="{{ route('readPost') }}/?post_id={{$single_post->postID }}" class="btn btn-danger float-right">Read More</a>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <p>No Results found for this query</p>
            @endif
            
        </div>
    </div>
    @endsection


