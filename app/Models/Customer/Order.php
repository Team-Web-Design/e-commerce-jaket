<?php

namespace App\Models\Customer;

use App\Models\Customer\Address as CustomerAddress;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';

    public function alamat()
    {
        return $this->belongsTo(CustomerAddress::class, 'id_alamat', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
