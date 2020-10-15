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
            <h3 class="mt-4">All Posts of {{ $author_name }}</h3>
            @if(count($all_posts_of_clicked_author) > 0)
                @foreach($all_posts_of_clicked_author as $post)                
                <div class="row bg-light p-4 mt-3 border border-muted">
                    <div class="col-md-12">
                        <a href="{{ route('readPost') }}/?post_id={{$post->postID }}">
                            <h4>{{ $post->postTitle }}</h4>
                        </a>
                        <p class="text-justify">{{Illuminate\Support\Str::limit($post->description, 300, $end='...')}} </p>
                        <div>
                            Posted on <span class="bg-dark text-light p-1"> {{ $post->created_at }} </span>
                            <a href="{{ route('readPost') }}/?post_id={{$post->postID }}" class="btn btn-danger float-right">Read More</a>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <p>This author has not posted anything yet</p>    
            @endif
            
        </div>

    </div>
    @endsection


