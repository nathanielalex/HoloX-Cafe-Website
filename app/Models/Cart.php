<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
        //return $this->belongsTo(related::class, 'foreignKey', 'ownerKey');
    }
    
    public function barangs()
    {
        return $this->belongsToMany(Barang::class, 'cart_barangs', 'cart_id', 'barang_id')
        ->withPivot('quantity');
        //harus kasih withPivot ini atoga atribut quantity ga di-map gitu
    }
}
