<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::all();

        return view('pages.back.category.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kode_kategori' => 'required',
            'nama_kategori' => 'required',
        ]);

        $category = ProductCategory::create([
            'kode_kategori' => $request->kode_kategori,
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect()->route('category.index')->with(['success' => 'Product Category has been created!']);
    }

    public function edit(string $id)
    {
        $category = ProductCategory::findOrFail($id);

        return view('pages.back.category.edit', compact('category'));
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'kode_kategori' => 'required',
            'nama_kategori' => 'required',
        ]);

        $category = ProductCategory::findOrFail($id);

        $category->update([
            'kode_kategori' => $request->kode_kategori,
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect()->route('category.index')->with(['success' => 'Product Category has been updated!']);
    }

    public function destroy(string $id)
    {
        $category = ProductCategory::findOrFail($id);
        $category->delete();

        return redirect()->route('category.index')->with(['success' => 'Product Category has been deleted!']);
    }
}
