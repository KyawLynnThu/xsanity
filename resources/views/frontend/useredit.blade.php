@extends('layouts.frontendtemplate')

@section('content')
<!-- breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active">Profile</li>
            </ol>
        </div>
    </div>
<!-- //breadcrumbs -->
<!-- register -->
    <div class="register">
        <div class="container">
            <h2>Profile</h2>
            <div class="login-form-grids my-4">
                <h5>profile information</h5>
                <form method="POST" action="{{route('user.update',$user->id)}}">
                    @csrf
                    @method('PUT')
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name" autofocus placeholder="Name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
              
               
                <h6>Login information</h6>
                   
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required autocomplete="email" placeholder="Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password" value="{{$user->password}}">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                   <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Password Confirmation" value="{{$user->password}}">

                    <div class="register-check-box">
                        <div class="check">
                            <label class="checkbox"><input type="checkbox" name="checkbox"><i> </i>I accept the terms and conditions</label>
                        </div>
                    </div>
                    <input type="submit" value="Update">
                </form>
                </div>
        </div>
    </div>
<!-- //register -->
@endsection



