<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    public function viewBrand()
    {
        $brands = Brand::latest()->get();
        return view('admin.brands.brand_view', compact('brands'));
    }


    public function brandStore(Request $request)
    {
        $request->validate([
            'brand_name_en' => 'required',
            'brand_name_ind' => 'required',
            'brand_image' => 'required|image'
        ]);

        $image = $request->file('brand_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        // kalo pakai public_path harus buat foldernya dulu, tidak bisa seperti store ga bikin juga tidak apa apa
        Image::make($image)->resize(300, 300)->save('upload/brand/' . $name_gen);
        // $image->move(public_path('upload/brand_images/'), $name_gen);
        $save_url = 'upload/brand/' . $name_gen;

        Brand::insert([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_ind' => $request->brand_name_ind,
            'brand_slug_en' => Str::slug($request->brand_name_en),
            'brand_slug_ind' => Str::slug($request->brand_name_ind),
            'brand_image' => $save_url
        ]);
        $notification = [
            'message' => 'Data brand berhasil di tambahkan',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    public function brandEdit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brands.brand_edit', compact('brand'));
    }

    public function brandUpdate(Request $request, $id)
    {
        $request->validate([
            'brand_name_en' => 'required',
            'brand_name_ind' => 'required',
            'brand_image' => 'nullable|image' // Gambar bisa dikosongkan
        ]);
        $brand = Brand::findOrFail($id);
        $old_image = $brand->brand_image;

        if ($request->file('brand_image')) {
            // Hapus gambar lama jika ada
            if (file_exists(public_path($old_image))) {
                unlink(public_path($old_image));
            }

            // Upload gambar baru
            $image = $request->file('brand_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save(public_path('upload/brand/' . $name_gen));
            $save_url = 'upload/brand/' . $name_gen;
        } else {
            $save_url = $old_image; // Jika tidak upload gambar, gunakan gambar lama
        }

        // Update data brand
        $brand->update([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_ind' => $request->brand_name_ind,
            'brand_slug_en' => Str::slug($request->brand_name_en),
            'brand_slug_ind' => Str::slug($request->brand_name_ind),
            'brand_image' => $save_url
        ]);

        return redirect()->route('all.brand')->with([
            'message' => 'Data brand berhasil diupdate',
            'alert-type' => 'success'
        ]);
    }

    public function brandDelete($id)
    {
        $brand = Brand::findOrFail($id);
        if (file_exists(public_path($brand->brand_image))) {
            unlink(public_path($brand->brand_image));
        }
        $brand->delete();
        return redirect()->back()->with([
            'message' => 'Data brand berhasil dihapus',
            'alert-type' => 'success'
        ]);
    }
}
