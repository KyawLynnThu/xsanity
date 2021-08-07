@extends('layouts.backendtemplate')
@section('content')


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Invoice</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
            </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
               
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> AdminLTE, Inc.
                    <small class="float-right">Date: 2/10/2014</small>
                  </h4>
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
                     @foreach($orderitems as $orderitem)
                  To
                  <address>
                   

                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice #007612</b><br>
                  <br>
                  <b>Order ID:</b> {{$orderitem->voucherno}}<br>
                  <b>Payment Due:</b> 2/22/2014<br>
                  <b>Account:</b> 968-34567 <br>
                  <b>Order Status:</b> 

                  @if ($orderitem->status=='0')
                  <span class='badge rounded-pill  bg-primary'> Pending </span>
                  @elseif ($orderitem->status=='1')
                   <span class='badge rounded-pill bg-dark '> Confirm </span>
                   @elseif ($orderitme->status=='2')
                   <span class='badge rounded-pill bg-success '> Deliver </span>
                    @elseif ($orderitem->orderstatus=='4')
                   <span class='badge rounded-pill bg-success'> Success </span>
                  @endif
                  
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
                      
                    <tr>
                      <td>{{$orderitem->qty}}</td>
                      <td>{{$orderitem->tname}}</td>
                      <td>{{$orderitem->code}}</td>
                      <td>{{$orderitem->tprice}}</td>
                      
                      <td>{{$orderitem->total}}</td>
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
                  
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <h3 >Total : {{$orderitem->total}}</h3>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>{{$orderitem->total}}</td>
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
              <div class="row no-print">
                <div class="col-12">
                  <a href="{{route('order.edit',$orderitem->id)}}" rel="noopener" target="_blank" class="btn btn-default float-right printbtn"><i class="fas fa-print"></i> Print</a>
                  
                </div>
              </div>
               
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.container-fluid -->
@endsection

@section('script1')
<script>

  $(document).ready(function(){
      $('.printbtn').click(function(){
        window.addEventListener("load", window.print());
      })
    })
 
</script>

@endsection