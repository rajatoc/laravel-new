@extends('layouts.frontend')

@section('title','Home')

@section('content')
    <div id="logreg-forms">
        <form class="form-signin" id="login-form" action="login">
        	@csrf
            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"> Sign in</h1>
            
           
             <div class="form-failure-message d-none pb-1"></div>
            <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required="" autofocus="">
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="">
            
            <button class="btn btn-success btn-block" type="submit"><i class="fas fa-sign-in-alt"></i> Sign in</button>
           
            <hr>
            <!-- <p>Don't have an account!</p>  -->
            <button class="btn btn-primary btn-block" type="button" id="btn-signup"><i class="fas fa-user-plus"></i> Sign up New Account</button>
            </form>

           
            
            <form id="signup-form"  action="api/auth/signup/" class="form-signup">
                <input type="text" name="name" id="user-name" class="form-control" placeholder="Full name" required="" autofocus="">
                <input type="email"  name="email" id="user-email" class="form-control" placeholder="Email address" required autofocus="">
                <input type="password"  name="password" id="user-pass" class="form-control" placeholder="Password" required autofocus="">

                <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-user-plus"></i> Sign Up</button>
                <a href="#" id="cancel_signup"><i class="fas fa-angle-left"></i> Back</a>
            </form>
            <br>
            
    </div>
@endsection
@section('scripts')
<script src="{{ asset('assets/js/script.js') }}"></script>
@endsection 