@extends('author.master')
@section('title', 'Create new post')
@section('content')
        <!-- Body start -->
        <div class="container">
            <div class="row">
                <div class=" border border-muted bg-light mt-4 mb-2 col-md-8 offset-md-2">
                    @if(session('post_publish_message'))
                    <div class="mt-2 alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> {{ session('post_publish_message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <h1>Create post</h1>
                    <form action="{{ route('addPostInDB') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title <span class="require">*</span></label>
                            <input type="text" class="form-control" name="title" />
                        </div>
                        <div class="form-group">
                            <label for="title">Category <span class="require">*</span></label>
                            <!-- <input type="text" class="form-control" name="title" /> -->
                            <select name="category" class="form-control" id="">
                                @foreach($all_categories as $category)
                                    <option value="{{ $category->categoryID }}">{{ $category->categoryName }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Description <span class="require">*</span></label>
                            <textarea rows="8" class="form-control" name="description"></textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">
                                Post
                            </button>
                            <button class="btn btn-dark">
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection