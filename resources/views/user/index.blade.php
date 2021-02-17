@extends('user.layouts.master')

@section('main-content')
    <div class="container-fluid">
        @include('user.layouts.notification')
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-muted small mx-3 text-uppercase">Overview Status</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <!-- Products -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow-sm h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Success Delivery
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ \App\Models\Cart::countUserSuccessDelivery() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-cubes fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow-sm h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Delivery
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ \App\Models\Cart::countUserPendingDelivery() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dice-d6 fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow-sm h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Product Reviews</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ \App\Models\ProductReview::countUserProductReviews() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-hand-holding-heart fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow-sm h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Post Comments
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ \App\Models\PostComment::countUserPostComments() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments-dollar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        </div>
        <!-- Content Row -->

        <div class="row">
            <!-- Order -->
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Latest purchases</h4>
                        <div class="card-header-action">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle btn btn-primary" data-toggle="dropdown">Visit</a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{ route('user.order.index') }}" class="text-dark dropdown-item has-icon"><i
                                            class="fas fa-indent"></i> Orders</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="/" class="dropdown-item has-icon text-dark"><i class="fas fa-store"></i> Store</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="summary">
                            <div class="summary-item">
                                <ul class="list-unstyled list-unstyled-border">
                                    @foreach ($carts as $cart)
                                        <li class="media">
                                            <a href="{{ route('product-detail', $cart->product->slug) }}">
                                                @if ($cart->product->photo)
                                                    @php
                                                        $photo = explode(',', $cart->product->photo);
                                                    @endphp
                                                    <img class="mr-3 rounded" width="50" src="{{ $cart->product->photo }}"
                                                        alt="product">
                                                @else
                                                    <img class="mr-3 rounded" width="50"
                                                        src="{{ asset('backend/img/thumbnail-default.jpg') }}">
                                                @endif
                                            </a>
                                            <div class="media-body">
                                                <div class="media-right">RWF {{ $cart->product->price }}</div>
                                                <div class="media-title"><a
                                                        href="{{ route('product-detail', [$cart->product->slug]) }}">{{ $cart->product->title }}</a>
                                                </div>
                                                <div class="text-muted text-small">by <a
                                                        href="#">{{ $cart->product->seller->name }}</a>
                                                    <div class="bullet"></div>
                                                    {{ $cart->order->created_at->format('D d M, Y') }} at
                                                    {{ $cart->order->created_at->format('g : i a') }}
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@push('styles')
    <style>
        .card .text-small {
            font-size: 12px;
            line-height: 20px;
        }

        .card .text-muted {
            color: #98a6ad !important;
        }

    </style>
@endpush
@push('scripts')
@endpush
