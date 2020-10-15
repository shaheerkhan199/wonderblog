@extends('viewer.master')
@section('title', 'Post Page')
@section('content')

    <div class="main-container">
        <!-- Body -->
        <div class="container-fluid">
            <!-- Image with title -->
            <div class="row mb-2">
                <div class="col-md-12 px-0 imageContainer">
                    <img src="{{ asset('images/image.jpg') }}" class="img-fluid">
                    <div class="text-block">
                        <h1 class="text-center">{{ $clicked_post->postTitle }}</h1>
                        <h5 class="text-center">{{ $author->fullName}} | {{ $category->categoryName}} | {{ $clicked_post->created_at }}</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row mt-4 mb-3">
                <aside class="col-md-8 bg-light ">
                    <p class="text-justify">
                        {{ $clicked_post->description }}
                    </p>
                </aside>
                <aside class="col-md-4 bg-muted">
                    <div class="well bg-light p-5 border border-muted">
                        <h2>Subscription Box</h2>
                        <p>For Future posts please subscribe our newsletter</p>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Type your email...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                            </span>
                        </div>

                    </div>

                    <div class="mt-4 border border-muted bg-light">
                        <h3 class="text-center mt-4">Popular Post</h3>
                        <ul class="ml-5 mt-3">
                            <li><a href="#">Title of Post1</a></li>
                            <li><a href="#">Title of Post2</a></li>
                            <li><a href="#">Title of Post3</a></li>
                        </ul>
                    </div>

                    <div class="mt-4 border border-muted bg-light">
                        <h3 class="text-center mt-4">Follow me on</h3>
                        <h4 class="text-center">
                            <a href="#"><i class="fab fa-facebook-square text-primary"></i></a>
                            <a href="#"><i class="fab fa-twitter text-primary"></i></a>
                            <a href="#"><i class="fab fa-google-plus text-danger"></i></a>
                            <a href="#"><i class="fab fa-instagram text-warning"></i></a>
                            <a href="#"><i class="fab fa-youtube text-danger"></i></a>
                        </h4>
                    </div>
                </aside>
            </div>
        </div>


    </div>

    @endsection