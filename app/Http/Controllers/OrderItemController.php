<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'product_id' => 'required',
            'order_id'=> 'required',
            'quantity'=> 'required'
        ]);

        OrderItem::create([
            'product_id' => $request->product_id,
            'order_id'=> $request->order_id,
            'quantity'=> $request->quantity
        ]);

        return redirect()->route('order.show',$request->order_id)->with(['success' => 'Order Item has been saved!']);
    }

    public function show(OrderItem $orderItem)
    {
        //
    }

    public function edit(Request $request)
    {
        $item = OrderItem::findOrFail($request->itemid);
        $order = Order::findOrFail($request->id);
        return view('pages.back.order.orderitemedit',[
            'item' => $item,
            'order' => $order,
            'products' => Product::all()
        ]);
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'product_id' => 'required',
            'order_id'=> 'required',
            'quantity'=> 'required',
            'itemstatus'=> 'required'
        ]);

        $orderItem = OrderItem::findOrFail($request->itemid);

        $orderItem->update([
            'product_id' => $request->product_id,
            'order_id'=> $request->order_id,
            'quantity'=> $request->quantity,
            'status' => $request->itemstatus
        ]);

        return redirect()->route('order.show',$request->order_id)->with(['success' => 'Order Item has been updated!']);
    }

    public function destroy(Request $request)
    {
        $item = OrderItem::where('id', $request->itemid)->first();
        $item->delete();

        return redirect()->route('order.show', $request->id)->with(['success' => 'Item has been deleted!']);
    }
}
