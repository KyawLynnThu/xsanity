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
                <h3>Account Profile</h3> 
                <hr>                

                <label>Name : </label>
                <label>{{$users->name}}</label>
                <br><br>
                <label>Type : </label>
                @foreach($user_role as $user)
                 <label>{{$user->rname}}</label>
                 @endforeach
                <br><br>
                <label>Email : </label>
                <label>{{$users->email}}</label>
                <br><br>
                <label>Phone : </label>
                <label>{{$users->phone}}</label>
                <br><br>
                <label>Address : </label>
                <label>{{$users->address}}</label>
                <br><br>

                <a href="{{route('user.edit',Auth::user()->id)}}
                    " class="btn btn-default search" style="background-color: #EC7063; color: white;"><i class="fa fa-edit"></i> Update My Profile</a>
             
                   
                </div>
        </div>
    </div>
<!-- //register -->
@endsection
@section('script')
<script type="text/javascript" src="{{asset('frontend_assets/js/custom.js')}}"></script>
@endsection



