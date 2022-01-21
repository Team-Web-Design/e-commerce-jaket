<?php

namespace App\Http\Controllers\Customer;

use App\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer\Address;

class AddressController extends Controller
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
        // return view()
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.address.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $address = new Address();
        $address->user_id = auth()->user()->id;
        $address->alamat = $request->alamat;
        $address->nomor_telepon = $request->nomor_telepon;
        $address->kode_pos = $request->kode_pos;
        $address->kecamatan = $request->kecamatan;
        $address->kabupaten = $request->kabupaten;

        $address->save();

        return redirect()->route('order-detail.index');

        // $cart = Cart::where('id_user', auth()->user()->id)->get();
        // $address = Address::where('user_id', auth()->user()->id)->get();
        // $total_harga = 0;

        // foreach ($cart as $item) {
        //     # code...
        //     $total_harga += $item['harga'] * $item['stok'];
        // }
        // return view('customer.order-detail.index', compact('cart', 'address', 'total_harga'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
