<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Member;
use App\Models\Product;
use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class AdminCon extends Controller
{
    //
    public function index(){
        $data['product'] = Product::all();
        $data['member'] = Member::all();
        $data['category'] = Categorie::all();
        return view('admin.home', $data);
    }

    public function product(){
        $data['product'] = Product::orderBy('created_at', 'desc')->get();
        return view('admin.product', $data);
    }

    public function member(){
        $data['member'] = Member::orderBy('created_at', 'desc')->get();
        return view('admin.member', $data);
    }

    public function kategori(string $id = null){
        if ($id != null) {
            try {
                $id = Crypt::decrypt($id);
            } catch (DecryptException $e) {
                return redirect()->back()->with('danger', $e->getMessage());
            }

            $data['category'] = Categorie::find($id);
            $data['route'] = route('kategori-update', Crypt::encrypt($id));
        }
        else {
            $data['route'] = route('kategori-store');
        }

        $data['kategori'] = Categorie::orderBy('created_at', 'desc')->get();
        return view('admin.kategori', $data);

    }

    
}
