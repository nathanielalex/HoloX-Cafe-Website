<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    public function loginPage() {
        return view('login');
    }

    public function login(Request $r) {
        $credentials = [
            'email' => $r->email,
            'password' => $r->password
        ];

        if($r->remember) {
            Cookie::queue('mycookie',$r->email,5);
        }

        if(Auth::attempt($credentials)) {
            $session = request()->session();
            $session->put('mysession', $credentials);
            // Session::put('mysession',$credentials);
            return redirect()->route('home'); //hmm
        } else {
            return 'fail';
        }
    }
    public function logout() {
        Auth::logout();
        return redirect()->route('loginPage');
    }
    public function adminPage() {
        return view('admin');
    }
    public function home() {
        return view('home');
    }
    public function registerPage() {
        return view('register');
    }


    public function createUser(Request $req) {

        //tanpa validasi
        $user = new User();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = bcrypt($req->password);
        $user->save();
    
        $cart = new Cart();
        $cart->user_id = $user->id;
        $cart->save();
        return redirect()->route('loginPage');
    }
}
