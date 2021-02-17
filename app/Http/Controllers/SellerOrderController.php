<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\SellerOrder;
use Illuminate\Http\Request;

class SellerOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $status = $request->status;
        $is_deal = $request->is_deal ?? false;
        $orders = Cart::whereHas('product', function ($query) use($is_deal) {
            $query->where([["seller_id", auth()->id()],["is_deal",$is_deal]]);
        })->with(['product' => function ($query) use($is_deal) {
            $query->where([["seller_id", auth()->id()],["is_deal",$is_deal]]);
        }, 'order'])->where([["order_id", "!=", null]]);
        if ($status)
            $orders = $orders->where("status",$status);
        return view('seller.order.index')->with('orders', $orders->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SellerOrder  $sellerOrder
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::where("id", $id)->whereHas('sellers', function ($query) {
            $query->where('seller_id', auth()->id());
        })->firstOrFail();
        return view('seller.order.show')->with('order', $order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('seller.order.edit')->with('order', $order);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cart = Cart::where([["id",$id]])->whereHas('product', function($query) {
            $query->where("seller_id",auth()->id());
        })->with("product")->firstOrFail();
        $this->validate($request, [
            'status' => 'required|in:new,process,delivered,cancel,returned,replaced'
        ]);
        $data = $request->all();
        if ($request->status == 'delivered') {
            $product = $cart->product;
            $product->stock -= $cart->quantity;
            $product->save();
        }
        $status = $cart->fill($data)->save();
        if ($status) {
            request()->session()->flash('success', 'Successfully updated order');
        } else {
            request()->session()->flash('error', 'Error while updating order');
        }
        return redirect()->route('seller.orders.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SellerOrder  $sellerOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }

    // Income chart
    public function incomeChart(Request $request){
        $year=\Carbon\Carbon::now()->year;
        // dd($year);
        $items=Cart::whereYear('created_at',$year)->whereHas('product',function($query){
            $query->where("seller_id",auth()->id());
        })->where([['status','delivered']])->get()
            ->groupBy(function($d){
                return \Carbon\Carbon::parse($d->created_at)->format('m');
            });
            // dd($items);
        $result=[];
        foreach($items as $month=>$item_collections){
            foreach($item_collections as $item){
                $amount=$item->sum('amount');
                $m=intval($month);
                isset($result[$m]) ? $result[$m] += $amount :$result[$m]=$amount;
            }
        }
        $data=[];
        for($i=1; $i <=12; $i++){
            $monthName=date('F', mktime(0,0,0,$i,1));
            $data[$monthName] = (!empty($result[$i]))? number_format((float)($result[$i]), 2, '.', '') : 0.0;
        }
        return $data;
    }
}
