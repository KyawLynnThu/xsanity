@extends('layouts.backendtemplate')
@section('content')


    <div class="content-wrapper">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-mute d-inline-block">Subcategory Form</h6>

        <a href="{{route('subcategory.index')}}" class="btn btn-info float-right">Back</a>
      </div>


      <div class="card-body">
        {{-- Change Error Message UI (try yourself) --}}
        <form method="post" action="{{route('subcategory.store')}}">
          @csrf
          <div class="row mb-3">
            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
              <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="inputName">
              @if ($errors->has('name'))
                  <span class="text-danger">{{ $errors->first('name') }}</span>
              @endif
            </div>
          </div>

          <div class="row mb-3">
            <label for="inputCategory" class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
              <select name="category" class="form-control" id="inputCategory">
                <optgroup label="Choose Category">
                  @foreach($categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
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
  <!-- /.container-fluid -->
@endsection