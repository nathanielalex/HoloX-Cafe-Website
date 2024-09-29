<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Cart;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function cartPage() {
        if(Auth::user()->role == 'admin') {
            return redirect()->back();
        }

        $cart = Cart::where('user_id', Auth::user()->id)->first();
        // $cart = Cart::with('barangs')->find($cart->id); // Eager load products
        // $barangs = Cart::with('barangs')->where('cart_id', $cart->id); // Eager load products
        
        $barangs = $cart->barangs; // This won't trigger additional queries

        // $carts = Cart::with('products')->get(); // Eager load products for all carts


        return view('cart', [
            'barangs' => $barangs,
        ]);
    }
    public function addToCart(Request $r, $id){
        $cart = Cart::where('user_id', Auth::user()->id)->first();
        // $barang = Barang::find($id);

        DB::table('cart_barangs')->insert([
            'cart_id' => $cart->id,
            'barang_id' => $id,
            'quantity' => $r->quantity,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // $cart = session()->get('cart', []);

        return redirect()->back();
        // return redirect()->back()->with('success', 'Product added to cart successfully');
    }

    public function deleteBarangFromCart($id){

        $cart = Cart::where('user_id', Auth::user()->id)->first();
        // $barang = $cart->barangs->find($id);
        $cart->barangs()->detach($id);
        
        return redirect()->back();
    }
}
