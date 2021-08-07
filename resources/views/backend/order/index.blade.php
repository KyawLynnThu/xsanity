@extends('layouts.backendtemplate')
@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Order List</h1>
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
                <h3 class="card-title">DataTable with Order List</h3>
                <a href="{{route('category.create')}}" class="btn btn-info float-right"><i class="fas fa-plus"></i></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>VoucherNumber</th>
                    <th>Date</th>
                    <th>Customer</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @php 
                $i=1;
              @endphp
              @foreach($orders as $order)
              <tr>
                <td>{{$i++}}</td>
                <td>
                  {{$order->voucherno}}
                </td>
                <td>
                   {{Carbon\Carbon::parse($order->orderdate)->format('d/m/Y')}}
                  
                  
                </td>
                <td>
                  {{$order->user->name}}
                  
                </td>
                <td>
                  {{number_format($order->total)}}
                  
                </td>
                <td>
                  @if ($order->status=='0')
                  <span class='badge rounded-pill  bg-primary'> Pending </span>
                  @elseif ($order->status=='1')
                   <span class='badge rounded-pill bg-dark '> Confirm </span>
                   @elseif ($order->status=='2')
                   <span class='badge rounded-pill bg-success '> Deliver </span>
                    @elseif ($order->status=='3')
                   <span class='badge rounded-pill bg-success'> Success </span>
                   @elseif ($order->status=='4')
                   <span class='badge rounded-pill bg-danger'> Cancel </span>
                  @endif


                </td>
                <td>
                  <a href="{{route('order.edit',$order->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                  
                  <button class="btn btn-outline-info btn-sm deletebtn"data-id="{{route('order.destroy',$order->id)}} "<?php if($order->status== 4 ) echo "disabled" ?> ><i class="fas fa-trash-alt"></i></button>
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