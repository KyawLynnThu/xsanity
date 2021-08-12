@extends('layouts.frontendtemplate')

@section('content')
<!-- breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active">My Order</li>
            </ol>
        </div>
    </div>
<!-- //breadcrumbs -->


<!-- register -->
    <div class="register">
        <div class="container">
           <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>VoucherNumber</th>
                    <th>Date</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Order Detail</th>
                    
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
                    <a href="{{route('orderdetailpage',Auth::user()->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-eye"></i> View</a>
                </td>
                
              </tr>
              @endforeach
                  </tbody>
                  
                </table>
        </div>
    </div>
<!-- //register -->
@endsection
@section('script')
<script type="text/javascript" src="{{asset('frontend_assets/js/custom.js')}}"></script>
@endsection



