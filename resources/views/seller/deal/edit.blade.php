@extends('seller.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header text-primary">Edit Deal</h5>
    <div class="card-body">
      <form method="post" action="{{route('deal.update',$deal->id)}}" class="col-md-4 col-sm-12">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="deal_discount" class="col-form-label">Discount Rate</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">%</span>
                </div>
                <input id="deal_discount" type="number" value="{{$deal->deal_discount}}" name="deal_discount" min="0" max="100" placeholder="Enter discount" class="form-control">
            </div>
            @error('deal_discount')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>

        <div class="form-group">
          <label for="deal_start_date">Start Date <span class="text-danger">*</span></label>
          <input id="deal_start_date" type="text" name="deal_start_date" placeholder="Enter start date"  value="{{$deal->deal_start_date}}" class="form-control">
          @error('deal_start_date')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="deal_end_date">End Date <span class="text-danger">*</span></label>
          <input id="deal_end_date" type="text" name="deal_end_date" placeholder="Enter end date"  value="{{$deal->deal_end_date}}" class="form-control">
          @error('deal_end_date')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group mb-3">
           <button class="btn btn-primary col-12" type="submit">Update</button>
        </div>
      </form>
    </div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
@endpush
@push('scripts')
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script>
$(function() {
    $( ".deal_start_date" ).datepicker();
    $( "#deal_end_date" ).datepicker();
});
</script>
@endpush
