<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function viewBrand()
    {
        $brands = Brand::latest()->get();
        return view('admin.brands.brand_view', compact('brands'));
    }

    public function brandStore(Request $request)
    {

    }
}
