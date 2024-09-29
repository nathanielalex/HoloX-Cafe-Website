<?php

namespace App\Http\Controllers;

use App\Models\Barang;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    //to return view    
    public function index(){
        $barangs = Barang::all();
        return view('admin', ['barangs' => $barangs]);
    }

    public function homeIndex(){
        // $barangs = Barang::all();
        $barangs = Barang::limit(3)->get();


        // $barangs = Barang::paginate(4);
        // $products = Product::has('promo')->paginate(4);
        
        return view('home', ['barangs' => $barangs]);
    }

    public function productPage(){
        // $barangs = Barang::all();
        $barangs = Barang::all();
        // $products = Product::has('promo')->paginate(4);
        
        return view('product', ['barangs' => $barangs]);
    }

    


    public function createBarang(Request $req) {

        $file = $req->file('image');
        $imageName = time().'.'.$file->getClientOriginalExtension();
        Storage::putFileAs('public/images', $file, $imageName);
        $imageName = 'images/'.$imageName;

        //tanpa validasi
        $barang = new Barang();
        $barang->kategori = $req->kategori;
        $barang->nama = $req->nama;
        $barang->harga = $req->harga;
        $barang->jumlah = $req->jumlah;
        $barang->image = $imageName;

        $barang->save();

        return redirect()->back();
    }

    public function updateBarang(Request $req){
        $file = $req->file('image');
        $barang = Barang::find($req->id);

        if($file != null) {
            $imageName = time().'.'.$file->getClientOriginalExtension();
            Storage::putFileAs('public/images', $file, $imageName);
            $imageName = 'images/'.$imageName;

            

            Storage::delete('public/'.$barang->image);
            $barang->image = $imageName;
        } else {
            $barang->image =  $barang->image;
        }

        

        $barang->kategori = $req->kategori != null ? $req->kategori : $barang->kategori;
        $barang->nama = $req->nama != null ? $req->nama : $barang->nama;
        $barang->harga = $req->harga  != null ? $req->harga : $barang->harga;
        $barang->jumlah = $req->jumlah  != null ? $req->jumlah : $barang->jumlah;
        

        $barang->save();

        return redirect()->back();
    }

    public function deleteBarang($id){
        $barang = Barang::find($id);

        if(isset($barang)){
            Storage::delete('public/'.$barang->image);
            $barang->delete();
        }
        return redirect()->back();
    }

    public function addToCart($id){
        $barang = Barang::find($id);

        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                // "kategori_barang" => $barang->kategori;
                // "nama_barang" => $barang->nama;
                // "harga_barang" => $barang->harga;
                // "jumlah_barang" => 1;
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully');
    }
    
}
