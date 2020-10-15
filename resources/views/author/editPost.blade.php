@extends('author.master')
@section('title', 'Edit Post')
@section('content')
        <!-- Body start -->
        <div class="container">
            <div class="row">
                <div class=" border border-muted bg-light mt-4 mb-2 col-md-8 offset-md-2">
                    <h1>Edit post</h1>
                    <form action="{{ route('updatePost', $post->postID) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title <span class="require">*</span></label>
                            <input value="{{ $post->postTitle}}" type="text" class="form-control" name="title" />
                        </div>
                        <div class="form-group">
                            <label for="title">Category <span class="require">*</span></label>
                            <!-- <input type="text" class="form-control" name="title" /> -->
                            <select name="category" class="form-control" id="">
                                @foreach($all_categories as $category)
                                    <option value="{{ $category->categoryID }}">{{ $category->categoryName }}</option>
                                @endforeach
                                {{-- <option>Science and Technology</option> --}}
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Description <span class="require">*</span></label>
                            <textarea rows="8" class="form-control" name="description">
                                {{ $post->description}}
                            </textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">
                                Update Post
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