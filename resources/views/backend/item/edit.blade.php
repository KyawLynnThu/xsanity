@extends('layouts.backendtemplate')
@section('content')


    <div class="content-wrapper">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-mute d-inline-block">Subcategory Edit Form</h6>

        <a href="{{route('item.index')}}" class="btn btn-info float-right"><i class="fas fa-arrow-circle-left"></i></a>
      </div>


      <div class="card-body">
        {{-- Change Error Message UI (try yourself) --}}
        <form method="post" action="{{route('item.update',$item->id)}}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="row mb-3">
            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
              <input type="text" name="name" class="form-control" id="inputName" value="{{$item->name}}">
            </div>
          </div>
          <div class="row mb-3">
            <label for="code" class="col-sm-2 col-form-label">Code Number</label>
            <div class="col-sm-10">
              <input type="text" name="code" class="form-control" id="code" value="{{$item->codeno}}">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputPhoto" class="col-sm-2 col-form-label">Photo</label>
            <div class="col-sm-10">
              <input type="file" name="photo" class="form-control-file" id="inputPhoto">
              <img src="{{$item->photo}}" alt="photo" class="w-25">
            </div>
          </div>
          <div class="row mb-3">
            <label for="rate" class="col-sm-2 col-form-label">Rate</label>
            <div class="col-sm-10">
              <input type="text" name="rate" class="form-control" id="rate" value="{{$item->rate}}">
            </div>
          </div>
          <div class="row mb-3">
            <label for="price" class="col-sm-2 col-form-label">Price</label>
            <div class="col-sm-10">
              <input type="text" name="price" class="form-control" id="price" value="{{$item->price}}">
            </div>
          </div>
          <div class="row mb-3">
            <label for="discount" class="col-sm-2 col-form-label">Discount</label>
            <div class="col-sm-10">
              <input type="text" name="discount" class="form-control" id="discount" value="{{$item->discount}}">
            </div>
          </div>
          <div class="row mb-3">
            <label for="detail" class="col-sm-2 col-form-label">Details</label>
            <div class="col-sm-10">
              <input type="text" name="detail" class="form-control" id="detail" value="{{$item->details}}">
            </div>
          </div>
          <div class="row mb-3">
            <label for="description" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
              <textarea name="description" class="form-control" id="description" rows="3">{{$item->description}}</textarea>
            </div>
          </div>
          <div class="row mb-3">
            <label for="release_year" class="col-sm-2 col-form-label">Release Year</label>
            <div class="col-sm-10">
              <input type="text" name="release_year" class="form-control" id="release_year" value="{{$item->release_year}}">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputSubcategory" class="col-sm-2 col-form-label">Subcategory</label>
            <div class="col-sm-10">
              <select name="subcategory" class="form-control" id="inputSubcategory">
                <optgroup label="Choose Subcategory">
                  @foreach($subcategories as $subcategory)
                  <option value="{{$subcategory->id}}" @if($subcategory->id==$subcategory->subcategory_id) {{'selected'}} @endif>{{$subcategory->name}}</option>
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