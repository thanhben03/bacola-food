<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // public function FunctionName(Type $var = null)
    // {
    //     # code...
    // }

    public function updateInfo(Request $request)
    {
        // dd($request->all());
        try {
            $user = User::where('id', Auth::user()->id)->first();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
            // dd($user);
            return redirect()->back()->with('msg', 'Update success!');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors([
                'msg' => 'There are some error while updating'
            ]);
        }
    }

    public function changePassword(Request $request)
    {
        $payload = $request->all();
        $compareTwoPassword = $payload['password_1'] === $payload['password_2'];
        $user = User::where('id', Auth::user()->id)->first();
        if (!Hash::check($payload['password_current'], $user->password)) {
            return redirect()->back()->withErrors([
                'msg' => 'Current password is incorrect !'
            ]);
        }
        if (!$compareTwoPassword) {
            return redirect()->back()->withErrors([
                'msg' => 'New password does not match'
            ]);
        }
        $new_password = Hash::make($payload['password_1']);
        try {
            $user->password = $new_password;
            $user->save();
            return redirect()->back()->with('msg', 'Update password success!');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors([
                'msg' => 'There are some error while updating !'
            ]);
        }
    }
}
