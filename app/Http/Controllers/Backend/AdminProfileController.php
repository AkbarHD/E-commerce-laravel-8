<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    public function adminProfile()
    {
        $adminData = Admin::find(1);
        return view('admin.admin_profile_view', compact('adminData'));
    }

    public function adminProfileEdit()
    {
        $editData = Admin::find(1);
        return view('admin.admin_profile_edit', compact('editData'));
    }

    public function adminProfileupdate(Request $request)
    {
        // dd($request->all());
        $data = Admin::find(1);
        $data->name = $request->name;
        $data->email = $request->email;
        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            if($data->profile_photo_path){
                unlink(public_path('upload/admin_images/' . $data->profile_photo_path));
            }
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images/'), $filename);
            $data['profile_photo_path'] = $filename;
        }

        $data->save();
        $notification = [
            'message' => 'Data admin berhasil di update',
            'alert-type' => 'success'
        ];
        return redirect()->route('admin.profile')->with($notification);

    }
}
