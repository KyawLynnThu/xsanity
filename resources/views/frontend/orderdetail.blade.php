@extends('layouts.frontendtemplate')

@section('content')
<!-- breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active">Profile</li>
            </ol>
        </div>
    </div>
<!-- //breadcrumbs -->


<!-- register -->
    <div class="register">
        <div class="container">
                <div class="content-wrapper">
                    <h1>Invoice</h1> <br>
    <!-- Content Header (Page header) -->
  

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
               
              <div class="row">
                <div class="col-12">
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
           
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  
                  From
                  <address>
                    <strong>Admin, Inc.</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (804) 123-5432<br>
                    Email: info@almasaeedstudio.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                     @foreach($info as $order)
                  To
                  <address>
                    <strong>{{$order->user->name}}</strong><br>
                    {{$order->user->address}}<br>
                    Phone: {{$order->user->phone}}<br>
                    Email: {{$order->user->email}}
                  </address>
                   

                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice #007612</b><br>
                  <br>
                  <b>Order ID:</b> {{$order->voucherno}}<br>
                  <b>Payment Due:</b> 2/22/2014<br>
                  <b>Account:</b> 968-34567 <br>
                  <b>Order Status:</b> 

                  @if ($order->status=='0')
                  <span class='badge rounded-pill  bg-primary'> Pending </span>
                  @elseif ($order->status=='1')
                   <span class='badge rounded-pill bg-dark '> Confirm </span>
                   @elseif ($order->status=='2')
                   <span class='badge rounded-pill bg-success '> Deliver </span>
                    @elseif ($order->status=='3')
                   <span class='badge rounded-pill bg-success'> Success </span>
                   @elseif ($order->status=='4')
                   <span class='badge rounded-pill bg-success'> Cancel </span>
                  @endif

                  @endforeach
                  
                </div>
                
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Qty</th>
                      <th>Product</th>
                      <th>Serial #</th>
                      <th>Price</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($orders as $order)
                    <tr>
                      <td>{{$order->qty}}</td>
                      <td>{{$order->tname}}</td>
                      <td>{{$order->tcode}}</td>
                      <td>{{$order->tprice}}</td>
                      
                      <td>{{$order->total}}</td>
                    </tr>
                    
                   @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              
              <!-- /.row -->
             
              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  @foreach($info as $order)
                    <br>
                    <h3> Customer Note</h3>
                   
                 <div class="col-10 mt-3">
                  <div class="col-sm-12 invoice-col">
                  {{$order->note}}
                </div>

                 
                    
                  </div>
                
                </div>
                <!-- /.col -->
                <div class="col-6 ">
                  <h3 >Total : {{$order->total}}</h3>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>{{$order->total}}</td>
                      </tr>
                      <tr>
                        <th>Tax (9.3%)</th>
                        <td>$10.34</td>
                      </tr>
                      <tr>
                        <th>Shipping:</th>
                        <td>$5.80</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td>$265.24</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
           
               @endforeach
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
        </div>
    </div>
<!-- //register -->
@endsection



