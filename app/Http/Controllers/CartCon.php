<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\String_;

class CartCon extends Controller
{
    //
    public function show(){
        $data['cart'] = Cart::all();

        return view('cart', $data);
    }

    public function store(String $id){
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back();
        }

        $produk = Product::find($id);
        $cart = Cart::where('product_id', $id)->first();

        Cart::updateOrCreate([
            'product_id' => $id,
        ],[
            'price' => $produk->price,
            'qty' => ($cart->qty ?? 0) + 1
        ]);
        return redirect('/cart');
    }

    public function tambah(String $id){
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back();
        }

        $cart = Cart::find($id);

        Cart::updateOrCreate([
            'id' => $id,
        ],[
            'qty' => $cart->qty + 1
        ]);

        return redirect('/cart');
    }

    public function kurang(String $id){
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back();
        }

        $cart = Cart::find($id);


        Cart::updateOrCreate([
            'id' => $id,
         ],[
            'qty' => max($cart->qty - 1, 1)
        ]);

        // $cart->update([
        //     'qty' => max($cart->qty - 1, 1)
        // ]);
        return redirect('/cart');
    }
    public function struk(){
        return view("struk");
    }
        public function showStruk(Request $request)
    {
        $nama = $request->nama;
        $email = $request->email;
        $total = $request->total;

        return view('struk', compact('nama', 'email', 'total'));
    }

}
