<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {

    }

    public function index()
    {
        return view('customer.carts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add($id)
    {
        $product = Product::find($id);
        if(!$product){
            abort(404);
        }

        $cart = session()->get('cart');

        if(!$cart){
            $cart = [
                $id => [
                    "nama" => $product->nama_produk,
                    "stok" => 1,
                    "harga" => $product->harga,
                    "gambar_1" => $product->gambar_1
                ]
                ];

                session()->put('cart', $cart);
                return redirect('customer/carts')->with('succcess', 'Produk sudah ditambhakan ke keranjang!');
        }

        if(isset($cart[$id])){
            $cart[$id]['stok']++;
            session()->put('cart', $cart);
            return redirect('customer/carts')->with('success', 'Produk sudah ditambhakan ke keranjang!');
        }

        $cart[$id] = [
                    "nama" => $product->nama_produk,
                    "stok" => 1,
                    "harga" => $product->harga,
                    "gambar_1" => $product->gambar_1
        ];
        session()->put('cart', $cart);
        return redirect('customer/carts')->with('success', 'Produk sudah ditambhakan ke keranjang!');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        if($request->id and $request->stok)
        {
            $cart = session()->get('cart');
            $cart[$request->id]["stok"] = $request->stok;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function remove(Request $request)
    {
        if($request->id){
            $cart = session()->get('cart');

            if(isset($cart[$request->id])){
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }

            session()->flash('success', 'Produk berhasil dihapus');

        }
    }
}