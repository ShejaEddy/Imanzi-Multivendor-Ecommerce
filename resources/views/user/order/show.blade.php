@extends('user.layouts.master')

@section('title', 'Order Detail')

@section('main-content')
    @if ($order)
        <div class="main-content">
            <section class="section">
                <div class="section-body">
                    <div class="invoice">
                        <div class="invoice-print">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="invoice-title">
                                        <h4>Order Details</h4>
                                        <div class="invoice-number">Order {{$order->order_number}}</div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <address>
                                                <strong>Billed To:</strong><br>
                                                {{ $order->user->name }}<br>
                                                {{ $order->user->email }}<br>
                                            </address>
                                            <address>
                                                <strong>Order Date:</strong><br>
                                                {{ $order->created_at->format('D d M, Y') }} at
                                                {{ $order->created_at->format('g : i a') }}<br><br>
                                            </address>
                                        </div>
                                        <div class="col-md-6 text-md-right">
                                            <address>
                                                <strong>Shipped To:</strong><br>
                                                {{ $order->first_name }} {{ $order->last_name }}<br>
                                                {{ $order->country }} <br>
                                                {{ $order->post_code }} <br>
                                                {{ $order->address1 }}, {{ $order->address2 }} <br>
                                                {{ $order->email }} <br>
                                                {{ $order->phone }}
                                            </address>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <address>
                                                <strong>Payment Method:</strong><br>
                                                @if ($order->payment_method == 'cod') Cash
                                                    on Delivery
                                                @else Paypal @endif<br>
                                            </address>
                                            <address>
                                                <strong>Payment Status:</strong><br>
                                                @if ($order->payment_status == 'unpaid')
                                                    <span class="text-danger">Unpaid</span>
                                                @else
                                                    <span class="text-success">Paid</span>
                                                @endif
                                            </address>
                                        </div>
                                        <div class="col-md-6 text-md-right">

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <div class="section-title">Order Summary</div>
                                    <p class="section-lead">All items here cannot be deleted.</p>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover table-md">
                                            <tr>
                                                <th>S.N.</th>
                                                <th>Product Title</th>
                                                <th>Seller</th>
                                                <th>Amount</th>
                                                <th>Shipment Value</th>
                                                <th>Coupon Rate</th>
                                                <th>Total Amount</th>
                                                <th>Delivery Status</th>
                                            </tr>
                                            @if (count($order->cart_info) > 0)
                                                @foreach ($order->cart_info as $cart)
                                                    <tr>
                                                        <td>{{ $cart->id }}</td>
                                                        <td>{{ $cart->product->title }}</td>
                                                        <td>{{ $cart->product->seller->name }}({{ $cart->product->seller->email }})
                                                        </td>
                                                        <td>{{ $cart->amount ?? 0 }}RWF</td>
                                                        <td>{{ $cart->shipment_amount ?? 0 }}RWF</td>
                                                        <td>{{ $cart->coupon_rate }}%</td>
                                                        <td>{{ $cart->amount ?? 0 }}RWF</td>
                                                        <td>
                                                            @if ($cart->status == 'new')
                                                                <span
                                                                    class="badge badge-primary">{{ $cart->status }}</span>
                                                            @elseif($cart->status=='process')
                                                                <span
                                                                    class="badge badge-warning">{{ $cart->status }}</span>
                                                            @elseif($cart->status=='delivered')
                                                                <span
                                                                    class="badge badge-success">{{ $cart->status }}</span>
                                                            @else
                                                                <span
                                                                    class="badge badge-danger">{{ $cart->status }}</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </table>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-lg-8">
                                        </div>
                                        <div class="col-lg-4 text-right">
                                            <div class="invoice-detail-item">
                                                <div class="invoice-detail-name">Subtotal</div>
                                                <div class="invoice-detail-value">{{ $order->sub_total }}</div>
                                            </div>
                                            <div class="invoice-detail-item">
                                                <div class="invoice-detail-name">Shipping</div>
                                                <div class="invoice-detail-value">{{ $order->shipping_amount }}
                                                </div>
                                            </div>
                                            <hr class="mt-2 mb-2">
                                            <div class="invoice-detail-item">
                                                <div class="invoice-detail-name">Total</div>
                                                <div class="invoice-detail-value invoice-detail-value-lg">
                                                    {{ $order->total_amount }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    @endif
@endsection


