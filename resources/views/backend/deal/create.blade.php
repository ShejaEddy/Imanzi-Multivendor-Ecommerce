@extends('seller.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Add Deal</h5>
    <div class="card-body">
      <form method="post" action="{{route('deal.store')}}">
        {{csrf_field()}}
        <div class="form-group">
            <label for="product_id">Product<span class="text-danger">*</span></label>
            <select name="product_id" class="form-control selectpicker" data-live-search="true">
                <option value disabled selected>--Select any product--</option>
                @foreach($products as $product)
                  <option value="{{$product->id}}">{{$product->title}}</option>
                @endforeach
            </select>
            @error('product_id')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="deal_discount" class="col-form-label">Discount Rate(%)<span class="text-danger">*</span></label>
            <input id="deal_discount" type="number" name="deal_discount" min="0" max="100" placeholder="Enter discount" class="form-control">
            @error('deal_discount')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="deal_start_date">Start Date <span class="text-danger">*</span></label>
            <input id="deal_start_date" type="text" name="deal_start_date" placeholder="Enter start date"  class="form-control">
            @error('deal_start_date')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="deal_end_date">End Date <span class="text-danger">*</span></label>
            <input id="deal_end_date" type="text" name="deal_end_date" placeholder="Enter end date" class="form-control">
            @error('deal_end_date')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
        <div class="form-group mb-3">
          <button type="reset" class="btn btn-warning">Reset</button>
           <button class="btn btn-primary" type="submit">Submit</button>
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
    $( "#deal_start_date" ).datepicker();
    $( "#deal_end_date" ).datepicker();
});
</script>
@endpush

