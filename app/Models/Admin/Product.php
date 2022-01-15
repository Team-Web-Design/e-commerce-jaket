<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'produk';

    public function ukuran()
    {
        return $this->belongsTo(Size::class, 'id_ukuran', 'id');
    }

    public function kategori()
    {
        return $this->belongsTo(Category::class, 'id_kategori', 'id');
    }
}
