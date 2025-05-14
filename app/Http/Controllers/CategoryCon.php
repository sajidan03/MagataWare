<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CategoryCon extends Controller
{
    public function store(Request $request){
        $validation = $request->validate([
            'name' => 'required|max:50|string'
        ]);

        Categorie::create($validation);
        return redirect()->back()->with('success','Data berhasil ditambah');
    }

    public function edit(string $id){
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('danger', $e->getMessage());
        }
        $data['route'] = route('kategori-update', Crypt::encrypt($id));
        $data['kategori'] = Categorie::orderBy('created_at', 'desc')->get();
        $data['nama'] = Categorie::find($id);
        return view('Admin.kategori', $data);
    }

    public function update(Request $request, string $id){
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('danger', $e->getMessage());
        }
        $validation = $request->validate([
            'name' => 'required|max:50|min:0'
        ]);

        $category = Categorie::find($id);
        $category->update($validation);

        return redirect('/administrator/kategori')->with('success', 'Data berhasil diubah');
    }

    public function delete(string $id){
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('danger', $e->getMessage());
        }

        $kategori = Categorie::find($id);
        $kategori->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
