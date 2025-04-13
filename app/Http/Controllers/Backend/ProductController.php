<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function addProduct()
    {
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $brands = Brand::latest()->get();
        return view('admin.product.add_product', compact('categories', 'subcategories', 'brands'));
    }

    public function productStore(Request $request)
    {

        $image = $request->file('product_thumbnail');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('upload/products/thumbnails/' . $name_gen);
        $save_url = 'upload/products/thumbnails/' . $name_gen;

        $product_id = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_code' => $request->product_code,
            'product_name_en' => $request->product_name_en,
            'product_name_ind' => $request->product_name_ind,
            'product_slug_en' => Str::slug($request->product_name_en),
            'product_slug_ind' => Str::slug($request->product_name_ind),
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_ind' => $request->product_tags_ind,
            'product_size_en' => $request->product_size_en,
            'product_size_ind' => $request->product_size_ind,
            'product_color_en' => $request->product_color_en,
            'product_color_ind' => $request->product_color_ind,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_ind' => $request->short_descp_ind,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_ind' => $request->long_descp_ind,
            'product_thumbnail' => $save_url,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'status' => 1,
            'created_at' => now(),
        ]);

        $images = $request->file('multiple_img');
        foreach ($images as $img) {
            $make_img = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)->save('upload/products/multiple_images/' . $make_img);
            $save_img = 'upload/products/multiple_images/' . $make_img;

            MultiImg::insert([
                'product_id' => $product_id,
                'photo_name' => $save_img,
                'created_at' => now(),
            ]);
        }

        $notification = [
            'message' => 'Data Product berhasil di tambahkan',
            'alert-type' => 'success'
        ];

        return redirect()->route('add-product')->with($notification);
    }

    public function manageProduct()
    {
        $products = Product::latest()->get();
        return view('admin.product.product_view', compact('products'));
    }

    public function editProduct($id)
    {
        $multipleImg = MultiImg::where('product_id', $id)->get();
        $product = Product::findOrFail($id);
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $subsubcategories = SubSubCategory::latest()->get();
        $brands = Brand::latest()->get();
        return view('admin.product.product_edit', compact('product', 'categories', 'subcategories', 'brands', 'subsubcategories', 'multipleImg'));
    }

    public function productUpdate(Request $request, $id)
    {
        Product::findOrFail($id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_code' => $request->product_code,
            'product_name_en' => $request->product_name_en,
            'product_name_ind' => $request->product_name_ind,
            'product_slug_en' => Str::slug($request->product_name_en),
            'product_slug_ind' => Str::slug($request->product_name_ind),
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_ind' => $request->product_tags_ind,
            'product_size_en' => $request->product_size_en,
            'product_size_ind' => $request->product_size_ind,
            'product_color_en' => $request->product_color_en,
            'product_color_ind' => $request->product_color_ind,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_ind' => $request->short_descp_ind,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_ind' => $request->long_descp_ind,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'status' => 1,
            'created_at' => now(),
        ]);

        $notification = [
            'message' => 'Data Product berhasil di update',
            'alert-type' => 'success'
        ];

        return redirect()->route('manage-product')->with($notification);
    }

    public function imageUpdate(Request $request)
    {
        $multiple_img = $request->multiple_img;
        foreach ($multiple_img as $id => $img) {
            $imgDel = MultiImg::findOrFail($id);
            unlink($imgDel->photo_name);

            $make_img = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)->save('upload/products/multiple_images/' . $make_img);
            $save_img = 'upload/products/multiple_images/' . $make_img;

            MultiImg::where('id', $id)->update([
                'photo_name' => $save_img,
                'updated_at' => now(),
            ]);
        }
        $notification = [
            'message' => 'Data Product Image berhasil di update',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    public function updateThumbnail(Request $request, $id)
    {
        $image = $request->file('product_thumbnail');
        if ($image) {
            $old_img = Product::findOrFail($id);
            unlink($old_img->product_thumbnail);

            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(917, 1000)->save('upload/products/thumbnails/' . $name_gen);
            $save_url = 'upload/products/thumbnails/' . $name_gen;

            Product::findOrFail($id)->update([
                'product_thumbnail' => $save_url,
                'updated_at' => now(),
            ]);

            $notification = [
                'message' => 'Data Product Thumbnail berhasil di update',
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification);
        }
        $notification = [
            'message' => 'Data Product Thumbnail tidak di update',
            'alert-type' => 'error'
        ];

        return redirect()->back()->with($notification);
    }

}
