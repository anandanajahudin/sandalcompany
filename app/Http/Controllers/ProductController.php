<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = ProductCategory::all();

        return view('pages.back.product.index', compact('products','categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
            'category' => 'required',
            'namaproduk' => 'required',
            'kodeproduk' => 'required',
            'hargapokok' => 'required',
            'hargajual'=> 'required',
            'deskripsi' => 'nullable'
        ]);

        $category = ProductCategory::findOrFail($request->category);

        $productName = $request->namaproduk;
        $fileName = 'product_'.$productName.'.'.$request->image->extension();
        $destinationPath = 'assets/images/product/'.$category->nama_kategori;

        $request->image->move(public_path($destinationPath), $fileName);
        $image_path = $destinationPath.'/'.$fileName;

        $product = Product::create([
            'nama_produk' => $request->namaproduk,
            'kode_produk' => $request->kodeproduk,
            'category_id' => $request->category,
            'harga_pokok' => $request->hargapokok,
            'harga_jual' => $request->hargajual,
            'description' => $request->deskripsi,
            'image_path' => $image_path
        ]);

        return redirect()->route('product.index')->with(['success' => 'Product Added!']);
    }

    public function show(string $id)
    {
        $product = Product::findOrFail($id);

        return view('pages.back.product.show', compact('product'));
    }

    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = ProductCategory::all();

        return view('pages.back.product.edit',
            compact('product', 'categories')
        );
    }

    public function editImage(string $id)
    {
        $product = Product::findOrFail($id);

        return view('pages.back.product.editImage', compact('product'));
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'namaproduk' => 'required',
            'kodeproduk' => 'required',
            'hargapokok' => 'required',
            'hargajual'=> 'required',
            'deskripsi' => 'nullable'
        ]);

        $product = Product::findOrFail($id);

        $product->update([
            'nama_produk' => $request->namaproduk,
            'kode_produk' => $request->kodeproduk,
            'category_id' => $request->category,
            'harga_pokok'=> $request->hargapokok,
            'harga_jual'=> $request->hargajual,
            'description'=> $request->deskripsi,
        ]);

        return redirect()->route('product.index')->with(['success' => 'Product has been updated!']);
    }

    public function updateImage(Request $request, string $id)
    {
        $this->validate($request, [
            'namaproduk' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,svg,webp|max:2048',
        ]);

        $productName = $request->namaproduk;

        $product = Product::findOrFail($id);

        if(!empty($request->image)){

            $productName = $request->namaproduk;
            $fileName = 'product'.$productName.'.'.$request->image->extension();
            $destinationPath = 'assets/images/product/'.$productName;

            $request->image->move(public_path($destinationPath), $fileName);
            $image_path = $destinationPath.'/'.$fileName;

            $product->update([
                'image_path'=> $image_path
            ]);

        } else{

            $product->update([
                'nama_produk' => $request->namaproduk,
                'kode_produk' => $request->kodeproduk,
                'category_id' => $request->category,
                'satuan' => $request->satuan,
                'harga_pokok'=> $request->hargapokok,
                'harga_jual'=> $request->hargajual,
                'description'=> $request->deskripsi,
                'image_path'=> $product->image_path
            ]);
        }

        return redirect()->route('product.index')->with(['success' => 'Product has been updated!']);
    }

    public function destroy(Product $product)
    {
        //delete order
        $product->delete();

        //redirect to index
        return redirect()->route('product.index')->with(['success' => 'Product has been deleted!']);
    }
}
