@extends('backend.layouts.master')

@section('main-content')
 <!-- DataTales Example -->
 <div class="row">
     <div class="col-md-12">
        @include('backend.layouts.notification')
     </div>
 </div>
 <div class="card shadow-sm mb-4">
    <div class="card-header py-3">
        <h4 class=" font-weight-bold">Deals List</h4>
        <ul class="breadcrumbs">
            <li><a href="{{route('admin')}}" style="color:#999">Dashboard</a></li>
            <li><a href="" class="active text-primary">Deals</a></li>
        </ul>
      </div>
    <div class="card-body">
      <div class="table-responsive">
        @if(count($deals)>0)
        @foreach($deals as $deal)
        <table class="table table-stripped" id="deal-dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>S.N.</th>
              <th>Photo</th>
              <th>Title</th>
              <th>Price</th>
              <th>Deal Discount</th>
              <th>Start Date</th>
              <th>End Date</th>
              <th>Status</th>
              <th>Seller</th>
            </tr>
          </thead>
          {{-- <tfoot>
            <tr>
                <th>S.N.</th>
                <th>Photo</th>
                <th>Title</th>
                <th>Price</th>
                <th>Deal Discount</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Seller</th>
            </tr>
          </tfoot> --}}
          <tbody>
                <tr>
                    <td>{{$deal->id}}</td>
                    <td>
                        @if($deal->photo)
                            @php
                              $photo=explode(',',$deal->photo);
                            @endphp
                            <img src="{{$photo[0]}}" class="img-fluid zoom" style="max-width:80px" alt="{{$deal->photo}}">
                        @else
                            <img src="{{asset('backend/img/thumbnail-default.jpg')}}" class="img-fluid" style="max-width:80px" alt="avatar.png">
                        @endif
                    </td>
                    <td>{{$deal->title}}</td>
                    <td>RWF {{$deal->price}}</td>
                    <td>{{$deal->deal_discount}}%</td>
                    <td>{{$deal->deal_start_date->format('D d.m.Y')}}</td>
                    <td>{{$deal->deal_end_date->format('D d.m.Y')}}</td>
                    <td>
                        @if($deal->deal_status)
                            <span class="badge badge-success"> Active</span>
                        @else
                            <span class="badge badge-warning">Inactive</span>
                        @endif
                    </td>
                    <td><a href="{{route('users.show',[$product->seller->id])}}"></a>{{$product->seller->name}}({{$product->seller->email}})</td>
                    {{-- <td>
                        <a href="{{route('deal.edit',$deal->id)}}" class="text-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                    <form method="POST" action="{{route('deal.destroy',[$deal->id])}}">
                      @csrf
                      @method('delete')
                          <button class="text-danger dltBtn border d-inline" data-id={{$deal->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
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
                              <form method="post" action="{{ route('categorys.destroy',$user->id) }}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger" style="margin:auto; text-align:center">Parmanent delete user</button>
                              </form>
                            </div>
                          </div>
                        </div>
                    </div> --}}
                </tr>
            @endforeach
          </tbody>
        </table>
        <span style="float:right">{{$deals->links()}}</span>
        @else
          <h6 class="text-center">No Deals found!!! Please create Deal</h6>
        @endif
      </div>
    </div>
</div>
@endsection

@push('styles')
  <link href="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
  <style>
      div.dataTables_wrapper div.dataTables_paginate{
          display: none;
      }
      .zoom {
        transition: transform .2s; /* Animation */
      }

      .zoom:hover {
        transform: scale(1.1);
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

      $('#deal-dataTable').DataTable( {
        "scrollX": false
            "columnDefs":[
                {
                    "orderable":false,
                    "targets":[10,11,12]
                }
            ]
        } );

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
