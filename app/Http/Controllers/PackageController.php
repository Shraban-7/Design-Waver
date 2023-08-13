<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Package;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use App\Models\Service;


class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function package_list()
    {
        $packages = Package::with(['service', 'attributes'])->get();
        // $attributes=Attribute::all();


        // $package = $packages->first();

        // dd(
        //     $package->id,
        //     $package->attributes,
        //     $package->service->service_name
        // );

        return view('admin.package.package_list', compact('packages'));
    }



    /**
     * Show the form for creating a new resource.
     */


    public function package_create()
    {
        return view('admin.package.package_create', [
            'services' => Service::query()
                ->select('id', 'service_name')
                ->pluck('service_name', 'id')
                ->prepend('Select Service', '')
                ->toArray(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */


    public function package_store(Request $request)
    {
        //dd($request);
        //return $request;
        $request->validate([
            'package_name' => 'required',
            'package_price' => 'required',
            'package_status' => 'required',
            'service_id' => 'required',
            'home_view' => 'required',
            'position' => 'required',
            'delivery_time' => 'required',
            'attribute_id' => 'required|array',
            'attribute_id.*' => 'required|exists:attributes,id'
        ]);

        $package = Package::create([
            'package_name' => $request->package_name,
            'package_price' => $request->package_price,
            'offer_package_price' => $request->offer_package_price,
            'offer_price_start_date' => $request->offer_price_start_date,
            'offer_price_end_date' => $request->offer_price_end_date,
            'package_status' => $request->package_status,
            'service_id' => $request->service_id,
            'home_view' => $request->home_view,
            'position' => $request->position,
            'delivery_time' => $request->delivery_time,
        ]);

        $package->attributes()->attach($request->attribute_id);

        return redirect()->route('admin.package_list')->with('success', 'Package created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $package = Package::find($id);
        return view('frontend.layouts.package_show', compact('package'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit_package(string $id)
    {
        $package = Package::find($id);

            $service=Service::query()
                ->select('id', 'service_name')
                ->pluck('service_name', 'id')
                ->prepend('Select Service', '')
                ->toArray();

                $attributes = Attribute::query()
                ->where('service_id', $package->service_id)
                ->get();



            //return $attributes;

        return view('admin.package.package_edit', compact('package','service','attributes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_package(Request $request, string $id)
    {
        $request->validate([
            'package_name' => 'required',
            'package_price' => 'required',
            'package_status' => 'required',
            'service_id' => 'required',
            'home_view' => 'required',
            'position' => 'required',
            'delivery_time' => 'required',
            'attribute_id' => 'required|array',
            'attribute_id.*' => 'required|exists:attributes,id'
        ]);
        $package = Package::find($id);
        $package->update([
            'package_name' => $request->package_name,
            'package_price' => $request->package_price,
            'package_status' => $request->package_status,
            'service_id' => $request->service_id,
            'home_view' => $request->home_view,
            'position' => $request->position,
            'delivery_time' => $request->delivery_time,
            'offer_package_price' => $request->offer_package_price,
            'offer_price_start_date' => $request->offer_price_start_date,
            'offer_price_end_date' => $request->offer_price_end_date,

        ]);

        $package->attributes()->detach($package->attributes->pluck('id'));
        $package->attributes()->attach($request->attribute_id);

        return redirect()->route('admin.package_list')->with('success', 'Package updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function package_delete(string $id)
    {
        $package = Package::find($id);
        $package->delete();
        return redirect()->route('admin.package_list')->with('success', 'Package deleted successfully.');
    }
}
