<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class MemberCon extends Controller
{
    public function create(){
        return view('Admin.member-create');
        // $member['member'] = Member::all();
        // return view('Admin.member-create', $member);
    }

    public function store(Request $request){
        $validation = $request->validate([
            'name' => 'required|max:50|string',
            'no_hp' => 'required|min:12|numeric',
            'address' => 'required|string',
            'foto' => 'required|image|mimes:png,jpg,jpeg,webp|max:5120'
        ]);
        $foto = $request->file('foto');
        $filename = time().".".$foto->getClientOriginalExtension();
        $foto->storeAs('profil', $filename);

        $validation['foto'] = $filename;
        $validation['users_id'] = "1";

        Member::create($validation);
        return redirect('/administrator/member')->with('success','Data berhasil ditambah');
    }

    public function edit(Request $request, string $id){
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('danger', $e->getMessage());
        }

        $data['member'] = Member::find($id);
        return view('Admin.member-edit', $data);
    }

    public function update(Request $request, string $id){
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('danger', $e->getMessage());
        }

        $validation = $request->validate([
            'name' => 'required|max:50|string',
            'no_hp' => 'required|min:12|numeric',
            'address' => 'required|string',
            'foto' => 'image|mimes:png,jpg,jpeg,webp|max:5120'
        ]);

        $member = Member::find($id);

        if($request->hasFile('foto')){
            if(Storage::exists('profil/'.$member->foto)){
                Storage::delete('profil/'.$member->foto);
            }

            $foto = $request->file('foto');
            $filename = time().".".$foto->getClientOriginalExtension();
            $foto->storeAs('profil', $filename);

            $validation['foto'] = $filename;
        }

        $validation['users_id'] = '1';
        $member->update($validation);
        return redirect('/administrator/member')->with('success', 'Data berhasil diedit');
    }

    public function delete(string $id){
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('danger', $e->getMessage());
        }

        Member::find($id)->delete();
        

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
