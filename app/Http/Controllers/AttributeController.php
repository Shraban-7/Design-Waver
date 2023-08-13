<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Package;
use App\Models\Service;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function attribute_list()
    {
        $attributes = Attribute::all();
        return view('admin.attribute.attribute_list', compact('attributes'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $services = Service::all();
        $attributes = Attribute::all();
        return view('admin.attribute.add_attribute', compact(['attributes', 'services']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'attribute_name' => 'required',
        ]);

        // $package_id = $request->$id;
        // return $request->id;

        // echo "<pre>"; print_r($request); exit;
        Attribute::create(
            [
                'attribute_name' => $request->attribute_name,
                'service_id' => $request->service_id,
            ]
        );

        // return redirect()->back();
        return redirect()->route('admin.attribute_list')->with('success', 'Attribute has been added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $services = Service::all();
        $attribute = Attribute::find($id);
        return view('admin.attribute.edit_attribute', compact('attribute', 'services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([

            'attribute_name' => 'required',
            'package_id' => 'required',
        ]);

        $attribute = Attribute::find($id);
        $attribute->update(
            [
                'attribute_name' => $request->attribute_name,
                'package_id' => $request->package_id,
            ]
        );

        return redirect()->route('admin.attribute_list')->with('success', 'Attribute has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $attribute = Attribute::find($id);
        $attribute->delete();
        return redirect()->back()->with('alert', 'Attribute has been deleted.');
    }
}
