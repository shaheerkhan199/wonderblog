@extends('base')
@section('title', 'Login')
@section('headerAndFooter')
    <div class="sidenav">
        <div class="login-main-text">
           <h2><a class="text-light" href="{{ route('home') }}">WonderBlog</a><br> Login Page</h2>
           <p>Login or register from here to access.</p>
        </div>
     </div>
     <!-- Login -->
     <div class="login-main">
        <div class="col-md-6 col-sm-12">
           <div class="login-form">
              <form method="POST" action="{{ route('authenticate') }}">
              @csrf
                 <div class="form-group">
                    <label>User Name</label>
                    <input type="text" name="username" class="form-control" placeholder="User Name">
                 </div>
                 <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                 </div>
                 <button type="submit" class="btn btn-black">Login</button>
                 <button type="button" class="btn btn-secondary registerBtn">Register</button>
              </form>
           </div>
            @if(session('signup_successs_message'))
               <div class="mt-2 alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Success!</strong> {{ session('signup_successs_message') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
            @endif

            @if(session('invalid_login_message'))
               <div class="mt-2 alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Warning!</strong> {{ session('invalid_login_message') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
            @endif
        </div>
     </div>
   
     <!-- Signup -->
     <div class="signup-main">
      <div class="col-md-6 col-sm-12 mt-5">
         <div class="signup-form">
            <form method="POST" action="{{ route('registerUser') }}">
                @csrf
               <div class="form-group">
                  <label>Full Name</label>
                  <input type="text" name="fullname" class="form-control" placeholder="Full Name">
               </div>
               <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" class="form-control" placeholder="Email">
               </div>
               <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password" class="form-control" placeholder="Password">
               </div>
               <div class="form-group">
                  <label>Gender</label>
                  <div class="form-check">
                      <label class="form-check-label">
                        <input type="radio" value="Male" class="form-check-input" name="gender">Male
                      </label>
                    </div>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="radio" value="Female" class="form-check-input" name="gender">Female
                      </label>
                    </div>
               </div> 
               <button type="submit" class="btn btn-black">Signup</button>
               <button type="reset" class="btn btn-secondary">Reset</button>
               <br>
               <a href="#" class="gotoSignUp">Already have an account?</a>
            </form>
         </div>
      </div>
   </div>
    
    <script>
       $(document).ready(()=>{
         $(".registerBtn").click(()=>{
                $(".login-form").slideUp(2200, ()=>{
                  $(".signup-form").show(2000);
                });  
            });
         
            $(".gotoSignUp").click(()=>{
                $(".signup-form").slideUp(2200, ()=>{
                  $(".login-form").show(2000);
                });  
            });
       });
   </script>
@endsection