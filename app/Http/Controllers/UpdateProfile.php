<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UpdateProfile extends Controller
{
    public function UpdateUser(Request $req)
    {
        $this->validate($req, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $UpdatedUser = auth()->user();
        $UpdatedUser->name = $req->input('name');
        $UpdatedUser->email = $req->input('email');
        $UpdatedUser->password = $req->input('password');
        $UpdatedUser->save();
        return redirect('/home')->with('sucess','profile updated');

    }
}
