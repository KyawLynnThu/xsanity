@extends('layouts.backendtemplate')
@section('content')


    <div class="content-wrapper">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-mute d-inline-block">Category Edit Form</h6>

        <a href="{{route('category.index')}}" class="btn btn-info float-right"><i class="fas fa-arrow-circle-left"></i></a>
      </div>
      <div class="card-body">
        {{-- Change Error Message UI (try yourself) --}}
        <form method="post" action="{{route('category.update',$category->id)}}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
        <div class="row mb-3">
            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
              <input type="text" name="name" class="form-control" id="inputName" value="{{$category->name}}">
            </div>
          </div>
        <div class="row mb-3">
            <div class="col-sm-10 offset-sm-2">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </div>
        </form>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->
@endsection