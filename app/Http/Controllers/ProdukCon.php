<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Product;
use Illuminate\Auth\Events\Validated;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Symfony\Contracts\Service\Attribute\Required;

class ProdukCon extends Controller
{
    //
    public function index(){
        // $produk = [
        //     ['nama' => 'Monitor', 'harga' => 1000000, 'gambar' => 'monitor.jpg'],
        //     ['nama' => 'Keyboard', 'harga' => 500000, 'gambar' => 'keyboard.jpg'],
        //     ['nama' => 'Mouse', 'harga' => 200000, 'gambar' => 'mouse.jpg'],
        // ];
        $produk = Product::all();
        $kategori = Categorie::all();
        return view('produk', compact('kategori', 'produk'));
    }

    public function detail(string $id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back();
        }
        $data['produk'] = Product::find($id);
        // Product::where('id', $id)->first()/get();
        return view('detail', $data);
    }

    public function create()
    {
        $category['category'] = Categorie::all();
        return view('admin.create', $category);
    }

    public function store(Request $request){
        $validation = $request->validate([
            'name' => 'required|max:50|string',
            'price' => 'required|numeric|min:0',
            'descriptions' => 'required|string',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:5120',
            'categories_id' => 'required'
        ]);
        $image = $request->file('image');
        $filename = time().".".$image->getClientOriginalExtension();
        $image->storeAs('product', $filename);

        $validation['image'] = $filename;

        Product::create($validation);

        // Product::created([
        //     'name' => $request->name,
        //     'price' => $request->price,
        //     'description' => $request->descripton,
        //     'image' => '-',
        //     'categories_id' => $request->categories_id
        // ]);

        return redirect('/administrator/product')->with('success','Data produk berhasil disimpan');

    }

    public function delete(string $id){
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('danger', $e->getMessage());
        }

        $product = Product::find($id);
        if (Storage::exists('product/'.$product->image)) {
            Storage::delete('product/'.$product->image);
        }

        $product->delete();

        return redirect()->back()->with('success', 'Data product berhasil dihapus');
    }

    public function edit(string $id){
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('danger', $e->getMessage());
        }

        $data['product'] = Product::find($id);
        $data['category'] = Categorie::all();
        return view('admin.product-edit', $data);
    }

    public function update(Request $request,string $id){
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('danger', $e->getMessage());
        }

        $validation = $request->validate([
            'name' => 'required|max:50|string',
            'price' => 'required|numeric|min:0',
            'descriptions' => 'required|string',
            // 'image' => 'required|image|mimes:png,jpg,jpeg|max:5120',
            'categories_id' => 'required'
        ]);

        $product = Product::find($id);

        if ($request->hasFile('image')) {
            if (Storage::exists('product/'.$product->image)) {
                Storage::delete('product/'.$product->image);
            }

            $image = $request->file('image');
            $filename = time().".".$image->getClientOriginalExtension();
            $image->storeAs('product',$filename);

            $validation['image'] = $filename;
        }

        $product->update($validation);
        // Product::find($id)->update($validation);
        return redirect('/administrator/product')->with('success','Data produk berhasil diubah');
        

    }
}
