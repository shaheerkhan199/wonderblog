@extends('base')

@section('headerAndFooter')
<div class="main-container">
    <!-- navigation bar start -->
    <nav class="sticky-top navbar navbar-expand-lg navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="{{ route('home') }}">WonderBlog</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('loginAndSignup') }}">Create Post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('authors') }}">Authors</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" method="POST" action="{{ route('search') }}">
                @csrf
                <input required name="searchQuery" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <!-- navigation bar end -->
    <!-- Banner -->
    {{-- <div class="bg-primary p-5 text-light">
        <div class="container">
            <h2>Welcome to my awesome blog</h2>
            <p>You can post an article here.</p>
        </div>
    </div> --}}

    @section('content')
    @show

    <!-- Footer -->
    <footer class="page-footer font-small bg-dark text-light">
        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2020 Copyright: Powered by M.Shaheer khan
        </div>
    </footer>
    <!-- Footer end -->
</div>

@endsection
