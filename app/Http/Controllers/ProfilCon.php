<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfilCon extends Controller
{
    //
    public function profil(){
        $data['member'] = Auth::user()->Member;
        return view('profil.profil', $data);
    }

    public function update(Request $request){

        $id = Auth::user()->id;

        $validation = $request->validate([
            'user_name' => 'required|max:50|string',
            'email' => 'required|max:50|string',
            'member_name' => 'required|max:50|string',
            'password' => 'nullable|max:500|string',
            'no_hp' => 'required|min:12|numeric',
            'address' => 'required|string',
            'foto' => 'image|mimes:png,jpg,jpeg,webp|max:5120'
        ]);

        $userdata = [
            'name' => $validation['user_name'],
            'email' => $validation['email']
        ];

        if ($request->filled('password')) {
            $userdata['password'] = bcrypt($validation['password']);
        }

        $memberdata = [
            'name' => $validation['member_name'],
            'no_hp' => $validation['no_hp'],
            'address' => $validation['address']
        ];

        $member = Member::where('users_id', $id)->first();
        $user = User::find($id);

        if($request->hasFile('foto')){
            if(Storage::exists('profil/'.$member->foto)){
                Storage::delete('profil/'.$member->foto);
            }

            $foto = $request->file('foto');
            $filename = time().".".$foto->getClientOriginalExtension();
            $foto->storeAs('profil', $filename);

            $memberdata['foto'] = $filename;
        }

        $member->update($memberdata);
        $user->update($userdata);

        return redirect('/profil')->with('success', 'Data berhasil diupdate');

    }
}
