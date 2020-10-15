@extends('base')

@section('headerAndFooter')
<div class="main-container">
    <!-- navigation bar start -->
    <nav class="sticky-top navbar navbar-expand-lg navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="{{route('home')}}">WonderBlog</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('createNewPost') }}">Create Post <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('authorAllPost') }}">All Posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{  route('profile') }}">Profile</a>
                </li>
            </ul>
            <ul class="navbar-nav mr-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ session('username') }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="logout">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Navigation Bar end -->
    @section('content')
    @show
    <!-- End of body -->
    <footer class="page-footer font-small bg-dark text-light">
        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2020 Copyright: Powered by M.Shaheer khan
        </div>
    </footer>
    <!-- Footer end -->

</div>
<!--End of main container-->

@endsection
