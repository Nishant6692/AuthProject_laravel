@extends('layouts.mainLayout')
@section('title',"Auth Project|Sign Up")
@section('content')
  
  <div class="mainContainer">
    <div class="signUpContainer">
    <form class="signup-form" action="{{ route('register-user') }}" method="post" enctype="multipart/form-data" >
            @csrf
            <h1>Sign Up</h1>
            <hr>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" value="{{ old('name') }}" class="form-control" placeholder="Enter name" name="name">
                <span class="text-danger" data-field="name"></span>
            </div>
            
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" value="{{ old('email') }}" class="form-control" placeholder="Enter email" name="email">
                <span class="text-danger" data-field="email"></span>
            </div>
            
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" value="{{ old('phone') }}" class="form-control" placeholder="Enter phone" name="phone" maxlength="10">
                <span class="text-danger" data-field="phone"></span>
            </div>
        
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Password" name="password">
                <span class="text-danger" data-field="password"></span>
            </div>
           
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation">
                <span class="text-danger" data-field="password_confirmation"></span>
            </div>
            
            <div class="form-group">
                <label for="role">Role</label>
                <select class="form-control" name="role">
                    <option value="1" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="2" {{ old('role') == 'user' ? 'selected' : '' }} selected>User</option>
                </select>
                <span class="text-danger" data-field="role"></span>
            </div>
            
            <div class="form-group">
                <label for="image">Upload Image</label>
                <input type="file" class="form-control" name="image">
                <span class="text-danger" data-field="image"></span>
            </div>
           
            <button type="submit" class="btn btn-primary mt-2">Sign Up</button>
        </form>

        <p class="login-link">Already have an account? Please <a href="{{ route('logIn') }}">Log in</a></p>
    </div>

  </div>

  @endsection