<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    
    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'cart_barangs', 'barang_id', 'cart_id');
    }
}
