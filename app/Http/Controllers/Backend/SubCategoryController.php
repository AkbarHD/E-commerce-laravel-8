<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    public function viewSubcategory()
    {
        $category =  Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
    return view('admin.category.subcategory_view', compact('subcategories', 'category'));
    }

    public function subcategoryStore(Request $request)
    {
        $request->validate([
            'subcategory_name_en' => 'required',
            'subcategory_name_ind' => 'required',
            'category_id' => 'required'
        ]);

        SubCategory::insert([
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_ind' => $request->subcategory_name_ind,
            'subcategory_slug_en' => Str::slug($request->subcategory_name_en),
            'subcategory_slug_ind' => Str::slug($request->subcategory_name_ind),
            'category_id' => $request->category_id
        ]);
        $notification = [
            'message' => 'Data Subcategory berhasil di tambahkan',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function subcategoryEdit($id)
    {
        $category = Category::latest()->get();
        $subcategory = SubCategory::findOrFail($id);
        return view('admin.category.subcategory_edit', compact('subcategory', 'category'));
    }

    public function subcategoryUpdate(Request $request, $id)
    {
        $request->validate([
            'subcategory_name_en' => 'required',
            'subcategory_name_ind' => 'required',
            'category_id' => 'required'
        ]);

        SubCategory::findOrFail($id)->update([
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_ind' => $request->subcategory_name_ind,
            'subcategory_slug_en' => Str::slug($request->subcategory_name_en),
            'subcategory_slug_ind' => Str::slug($request->subcategory_name_ind),
            'category_id' => $request->category_id
        ]);

        $notification = [
            'message' => 'Data Subcategory berhasil di update',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.subcategory')->with($notification);
    }

    public function subcategoryDelete($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $subcategory->delete();
        $notification = [
            'message' => 'Data Subcategory berhasil di hapus',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }


    // sub sub category

    public function subSubcategoryView()
    {
        $category =  Category::latest()->get();
        $subsubcategories = SubSubCategory::latest()->get();
        return view('admin.category.sub_subcategory_view', compact('subsubcategories', 'category'));
    }

    public function getSubcategoryAjax($category_id)
    {
        $subcategories = SubCategory::where('category_id', $category_id)->get();
        return json_encode($subcategories);
    }

    public function subSubcategoryStore(Request $request)
    {
        $request->validate([
            'subsubcategory_name_en' => 'required',
            'subsubcategory_name_ind' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required'
        ]);

        SubSubCategory::insert([
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_ind' => $request->subsubcategory_name_ind,
            'subsubcategory_slug_en' => Str::slug($request->subsubcategory_name_en),
            'subsubcategory_slug_ind' => Str::slug($request->subsubcategory_name_ind),
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id
        ]);
        $notification = [
            'message' => 'Data Sub Subcategory berhasil di tambahkan',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function subSubcategoryEdit(Request $request, $id)
    {
        $subsubcategory = SubSubCategory::findOrFail($id);
        $category = Category::latest()->get();
        $subcategory = SubCategory::latest()->get();
        return view('admin.category.sub_subcategory_edit', compact('subsubcategory', 'category', 'subcategory'));
    }

    public function subSubcategoryUpdate(Request $request, $id)
    {
        $request->validate([
            'subsubcategory_name_en' => 'required',
            'subsubcategory_name_ind' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required'
        ]);

        SubSubCategory::findOrFail($id)->update([
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_ind' => $request->subsubcategory_name_ind,
            'subsubcategory_slug_en' => Str::slug($request->subsubcategory_name_en),
            'subsubcategory_slug_ind' => Str::slug($request->subsubcategory_name_ind),
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id
        ]);

        $notification = [
            'message' => 'Data Sub Subcategory berhasil di update',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.subsubcategory')->with($notification);
    }

    public function subSubcategoryDelete($id)
    {
        $subsubcategory = SubSubCategory::findOrFail($id);
        $subsubcategory->delete();
        $notification = [
            'message' => 'Data Sub Subcategory berhasil di hapus',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function getSubsubcategoryAjax($subcategory_id)
    {
        $subsubcategories = SubSubCategory::where('subcategory_id', $subcategory_id)->get();
        return json_encode($subsubcategories);
    }
}
