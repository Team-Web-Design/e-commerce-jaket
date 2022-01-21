<?php

namespace App\Models;

use App\Models\Admin\Product;
use App\User;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    protected $table = 'review';
    protected $fillable = [
        'id_produk', 'id_user', 'rating', 'ulasan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function produk()
    {
        return $this->belongsTo(Product::class, 'id_produk', 'id');
    }

    
}
