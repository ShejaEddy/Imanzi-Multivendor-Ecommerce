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
        <h4 class=" font-weight-bold">Coupons List</h4>
        <ul class="breadcrumbs">
            <li><a href="{{route('admin')}}" style="color:#999">Dashboard</a></li>
            <li><a href="" class="active text-primary">Coupons</a></li>
        </ul>
      </div>
    <div class="card-body">
      <div class="table-responsive">
        @if(count($coupons)>0)
        <table class="table table-stripped" id="coupon-dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>S.N.</th>
              <th>Coupon Code</th>
              <th>Seller Name</th>
              <th>Seller Email</th>
              <th>Type</th>
              <th>Value</th>
              <th>Status</th>
              {{-- <th>Action</th> --}}
            </tr>
          </thead>
          {{-- <tfoot>
            <tr>
                <th>S.N.</th>
                <th>Coupon Code</th>
                <th>Type</th>
                <th>Value</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
          </tfoot> --}}
          <tbody>
            @foreach($coupons as $coupon)
                <tr>
                       <td>{{$coupon->id}}</td>
                    <td>{{$coupon->code}}</td>
                    <td><a href="{{route('users.show',[$coupon->seller->id])}}" class="text-primary">{{$coupon->seller->name}}</a></td>
                    <td><a href="{{route('users.show',[$coupon->seller->id])}}" class="text-primary">{{$coupon->seller->email}}</a></td>
                    <td>
                        @if($coupon->type=='fixed')
                            <span class="badge badge-primary">{{$coupon->type}}</span>
                        @else
                            <span class="badge badge-warning">{{$coupon->type}}</span>
                        @endif
                    </td>
                    <td>
                        @if($coupon->type=='fixed')
                            ${{number_format($coupon->value,2)}}
                        @else
                            {{$coupon->value}}%
                        @endif</td>
                    <td>
                        @if($coupon->status=='active')
                            <span class="badge badge-success">{{$coupon->status}}</span>
                        @else
                            <span class="badge badge-warning">{{$coupon->status}}</span>
                        @endif
                    </td>
                    {{-- <td>
                        <a href="{{route('coupon.edit',$coupon->id)}}" class=text-primary btn-sm float-left mr-11" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                        <form method="POST" action="{{route('coupon.destroy',[$coupon->id])}}">
                          @csrf
                          @method('delete')
                               <button class="text-danger dltBtn bordertn" data-id={{$coupon->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td> --}}
                    {{-- Delete Modal --}}
                    {{-- <div class="modal fade" id="delModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="#delModal{{$user->id}}Label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="#delModal{{$user->id}}Label">Delete user</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form method="post" action="{{ route('coupons.destroy',$user->id) }}">
                                @csrf
                                @method('delete')
                                 <button type="submit" class="btn btn-danger" style="margin:auto; text-align:center">Parmanent delete user</button>
                              </form>
                            </div>
                          </div>
                        </div>
                    </div> --}}
                </tr>            @endforeach
          </tbody>
        </table>
        <span style="float:rig  ht">{{$coupons->links()}}</span>
        @else
          <h6 class="text-center">No Coupon found!!! Please create coupon</h6>
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
      .zoom {
        transition: transform .2s; /* Animation */
      }

      .zoom:hover {
        transform: scale(3.2);
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
  $('#coupon-dataTable').DataTable( {
            "columnDefs":[
                {
                    "orderable":false,
                          "targets":[4,5]
                }
            ]
        } );

        // Sweet alert

        function deleteData(id){}

  </script>
  <script>
      $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN            ': $('meta[name="csrf-token"]').attr('content')
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

