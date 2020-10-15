@extends('author.master')
@section('title', 'My profile')
@section('content')
        <!-- Body start -->
        <div class="container">
            <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                @if(session('profile_updated_success'))
                                <div class="mt-2 alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Success!</strong> {{ session('profile_updated_success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif
                                @if(session('profile_updated_failed'))
                                <div class="mt-2 alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Warning!</strong> {{ session('profile_updated_failed') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif
                                <h4>Your Profile</h4>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <form method="POST" action="{{ route('updateAuthorProfile') }}">
                                    @csrf
                                  <div class="form-group row">
                                    <label for="lastname" class="col-4 col-form-label">Full Name</label>
                                    <div class="col-8">
                                      <input id="fullname" value="{{ $author_data->fullName }}" name="fullname" placeholder="Full Name" class="form-control here" type="text">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="email" class="col-4 col-form-label">Email*</label>
                                    <div class="col-8">
                                      <input id="email" value="{{ $author_data->email }}" name="email" placeholder="Email" class="form-control here" required="required" type="text">
                                    </div>
                                  </div>

                                  <div class="form-group row">
                                    <label for="newpass" class="col-4 col-form-label">Old Password</label>
                                    <div class="col-8">
                                      <input id="newpass" value="" name="password" placeholder="Password" class="form-control here" type="password">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="newpass" class="col-4 col-form-label">New Password</label>
                                    <div class="col-8">
                                      <input id="newpass" name="newpassword" placeholder="New Password" class="form-control here" type="password">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <div class="offset-4 col-8">
                                        {{-- <a href="{{ route('updateAuthorProfile', $author_data)}}" class="btn btn-primary">Update My Profile</a> --}}
                                      <button name="submit" type="submit" class="btn btn-primary">Update My Profile</button>
                                    </div>
                                  </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
        </div>
@endsection
