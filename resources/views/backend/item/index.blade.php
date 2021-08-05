@extends('layouts.backendtemplate')
@section('content')


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 col-sm-6 col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Item List</h3>
                <a href="{{route('item.create')}}" class="btn btn-info float-right">New</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Product</th>
                    <th>Rate</th>
                    <th>Price</th>
                    <th>Release Year</th>
                    <th>Type</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php 
                      $i=1;
                    @endphp
                    @foreach($items as $item)
                    <tr>
                      <td>{{$i++}}</td>
                      <td>
                        <img src="{{asset('storage/'.$item->photo)}}" alt="photo" style="width: 100px; height: 100px;" align="left">
                        <b>{{$item->name}}</b><br>
                        <span>Code No:{{$item->codeno}}</span>
                      </td>
                      <td>{{$item->rate}}</td>
                      <td>
                        @php
                          if($item->discount){
                        @endphp
                          <span class="d-block"> {{$item->discount}} Ks</span>
                          <strike> {{$item->price}} Ks </strike> 
                        @php
                          } else {
                        @endphp
                          <span class="d-block"> {{$item->price}} Ks </span>
                        @php
                          }
                        @endphp
                      </td>
                      <td>{{$item->release_year}}</td>
                      <td>{{$item->subcategory->name}}</td>
                      <td>
                        <a href="{{route('item.edit',$item->id)}}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="#" data-id="{{route('item.destroy',$item->id)}}" class="btn btn-danger btn-sm deletebtn">Delete</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Product</th>
                    <th>Rate</th>
                    <th>Price</th>
                    <th>Release Year</th>
                    <th>Type</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>

    <div class="modal fade" id="deleteModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="post" action="" id="deleteModalForm">
          @csrf
          @method('DELETE')
          <div class="modal-header">
            <h4 class="modal-title">Are you sure to delete?</h4>
          </div>
          <div class="modal-footer">
            <input type="submit" name="btnsubmit" class="btn btn-danger" value="Delete">
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
      $('.deletebtn').click(function(){
        var id = $(this).data('id');
        // console.log(id);
        $('#deleteModalForm').attr('action',id);
        $('#deleteModal').modal('show');
      })
    })
  </script>
@endsection