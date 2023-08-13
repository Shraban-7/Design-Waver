<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function brand_backend_list()
    {
        $brands=Brand::all();
        return view('admin.brands.list', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'brand_logo'=>'image|mimes:png,jpg,jpeg,svg,gif,webp,avif,apng',
            'brand_name'=>'required'
        ]);

        $logo = '';
        if ($image = $request->file('brand_logo')) {
            $logo = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move('images/brands', $logo);
        }

        Brand::create([
            'brand_logo'=>$logo,
            'brand_name'=>$request->brand_name
        ]);

        return redirect()->route('brand_list');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {


        $logo = '';
        $deleteOldImage = "images/brands/{$brand->brand_logo}";
        if ($image = $request->file('brand_logo')) {
            if (file_exists($deleteOldImage)) {
                File::delete($deleteOldImage);
            }

            $logo = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move('images/brands', $logo);
        } else {
            $logo = $brand->brand_logo;
        }

        $data = array(
            'brand_logo'=>$logo,
            'brand_name'=>$request->brand_name
        );

        $brand->update($data);
        return redirect()->route('brand_list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $deleteOldImage = "images/service/{$brand->brand_logo}";
        if (file_exists($deleteOldImage)) {
            File::delete($deleteOldImage);
        }

        $brand->delete();

        return redirect()->route('brand_list');
    }
}
