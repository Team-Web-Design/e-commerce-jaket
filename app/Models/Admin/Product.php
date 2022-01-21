<?php

namespace App\Models\Admin;

use App\Models\ProductReview;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    protected $table = 'produk';
    protected $fillable = [
        'nama_produk', 'jenis_bahan', 'gambar_1', 'gambar_2', 'gambar_3', 'deskripsi', 'stok', 'id_kategori', 'id_ukuran'
    ];

    public function ukuran()
    {
        return $this->belongsTo(Size::class, 'id_ukuran', 'id');
    }

    public function kategori()
    {
        return $this->belongsTo(Category::class, 'id_kategori', 'id');
    }

    public function orderProducts($order_by)
    {
        $query = "SELECT p.*, oi.rating FROM produk AS p LEFT JOIN (SELECT id_produk, AVG(rating) as rating FROM review GROUP BY id_produk) AS oi ON oi.id_produk = p.id ORDER BY created_at DESC;";

        if ($order_by == 'best_seller') {
            $query = "SELECT p.*, oi.stok, r.rating FROM produk AS p LEFT JOIN (SELECT id_produk, SUM(stok) as stok FROM order_detail GROUP BY id_produk) AS oi ON oi.id_produk = p.id LEFT JOIN (SELECT id_produk, AVG(rating) as rating FROM review GROUP BY id_produk) AS r ON r.id_produk = p.id ORDER BY oi.stok DESC;";
        } else if ($order_by == 'terbaik') {
            $query = "SELECT p.*, oi.rating FROM produk AS p LEFT JOIN (SELECT id_produk, AVG(rating) as rating FROM review GROUP BY id_produk) AS oi ON oi.id_produk = p.id ORDER BY oi.rating DESC;";
        } else if ($order_by == 'termurah') {
            $query = "SELECT p.*, oi.rating FROM produk AS p LEFT JOIN (SELECT id_produk, AVG(rating) as rating FROM review GROUP BY id_produk) AS oi ON oi.id_produk = p.id ORDER BY harga ASC; ";
        } else if ($order_by == 'termahal') {
            $query = "SELECT p.*, oi.rating FROM produk AS p LEFT JOIN (SELECT id_produk, AVG(rating) as rating FROM review GROUP BY id_produk) AS oi ON oi.id_produk = p.id ORDER BY harga DESC; ";
        } else if ($order_by == 'terbaru') {
            $query = "SELECT p.*, oi.rating FROM produk AS p LEFT JOIN (SELECT id_produk, AVG(rating) as rating FROM review GROUP BY id_produk) AS oi ON oi.id_produk = p.id ORDER BY created_at DESC; ";
        }

        return DB::select($query);
    }

    public function review()
    {
        return $this->hasMany(ProductReview::class, 'id_produk', 'id');
    }
}
