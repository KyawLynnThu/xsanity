@extends('layouts.backendtemplate')
@section('content')


    <div class="content-wrapper">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-mute d-inline-block">Profile >> {{ Auth::user()->name }}</h6>

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
              <input type="password" name="" class="col-sm-3 col-form-label" value="{$user->password}}"></label>
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
            
            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>

            <div class="col-sm-10">
              <label class="col-sm-3 col-form-label">{{$user->email}}</label>
            </div>

            <label for="inputName" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="password" name="" class="col-sm-3 col-form-label" value="{$user->password}}"></label>
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