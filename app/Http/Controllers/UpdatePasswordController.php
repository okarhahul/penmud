<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordController extends Controller
{
    public function edit(){
        return view('/password.edit', [
            "tittle" => "Ubah Password",
        ]);
    }

    public function update(Request $request){
        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'min:8', 'confirmed']
        ]);

        if(Hash::check($request->current_password, auth()->user()->password)) {
            // return redirect('/login')->with('success', 'Password berhasil diubah');
            auth()->user()->update(['password' => Hash::make($request->password)]);
            return back()->with('success', 'password berhasil diubah');
        }
        return back()->with('gagal', 'ubah password gagal, pastikan data sesuai');
    }
}
