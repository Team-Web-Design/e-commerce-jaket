<?php

namespace App;

use App\Models\Admin\Product;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = "keranjang";

    public function produk()
    {
        return $this->belongsTo(Product::class, 'id_produk', 'id');
    }
}
