@extends('author.master')
@section('title', 'Author All posts')
@section('content')
        <!-- Body start -->
        <div class="container mt-4 mb-4">
            <div class="row">
                <h1>You Post</h1>
                <div class="col-md-12">
                    @if(session('post_updated_message'))
                    <div class="mt-2 alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> {{ session('post_updated_message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    @if(session('post_delete_message'))
                        <div class="mt-2 alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> {{ session('post_delete_message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                    @endif
                    <table class="table table-hover border border-muted bg-light text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th>Post Title</th>
                                <th>Published Date</th>
                                <th>Edit or Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($current_user_all_posts as $single_post)
                            <tr>
                                <td>{{$single_post->postTitle}}</td>
                                <td>{{$single_post->created_at}}</td>
                                <td>
                                    <a href="{{ route('editPost', $single_post->postID) }}">
                                        <i class="fas fa-edit text-warning"></i>
                                    </a>
                                    &nbsp;
                                    
                                    <a href="{{ route('deletePost', $single_post->postID) }}">
                                        <i class="fas fa-trash-alt text-danger"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

@endsection

