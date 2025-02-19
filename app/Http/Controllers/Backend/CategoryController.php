<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    public function viewCategory()
    {
        $categories = Category::latest()->get();
        return view('admin.category.category_view', compact('categories'));
    }

    public function categoryStore(Request $request)
    {
        $request->validate([
            'category_name_en' => 'required',
            'category_name_ind' => 'required',
            'category_icon' => 'required'
        ]);

        Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_ind' => $request->category_name_ind,
            'category_slug_en' => Str::slug($request->category_name_en),
            'category_slug_ind' => Str::slug($request->category_name_ind),
            'category_icon' => $request->category_icon
        ]);
        $notification = [
            'message' => 'Data category berhasil di tambahkan',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function categoryEdit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.category_edit', compact('category'));
    }

    public function categoryUpdate(Request $request, $id)
    {
        $request->validate([
            'category_name_en' => 'required',
            'category_name_ind' => 'required',
            'category_icon' => 'required'
        ]);

        Category::findOrFail($id)->update([
            'category_name_en' => $request->category_name_en,
            'category_name_ind' => $request->category_name_ind,
            'category_slug_en' => Str::slug($request->category_name_en),
            'category_slug_ind' => Str::slug($request->category_name_ind),
            'category_icon' => $request->category_icon
        ]);

        $notification = [
            'message' => 'Data category berhasil di update',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.category')->with($notification);
    }

    public function categoryDelete($id)
    {
        Category::findOrFail($id)->delete();
        $notification = [
            'message' => 'Data category berhasil di hapus',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}
