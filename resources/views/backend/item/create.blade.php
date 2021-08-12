@extends('layouts.backendtemplate')
@section('content')


    <div class="row">
      <div class="col">
        <div class="content-wrapper">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-mute d-inline-block">Item Form</h6>

        <a href="{{route('item.index')}}" class="btn btn-info float-right"><i class="fas fa-arrow-circle-left"></i></a>
      </div>


      <div class="card-body">
        {{-- Change Error Message UI (try yourself) --}}
        <form method="post" action="{{route('item.store')}}" enctype="multipart/form-data">
          @csrf
          <div class="row mb-3">
            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
              <input type="text" name="name" class="form-control @error('name') is-invalid @enderror "id="inputName">
              @if ($errors->has('name'))
                  <span class="text-danger">{{ $errors->first('name') }}</span>
              @endif
            </div>
          </div>
          <div class="row mb-3">
            <label for="code" class="col-sm-2 col-form-label">Code Number</label>
            <div class="col-sm-10">
              <input type="text" name="code" class="form-control" @error('code') is-invalid @enderror" id="code">
              @if ($errors->has('code'))
                  <span class="text-danger">{{ $errors->first('code') }}</span>
              @endif
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputPhoto" class="col-sm-2 col-form-label">Photo</label>
            <div class="col-sm-10">
              <input type="file" name="photo" class="form-control-file" @error('photo') is-invalid @enderror "id="inputPhoto">
              @if ($errors->has('photo'))
                  <span class="text-danger">{{ $errors->first('photo') }}</span>
              @endif
            </div>
          </div>
          <div class="row mb-3">
            <label for="rate" class="col-sm-2 col-form-label">Rate</label>
            <div class="col-sm-10">
              <input type="text" name="rate" class="form-control" @error('rate') is-invalid @enderror id="rate">
              @if ($errors->has('rate'))
                  <span class="text-danger">{{ $errors->first('rate') }}</span>
              @endif
            </div>
          </div>
          <div class="row mb-3">
            <label for="price" class="col-sm-2 col-form-label">Price</label>
            <div class="col-sm-10">
              <input type="text" name="price" class="form-control" @error('price') is-invalid @enderror id="price">
              @if ($errors->has('price'))
                  <span class="text-danger">{{ $errors->first('price') }}</span>
              @endif
            </div>
          </div>
          <div class="row mb-3">
            <label for="discount" class="col-sm-2 col-form-label">Discount</label>
            <div class="col-sm-10">
              <input type="text" name="discount" class="form-control" id="discount">
            </div>
          </div>
          <div class="row mb-3">
            <label for="detail" class="col-sm-2 col-form-label">Details</label>
            <div class="col-sm-10">
              <input type="text" name="detail" class="form-control" id="detail">
            </div>
          </div>
          <div class="row mb-3">
            <label for="description" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
              <textarea name="description" class="form-control" id="description" rows="3"></textarea>
            </div>
          </div>
          <div class="row mb-3">
            <label for="release_year" class="col-sm-2 col-form-label">Release Year</label>
            <div class="col-sm-10">
              <input type="text" name="release_year" class="form-control" @error('release_year') is-invalid @enderror id="release_year">
              @if ($errors->has('release_year'))
                  <span class="text-danger">{{ $errors->first('release_year') }}</span>
              @endif
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputSubcategory" class="col-sm-2 col-form-label">Subcategory</label>
            <div class="col-sm-10">
              <select name="subcategory" class="form-control" id="inputSubcategory">
                <optgroup label="Choose subcategory">
                  @foreach($subcategories as $subcategory)
                  <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                  @endforeach
                </optgroup>
              </select>
            </div>
          </div>
          
          <div class="row mb-3">
            <div class="col-sm-10 offset-sm-2">
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </div>
        </form>
      </div>
    </div>

  </div>
      </div>
    </div>
  
@endsection