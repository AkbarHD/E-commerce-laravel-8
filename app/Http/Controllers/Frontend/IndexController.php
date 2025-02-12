<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function userLogout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function userProfileEdit()
    {
        $id = Auth::user()->id;
        $user = User::findOrFail($id);
        return view('frontend.profile.user_profile', compact('user'));
    }

    public function userProfileUpdate(Request $request)
    {
        $data = User::find(auth()->user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            if (Auth::user()->profile_photo_path) {
                unlink(public_path('upload/user_images/' . $data->profile_photo_path));
            }
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $fileName);
            // $data['profile_photo_path'] = $fileName;
            $data->profile_photo_path = $fileName;
        }
        $data->save();
        $notification = [
            'message' => 'Profile anda berhasil di update',
            'alert-type' => 'success'
        ];
        return redirect()->route('dashboard')->with($notification);
    }

    public function changePassword()
    {
        $user = User::find(auth()->user()->id);
        return view('frontend.profile.change_password', compact('user'));
    }

    public function userUpdatePassword(Request $request)
    {
        $validation = $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed',
        ]);
        $user = Auth::user();

        $hasPassword = User::find($user->id)->password;
        // jika password lama cocok dengan password di database
        if (Hash::check($request->current_password, $hasPassword)) {
            $user = User::find($user->id);
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();

            $notification = [
                'message' => 'Password anda berhasil di update',
                'alert-type' => 'success'
            ];
            return redirect()->route('user.logout')->with($notification);
        } else {
            $notification = [
                'message' => 'password salah',
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }
    }
}
