<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Carbon\Carbon;
use Illuminate\Support\Str;

class DealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deals=Product::getAllProduct(auth()->id(),true);
        if(auth()->user()->role == 'admin') return view('backend.deal.index')->with('deals',$deals);
        return view('seller.deal.index')->with('deals',$deals);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products=Product::where('seller_id',auth()->id())->where("approval_status","approved")->get();
        return view('seller.deal.create')->with('products',$products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'product_id'=>'required|exists:products,id',
            'deal_discount'=>'required|numeric|max:100|min:1',
            'deal_start_date'=>'required|date',
            'deal_end_date'=>'required|date'
        ]);

        $product=Product::findOrFail($request->input('product_id'));
        if($product->approval_status != 'approved')
            return request()->session()->flash('error','Unable to create deal on a not approved product, Please contact administration');
        $data=$request->only(['deal_discount','deal_start_date','deal_end_date']);
        $data['deal_start_date'] = Carbon::parse($data['deal_start_date']);
        $data['deal_end_date'] = Carbon::parse($data['deal_end_date']);
        $data['is_deal'] = true;

        $status=$product->fill($data)->save();
        if($status){
            request()->session()->flash('success','Deal successfully added');
        }
        else{
            request()->session()->flash('error','Please try again!!');
        }
        return redirect()->route('deal.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $deal=Product::where([
            ["is_deal",true],
            ["id",$id],
            ["seller_id", auth()->id()]
        ])->get();
        if($deal){
            return view('seller.deal.show')->with('deal',$deal);
        }
        else{
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $deal=Product::where([["seller_id", auth()->id()],["id", $id]])->firstOrFail();
        $products=Product::where('seller_id',auth()->id())->get();
        return view('seller.deal.edit')->with('deal',$deal)->with('products',$products);
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
        $deal=Product::findOrFail($id);
        $this->validate($request,[
            'deal_discount'=>'required|numeric',
            'deal_start_date'=>'required|date',
            'deal_end_date'=>'required|date',
        ]);

        $data=$request->only(['deal_discount','deal_start_date','deal_end_date']);
        $data['deal_start_date'] = Carbon::parse($data['deal_start_date']);
        $data['deal_end_date'] = Carbon::parse($data['deal_end_date']);

        $status=$deal->fill($data)->save();
        if($status){
            request()->session()->flash('success','Deal Successfully updated');
        }
        else{
            request()->session()->flash('error','Please try again!!');
        }
        return redirect()->route('deal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deal=Product::findOrFail($id);
        $data=$deal;
        $data['deal_start_date']=null;
        $data['deal_end_date']=null;
        $data['deal_discount']=0;
        $data['is_deal']=false;

        $status=$deal->fill($data)->save();

        if($status){
            request()->session()->flash('success','Deal successfully deleted');
        }
        else{
            request()->session()->flash('error','Error while deleting deal');
        }
        return redirect()->route('deal.index');
    }
}
