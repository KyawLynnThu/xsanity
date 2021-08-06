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

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with Subcategory List</h3>
                <a href="{{route('subcategory.create')}}" class="btn btn-info float-right"><i class="fas fa-plus"></i></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category Name</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
              @php 
                $i=1;
              @endphp
              @foreach($subcategories as $subcategory)
              <tr>
                <td>{{$i++}}</td>
                <td>
                  {{$subcategory->name}}
                </td>
                <td>{{$subcategory->category->name}}</td>
                <td>
                  <a href="{{route('subcategory.edit',$subcategory->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                  <a href="#" data-id="{{route('subcategory.destroy',$subcategory->id)}}" class="btn btn-danger btn-sm deletebtn"><i class="fas fa-trash-alt"></i></a>
                </td>
              </tr>
              @endforeach
            </tbody>
                  
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
    <!-- /.content -->
  </div>



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