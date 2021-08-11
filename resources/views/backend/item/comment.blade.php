@extends('layouts.backendtemplate')
@section('content')


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   <!-- Content Header (Page header) -->

    <section class="content" style="margin-top: 10px;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 col-sm-6 col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="margin-top: 10px;"><strong>Comments</strong></h3>
                <a href="{{route('item.index')}}" class="btn btn-info float-right"><i class="fas fa-arrow-circle-left"></i></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @if(Session('successMsg'))
                <div class="alert alert-success alert-dismissible show fade">
                  <div>{{ Session('successMsg')}}</div>
                  <button class="close" data-dismiss="alert">&times;</button>
                </div>
                @endif
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Comment</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php 
                      $i=1;
                    @endphp
                    @foreach($comments as $comment)
                    <tr>
                      <td>{{$i++}}</td>
                      <td>{{$comment->user->name}}</td>
                      <td>{{$comment->name}}</td>
                      <td>
                        <form action="{{route('showhide',$comment->id)}}" method="POST">
                          @csrf
                          @if($comment->status == 'show')
                            <button type="submit" class="btn btn-danger btn-sm">
                              <i class="fas fa-eye-slash"></i> Hide
                            </button>
                          @else
                            <button type="submit" class="btn btn-primary btn-sm">
                              <i class="fas fa-eye"></i> Show
                            </button>
                          @endif
                        </form>
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

    
@endsection