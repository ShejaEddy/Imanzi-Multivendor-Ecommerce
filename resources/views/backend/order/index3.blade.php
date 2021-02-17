@extends('backend.layouts.master')

@section('main-content')
 <!-- DataTales Example -->
 <div class="card shadow-sm mb-4">
     <div class="row">
         <div class="col-md-12">
            @include('backend.layouts.notification')
         </div>
     </div>
     <div class="card-header py-3">
        <h4 class="font-weight-bold text-primary">Orders List</h4>
        <ul class="breadcrumbs">
            <li><a href="{{route('admin')}}" style="color:#999">Dashboard</a></li>
            <li><a href="" class="active text-primary">Orders</a></li>
        </ul>
      </div>
    <div class="card-body">
      <div class="table-responsive">
        @if(count($orders)>0)
        <table class="table table-stripped" id="order-dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
                <th>S.N.</th>
                <th>Customer</th>
                <th>Seller</th>
                <th>Product Name</th>
                <th>Total Amount</th>
                <th>Shipment Value</th>
                <th>Coupon Rate</th>
                <th>Payment Status</th>
                <th>Transaction Date</th>
                <th>Payment Method</th>
                <th>Order Status</th>
                <th>Action</th>
            </tr>
          </thead>
          {{-- <tfoot>
            <tr>
                <th>S.N.</th>
                <th>Customer</th>
                <th>Seller</th>
                <th>Product Name</th>
                <th>Total Amount</th>
                <th>Shipment Value</th>
                <th>Coupon Rate</th>
                <th>Payment Status</th>
                <th>Transaction Date</th>
                <th>Payment Method</th>
                <th>Order Status</th>
                <th>Action</th>
              </tr>
          </tfoot> --}}
          <tbody>
            @foreach($orders as $cart)
                <tr>
                    <td>{{$cart->id}}</td>
                    <td>{{$cart->order->first_name}}</td>
                    <td>{{$cart->product->seller->name}}</td>
                    <td>{{$cart->product->title}}</td>
                    <td>{{$cart->amount ?? 0}}RWF</td>
                    <td>{{$cart->shipment_amount ?? 0}}RWF</td>
                    <td>{{$cart->coupon_rate}}%</td>
                    <td>
                        @if($cart->order->payment_status=='unpaid')
                        <span class="badge badge-danger">Unpaid</span>
                        @else
                        <span class="badge badge-primary">Paid</span>
                        @endif
                    </td>
                    <td>{{$cart->order->created_at->format('D d m Y h:m:s')}}</td>
                    <td>{{$cart->order->payment_method}}</td>
                    <td>
                        @if($cart->status=='new')
                          <span class="badge badge-primary">{{$cart->status}}</span>
                        @elseif($cart->status=='process')
                          <span class="badge badge-warning">{{$cart->status}}</span>
                        @elseif($cart->status=='delivered')
                          <span class="badge badge-success">{{$cart->status}}</span>
                        @else
                          <span class="badge badge-danger">{{$cart->status}}</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('order.show',$cart->order->id)}}" class="text-warning btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="view" data-placement="bottom"><i class="fas fa-eye"></i></a>
                        {{-- <a href="{{route('seller.orders.edit',$cart->id)}}" class="text-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a> --}}
                        {{-- <form method="POST" action="{{route('order.destroy',[$order->id])}}">
                          @csrf
                          @method('delete')
                              <button class="text-danger dltBtn border" data-id={{$order->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                        </form> --}}
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
        <span style="float:right">{{$orders->links()}}</span>
        @else
          <h6 class="text-center">No orders found!!!</h6>
        @endif
      </div>
    </div>
</div>
@endsection

@push('styles')
  <link href="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
  <style>
      div.dataTables_wrapper div.dataTables_paginate{
          display: none;
      }
  </style>
@endpush

@push('scripts')

  <!-- Page level plugins -->
  <script src="{{asset('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('backend/js/demo/datatables-demo.js')}}"></script>
  <script>

      $('#order-dataTable').DataTable( {
            "columnDefs":[
                {
                    "orderable":false,
                    "targets":[8]
                }
            ]
        } );

        // Sweet alert

        function deleteData(id){

        }
  </script>
  <script>
      $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
          $('.dltBtn').click(function(e){
            var form=$(this).closest('form');
              var dataID=$(this).data('id');
              // alert(dataID);
              e.preventDefault();
              swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                       form.submit();
                    } else {
                        swal("Your data is safe!");
                    }
                });
          })
      })
  </script>
@endpush
