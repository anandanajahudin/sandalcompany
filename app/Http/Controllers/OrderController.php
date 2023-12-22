<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        if (Auth::user()->user_type == 'customer') {
            $orders = Order::orderBy('id', 'DESC')
                ->where('customer_id', Auth::user()->id)
                ->get();

        } else {
            $orders = Order::orderBy('id', 'DESC')->get();

        }

        return view('pages.back.order.index',
        [
            'orders' => $orders,
        ]);
    }

    public function create()
    {
        $customers = User::where('user_type', 'customer')->get();
        $products = Product::all();

        return view('pages.back.order.create',
        [
            'customers' => $customers,
            'products' => $products,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'customer' => 'required',
        ]);

        $inputProduct = $request->input('product_id');
        $inputQuantity = $request->input('quantity');

        foreach($inputProduct as $key => $productCheck) {
            $rules["product_id.{$key}"] = 'required';
        }

        foreach($inputQuantity as $key => $quantityCheck) {
            $rules["quantity.{$key}"] = 'required';
        }

        Order::create([
            'customer_id' => $request->customer,
        ]);

        $idOrder = Order::latest()->first()->id;

        foreach($inputProduct as $key => $valueProduct) {
            OrderItem::create([
                'order_id' => $idOrder,
                'product_id' => $valueProduct,
                'quantity' => $inputQuantity[$key],
            ]);
        }

        //redirect to index
        return redirect()->route('order.index')->with(['success' => 'Order has been saved!']);
    }

    public function show(string $id)
    {
        $order = Order::findOrFail($id);
        $items = OrderItem::where('order_id', $id)->get();
        $items2 = OrderItem::where('order_id', $id)->get();
        $products = Product::all();

        return view('pages.back.order.show', compact('order', 'items', 'items2', 'products'));
    }

    public function edit(string $id)
    {
        $order = Order::findOrFail($id);
        $orderItem = OrderItem::where('order_id', $id)->get();
        $customers = User::where('user_type', 'customer')->get();
        $products = Product::all();

        return view('pages.back.order.edit', compact('order', 'orderItem', 'customers', 'products'));
    }

    // public function update(Request $request, string $id)
    // {
    //     $this->validate($request, [
    //         'customer' => 'required',
    //         'employee' => 'required',
    //         'status'=> 'required',
    //     ]);

    //     $order = Order::findOrFail($id);

    //     $order->update([
    //         'customer_id' => $request->customer,
    //         'status'=> $request->status
    //     ]);

    //     return redirect()->route('order.index')->with(['success' => 'Order has been updated!']);
    // }

    public function updateOrder(Request $request, string $id)
    {
        $order = Order::findOrFail($id);
        $jumlahItem = OrderItem::where('order_id', $id)->get()->count();

        $inputProduct = $request->input('product_id');
        $inputQuantity = $request->input('quantity');
        $inputItemId = $request->input('item');
        $jumlahItemBaru = count($inputProduct);

        for ($i = 0; $i < $jumlahItem; $i++) {
            $orderItem = OrderItem::findOrFail($inputItemId[$i]);

            $orderItem->update([
                'order_id' => $id,
                'product_id' => $inputProduct[$i],
                'quantity' => $inputQuantity[$i],
            ]);
        }

        for ($j = $jumlahItem; $j < $jumlahItemBaru; $j++) {
            OrderItem::create([
                'order_id' => $id,
                'product_id' => $inputProduct[$j],
                'quantity' => $inputQuantity[$j],
            ]);
        }

        return redirect()->route('order.show', $order->id)->with('success', 'Order Has Been Updated');
    }

    public function flagKirim(Request $request, string $id)
    {
        $idItem = $request->id;
        $order = OrderItem::findOrFail($idItem);
        $cekSim = OrderItem::where('order_id', $order->order_id)->where('status', 0)->exists();

        if ($order->status == 0) {

            $count = OrderItem::where('order_id', $order->order_id)->count();
            $hasil = OrderItem::where('order_id', $order->order_id)->sum('status','=', 0);

            if ($count >= $hasil) {
                if ($hasil+1 == $count) {
                    $sim = Order::find($order->order_id);

                    if ($cekSim) {
                        $sim->status = 1;
                    } else {
                        $sim->status = 2;
                    }

                    $sim->save();
                } else {
                    $sim = Order::find($order->order_id);

                    if ($cekSim) {
                        $sim->status = 1;
                    } else {
                        $sim->status = 2;
                    }

                    $sim->save();
                }
            }

            $order->update([
                'status' => 1
            ]);

            $cekSim2 = OrderItem::where('order_id', $order->order_id)->where('status', 0)->exists();
            $sim2 = Order::find($order->order_id);

            if ($cekSim2) {
                $sim2->status = 1;
            } else {
                $sim2->status = 2;
            }
            $sim2->save();

            return back()->with('success', 'Pesanan dalam Proses Pengiriman');

        } else if ($order->status == 1) {

            $count = OrderItem::where('order_id', $order->order_id)->count();
            $hasil = OrderItem::where('order_id', $order->order_id)->sum('status','=', 1);

            if ($count*2 >= $hasil) {
                if ($hasil+1 == $count*2) {
                    // dd($count*2 % $count);
                    $sim = Order::find($order->order_id);
                    $sim->status = 3;
                    $sim->is_active = 0;
                    $sim->save();

                } else {
                    $sim = Order::find($order->order_id);

                    if ($cekSim) {
                        $sim->status = 1;
                    } else {
                        $sim->status = 2;
                    }
                    $sim->save();
                }
            }

            $order->update([
                'status' => 2
            ]);

            return back()->with('success', 'Pesanan telah Diterima');

        } else {
            dd('masuk');
            return back()->with('success', 'Pesanan telah Dikirim Sebagian');
        }

    }

    public function sendAll(Request $request, string $id)
    {
        $order = Order::findOrFail($id);
        $order->update(['status' => 2]);

        $orderItem = OrderItem::where('order_id', $id)->get();

        foreach ($orderItem as $item) {
            $item->update([
                'status' => 1,
            ]);
        }

        return redirect()->route('order.index')->with('success', 'Pesanan dalam proses pengiriman');
    }

    public function confirmAll(Request $request, string $id)
    {
        $order = Order::findOrFail($id);
        $order->update(['status' => 3]);

        $orderItem = OrderItem::where('order_id', $id)->where('status', 1)->get();

        foreach ($orderItem as $item) {
            $item->update([
                'status' => 2,
            ]);
        }

        return redirect()->route('order.index')->with('success', 'Pesanan telah diterima customer');
    }

    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('order.index')->with(['success' => 'Order has been deleted!']);
    }

    public function destroyItem(string $id)
    {
        $orderItem = OrderItem::findOrFail($id);
        $result = OrderItem::where('id', $id)->delete();

        return redirect()->back();
    }
}
