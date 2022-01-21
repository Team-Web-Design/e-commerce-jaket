<?php

namespace App\Models\Customer;

use App\Models\Admin\Product;
use App\User;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_detail';


    public function produk()
    {
        return $this->belongsTo(Product::class, 'id_produk', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'id_order', 'id');
    }
}
