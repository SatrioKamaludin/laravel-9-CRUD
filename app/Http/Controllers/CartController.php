<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function add_to_cart(Product $product, Request $request){
        $user_id = Auth::id();
        $product_id = $product->id;

        $existing_cart = Cart::where('product_id', $product_id) //pengecekan untuk produk yang telah ditambah sebelumnya
            ->where('user_id', $user_id)
            ->first();

        if($existing_cart == null){ // apakah sudah ada cart yang berisi produk ini atau belum
            $request->validate([
                'amount' => 'required|gte:1|lte:' . $product->stock //greater than or equal, less than equal
            ]);
    
            Cart::create([
                'user_id' => $user_id,
                'product_id' => $product_id,
                'amount' => $request->amount
            ]);
        } else {
            $request->validate([
                'amount' => 'required|gte:1|lte:' . ($product->stock - $existing_cart->amount) //validasi menentukan dari produk stok dikurangi dengan yg ada di cart
            ]);

            //misal: jika stok ada 5 dan di cart sudah ada 2, maka max yang bisa diambil lagi adalah 3

            $existing_cart->update([
                'amount' => $existing_cart->amount + $request->amount
            ]);
        }
        return Redirect::route('show_cart'); 
    }

    public function show_cart(){
        $user_id = Auth::id();
        $carts = Cart::where('user_id', $user_id)->get();
        return view('show_cart', compact('carts')); 
    }

    public function update_cart(Cart $cart, Request $request){
        $request->validate([
            'amount' => 'required|gte:1|lte:' . $cart->product->stock
        ]); 

        $cart->update([
            'amount' => $request->amount
        ]);

        return Redirect::route('show_cart');
    }

    public function delete_cart(Cart $cart){
        $cart->delete();
        return Redirect::back();
    }
}
