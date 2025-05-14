<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class BerandaCon extends Controller
{
    //
    public function index(){
        // $produk = [
        //     ['nama' => 'Monitor', 'harga' => 1000000, 'gambar' => 'monitor.jpg'],
        //     ['nama' => 'Keyboard', 'harga' => 500000, 'gambar' => 'keyboard.jpg'],
        //     ['nama' => 'Mouse', 'harga' => 200000, 'gambar' => 'mouse.jpg'],
        // ];

        // $produkterbaru = [
        //     ['nama' => 'TV', 'harga' => 3000000, 'gambar' => 'tv.jpg'],
        //     ['nama' => 'TV', 'harga' => 3000000, 'gambar' => 'tv.jpg'],
        //     ['nama' => 'TV', 'harga' => 3000000, 'gambar' => 'tv.jpg'],
        //     ['nama' => 'TV', 'harga' => 3000000, 'gambar' => 'tv.jpg'],
        //     ['nama' => 'TV', 'harga' => 3000000, 'gambar' => 'tv.jpg'],
        //     ['nama' => 'TV', 'harga' => 3000000, 'gambar' => 'tv.jpg'],
        // ];
        $produk = Product::orderBy('created_at','desc')->limit(3)->get();

        return view('home', compact('produk'));
    }
}
