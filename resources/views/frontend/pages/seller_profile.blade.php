@extends('frontend.layouts.master')

@section('title','Imanzi | {{$seller->name}}')

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
    <section class="seller-profile section bg-light">
        <div class="position-relative px-5">
            @if($seller->photo)
                <img src="{{$seller->photo}}" alt="" class="avatar img-thumbnail img-circle position-absolute">
            @else
                <img src="{{asset('backend/img/avatar.png')}}" alt="" class="avatar img-thumbnail rounded-circle position-absolute">
            @endif
            <div class="container m-0 pt-3 border bg-white rounded pb-5">
                <div class="row d-flex justify-content-center align-items-center mb-5">
                    <p class="seller-item p-3">{{$seller->name}}</p>
                    <span class="spacer"></span>
                    <p class="seller-item p-3">{{$seller->email}}</p>
                    <span class="spacer"></span>
                    <p class="seller-item p-3">{{count($seller->products)}} Products</p>
                </div>
                <div class="row m-0 pt-5">
                    @if(count($seller->products))
                    @foreach($seller->products as $product)
                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{$product->cat_id}}">
                        <div class="single-product pb-3 border rounded">
                            <div class="product-img">
                                <a href="{{route('product-detail',$product->slug)}}">
                                    @php
                                        $photo=explode(',',$product->photo);
                                    @endphp
                                    <img class="default-img" src="{{$photo[0]}}" alt="{{$photo[0]}}">
                                    <img class="hover-img" src="{{$photo[0]}}" alt="{{$photo[0]}}">
                                    @if($product->stock<=0)
                                        <span class="out-of-stock">Sale out</span>
                                    @elseif($product->condition=='new')
                                        <span class="new">New</span>
                                    @elseif($product->condition=='hot')
                                        <span class="hot">Hot</span>
                                    @else
                                        <span class="price-dec">{{$product->discount}}% Off</span>
                                    @endif
                                </a>
                                <div class="button-head px-2">
                                    <div class="product-action">
                                        <a data-toggle="modal" data-target="#{{$product->id}}" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                        <a title="Wishlist" href="{{route('add-to-wishlist',$product->slug)}}" ><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                    </div>
                                    <div class="product-action-2">
                                        <a title="Add to cart" href="{{route('add-to-cart',$product->slug)}}">Add to cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content px-2">
                                <h3 class="text-warning"><a href="{{route('product-detail',$product->slug)}}">{{$product->title}}</a></h3>
                                <div class="product-price">
                                    @php
                                        $after_discount=($product->price-($product->price*$product->discount)/100);
                                    @endphp
                                    <span class="small">{{number_format($after_discount,2)}}Rwf</span>
                                    <del class="text-danger small" style="padding-left:4%;">{{number_format($product->price,2)}}Rwf</del>
                                    <ul class="rating d-flex text-warning mt-2">
                                        @php
                                            $rate=ceil($product->getReview->avg('rate'))
                                        @endphp
                                            @for($i=1; $i<=5; $i++)
                                                @if($rate>=$i)
                                                    <li><i class="fa fa-star mr-1"></i></li>
                                                @else
                                                    <li><i class="fa fa-star-o mr-1"></i></li>
                                                @endif
                                         @endfor
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <h6 class="text-secondary text-center">No products found</h6>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!--/ End Sellers -->
@endsection
@push('styles')
<style>

</style>
@endpush
