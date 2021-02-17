@extends('frontend.layouts.master')

@section('title','Imanzi | Sellers Page')

@section('main-content')
    <!-- Breadcrumbs -->
    {{-- <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{route('home')}}">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="javascript:void(0);">Sellers</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- End Breadcrumbs -->

    <!-- Shop Sellers -->
    <section class="sellers section">
        <div class="row m-0 px-3">
            @foreach($sellers as $seller)
            <div class="col-md-4 col-lg-3 col-sm-12 mb-3">
                <a href="{{route('seller-products',[$seller->id])}}" class="seller-container position-relative w-100 h-100 border d-inline-block rounded">
                    <div class="avatar-container rounded-top bg-light position-relative">
                        @if($seller->photo)
                        <img class="avatar rounded-circle img-thumbnail position-absolute" src="{{$seller->photo}}" alt="">
                        @else
                        <img class="avatar rounded-circle img-thumbnail position-absolute" src="{{asset('backend/img/avatar.png')}}" alt="">
                        @endif
                    </div>
                    <div class="seller-content">
                        <p class="text-warning"><i class="fa fa-user text-secondary mr-1"></i> {{$seller->name}}</p>
                        <p class="text-info"><i class="fa fa-envelope text-secondary"></i> {{$seller->email}}</p>
                        <p class="ml-auto w-100 text-right small">
                            <span class="text-warning mr-1">{{$seller->products_count}}</span>
                            <span>Product</span>
                        </p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </section>
    <!--/ End Sellers -->
@endsection
@push('styles')
<style>

</style>
@endpush
