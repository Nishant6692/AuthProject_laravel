@extends('layouts.mainLayout')
@section('title',"Auth Project|Log In")
@section('content')

<div class="mainContainer">
  <div class="signUpContainer">
  
  <div class="container">
        <form class="login-form" action="{{ route('login-user') }}" method="post">
            @csrf
            <h1>Log In</h1>
            <hr>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" value="{{ old('email') }}" class="form-control" placeholder="Enter email" name='email'>
                <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                <span class="text-danger" data-field="email"></span>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" value="{{ old('password') }}" class="form-control" placeholder="Password" name="password">
                <span class="text-danger">@error('password') {{ $message }} @enderror</span>
                <span class="text-danger" data-field="password"></span>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Log In</button>
        </form>

        <p class="signup-link">If you don't have an account, please <a href="{{ route('signUp') }}">Sign Up</a> here</p>
    </div>

</div>
@endsection