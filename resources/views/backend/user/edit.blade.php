@extends('layouts.backendtemplate')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Main content -->
            <div class=" p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <div class="card shadow mb-4">
                    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-mute d-inline-block">Information  </h3>

        <a href="{{route('user.index')}}" class="btn btn-info float-right"><i class="fas fa-arrow-circle-left"></i></a>
                    </div>
                    <div class="card-body">
        {{-- Change Error Message UI (try yourself) --}}
        <form method="post" action="" enctype="multipart/form-data">
        <div class="row mb-3">
            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
              <label class="col-sm-2 col-form-label">{{$user->name}}</label>
            </div>
            <label for="inputEmail" class="col-sm-2 col-form-label">Role</label>
            <div class="col-sm-10">
              @foreach($urole as $role)
              <label class="col-sm-3 col-form-label">{{$role->rname}}</label>
              @endforeach
              
            </div>
            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <label class="col-sm-3 col-form-label">{{$user->email}}</label>
            </div>
            <label for="inputName" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="password" name="" class="col-sm-3 col-form-label" value="{$user->password}}" readonly=""></label>
            </div>
            <label for="inputName" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
              <input type="text" name="" class="col-sm-3 col-form-label" value="{{$user->phone}}"></label>
            </div>

            <label for="inputName" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
              <input type="password" name="" class="col-sm-3 col-form-label" value="{$user->address}}"></label>
            </div>
          </div>
        <div class="row mb-3">
            <div class="col-sm-10 offset-sm-2">
               <a href="#" data-id="{{route('user.update',$user->id)}}" class="btn btn-primary btn-sm editbtn"><i class="fas fa-edit"></i> Edit</a>
              
            </div>
          </div>
        </form>
                    </div>
                  </div>
                </div>
                <!-- /.col -->
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  </div>
  <!-- /.container-fluid -->

 <div class="modal fade" id="editModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="post" action="" id="editModalForm">
          @csrf
          @method('PUT')
          <div class="modal-header">
            <h4 class="modal-title">Edit your profile</h4>
          </div>
          <div class="modal-content">
             <div class="row m-3">
            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
               <div class="col-sm-10">
              <input type="text" name="name" class="form-control" id="inputName" value="{{$user->name}}">
            </div>
            </div>
            <label for="inputEmail" class="col-sm-2 col-form-label">Role</label>
            @foreach($urole as $role)
            <div class="col-sm-10">
              <label class="col-sm-3 col-form-label">{{$role->rname}}</label>
            </div>
            @endforeach
            
              <label for="inputName" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
               <div class="col-sm-10">
              <input type="text" name="email" class="form-control" id="inputName" value="{{$user->email}}">
            </div>
            </div>

            <label for="inputName" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="password" name="" class="col-sm-3 col-form-label" value="{$user->password}} readonly"></label>
            </div>

               <label for="inputName" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
               <div class="col-sm-10">
              <input type="text" name="phone" class="form-control" id="inputName" value="{{$user->phone}}">
            </div>
            </div>

               <label for="inputName" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
               <div class="col-sm-10">
              <input type="text" name="address" class="form-control" id="inputName" value="{{$user->address}}">
            </div>
            </div>

          </div>
          </div>
          <div class="modal-footer">
            <input type="submit" name="btnsubmit" class="btn btn-danger" value="Update">
            <button class="btn btn-secondary" data-dismiss="modal">Cancle</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection

@section('script')
  <script type="text/javascript">
    $(document).ready(function(){
      $('.editbtn').click(function(){
        var id = $(this).data('id');
        // console.log(id);
        $('#editModalForm').attr('action',id);
        $('#editModal').modal('show');
      })
    })
  </script>
@endsection