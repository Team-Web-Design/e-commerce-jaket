<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Admin\Size;
use Image;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sizes = Size::all();
        $categories = Category::all();

        return view('admin.product.create', compact('sizes', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'gambar_1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gambar_2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gambar_3' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $gambar1 = $request->file('gambar_1');
        $gambar2 = $request->file('gambar_2');
        $gambar3 = $request->file('gambar_3');

        $gambar1Ext = $gambar1->getClientOriginalExtension();
        $gambar2Ext = $gambar2->getClientOriginalExtension();
        $gambar3Ext = $gambar3->getClientOriginalExtension();

        $dateTime = date('Ymd_his');

        $gambar1NewName = 'product_1_image_' . $dateTime . '.' . $gambar1Ext;
        $gambar2NewName = 'product_2_image_' . $dateTime . '.' . $gambar2Ext;
        $gambar3NewName = 'product_3_image_' . $dateTime . '.' . $gambar3Ext;

        $gambar1->move(storage_path(env('PATH_PRODUCT_IMAGE')), $gambar1NewName);
        $gambar2->move(storage_path(env('PATH_PRODUCT_IMAGE')), $gambar2NewName);
        $gambar3->move(storage_path(env('PATH_PRODUCT_IMAGE')), $gambar3NewName);

        $product = new Product();

        $product->nama_produk = $request->nama_produk;
        $product->jenis_bahan = $request->jenis_bahan;
        $product->gambar_1 = $gambar1NewName;
        $product->gambar_2 = $gambar2NewName;
        $product->gambar_3 = $gambar3NewName;
        $product->deskripsi = $request->deskripsi;
        $product->stok = $request->stok;
        $product->harga = $request->harga;
        $product->id_ukuran = $request->ukuran;
        $product->id_kategori = $request->kategori;
        $product->save();

        return redirect()->route('admin.produk.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::with('kategori', 'ukuran')->find($id);
        $sizes = Size::all();
        $categories = Category::all();
        return view('admin.product.edit', compact('product', 'sizes', 'categories'));
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('admin.produk.index');
    }

    public function image($imageName)
    {
        $filePath = storage_path(env('PATH_PRODUCT_IMAGE') . $imageName);
        return Image::make($filePath)->response();
    }
}
