@extends('layouts.backendtemplate')
@section('content')


    <div class="content-wrapper">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-mute d-inline-block">Subcategory Edit Form</h6>

        <a href="{{route('subcategory.index')}}" class="btn btn-info float-right"><i class="fas fa-arrow-circle-left"></i></a>
      </div>


      <div class="card-body">
        {{-- Change Error Message UI (try yourself) --}}
        <form method="post" action="{{route('subcategory.update',$subcategory->id)}}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="row mb-3">
            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
              <input type="text" name="name" class="form-control" id="inputName" value="{{$subcategory->name}}">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputCategory" class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
              <select name="category" class="form-control" id="inputCategory">
                <optgroup label="Choose Category">
                  @foreach($categories as $category)
                  <option value="{{$category->id}}" @if($category->id==$subcategory->category_id) {{'selected'}} @endif>{{$category->name}}</option>
                  @endforeach
                </optgroup>
              </select>
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