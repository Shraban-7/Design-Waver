<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Package;
use App\Models\Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function service_list()
    {
        $services = Service::all();
        return view('admin.service.service_list', compact('services'));
    }
    public function menu_services()
    {
        $services = Service::all();
        $url="";
        foreach ($services as  $value) {
            $url.="<li class=\"hover:bg-slate-100\"><a class=\"text-gray-700 block px-4 py-2 text-sm\"
            href=\"".URL::to('service/')."/$value->slug\">$value->service_name</a></li>";
        }
        echo $url;
        // return view('admin.service.service_list', compact('services'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create_service()
    {
        return view('admin.service.service_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store_service(Request $request)
    {
        $request->validate([
            'service_name' => 'required',
            // 'slug' => 'required|unique:services',
            'service_banner'=>'required|image|mimes:png,jpg,jpeg,svg,gif,webp,avif,apng',
            'service_title' => 'required',
            'service_image' => 'required|image|mimes:png,jpg,jpeg,svg,gif,webp,avif,apng',
            'service_description' => 'required',
            'service_status' => 'required',
            'project' => 'required',
            'client' => 'required',
            'review' => 'required',

        ]);

        $imageName = '';
        if ($image = $request->file('service_image')) {
            $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move('images/service/service_image/', $imageName);
        }
        $banner = '';
        if ($image = $request->file('service_banner')) {
            $banner = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move('images/service/service_banner/', $banner);
        }

        // dd($request->all()) ;
        // $slug=Str::slug($request->slug, '-');
        Service::create(
            [
                'service_name' => $request->service_name,
                'slug' => Str::slug($request->service_name),
                'service_banner' => $banner, // 'service_banner
                'service_title' => $request->service_title,
                'service_image' => $imageName,
                'service_description' => $request->service_description,
                'service_process'=>$request->service_process,
                'service_status' => $request->service_status,
                'project' => $request->project,
                'client' => $request->client,
                'review' => $request->review,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'meta_keywords' => $request->meta_keywords,
            ]
        );

        return redirect()->route('admin.service_list')->with('success', 'Service created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function service_details($slug)
    {
        //echo  $slug;

        $service = Service::with(['package'=>function($query){
            $query->where('home_view','1')
            ->orderBy('position', 'ASC');
            $query->with(['attributes']);
        },])->where('slug', $slug)->first();
        $portfolio=Portfolio::where('service_id',$service->id)->take(8)->get();
        $count_port = Portfolio::where('service_id', $service->id)->count();
        // return $service;
        return view('frontend.layouts.service', compact(['service','portfolio','count_port']));
    }

	public function service_package_details($slug,$packege_id)
    {
        // echo  $slug;
        // echo  $packege_id;exit;
		//$packeges_id=int($packege_id);

        $service = Service::where('slug', $slug)->first();
		$package=Package::with('attributes')->where('id',$packege_id)->get();
        $portfolio=Portfolio::where('service_id',$service->id)->take(8)->get();
        
        // return $service;
        return view('frontend.layouts.service-packege', compact(['service','package','portfolio']));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit_service($id)
    {
        $service = Service::find($id);
        return view('admin.service.service_edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_service(Request $request, string $id)
    {
        $service = Service::findOrFail($id);
        $request->validate([
            'service_name' => 'required',
            // 'slug' => 'required|unique:services,slug,' . $service->id,
            'service_banner'=>'image|mimes:png,jpg,jpeg,svg,gif,webp,avif,apng',
            'service_title' => 'required',
            'service_image' => 'image|mimes:png,jpg,jpeg,svg,gif,webp,avif,apng',
            'service_description' => 'required',
            'service_status' => 'required',
            'project' => 'required',
            'client' => 'required',
            'review' => 'required',

        ]);

        $imageName = '';
        $deleteOldImage = "images/service/{$service->service_image}";
        if ($image = $request->file('service_image')) {
            if (file_exists($deleteOldImage)) {
                File::delete($deleteOldImage);
            }

            $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move('images/service/service_image/', $imageName);
        } else {
            $imageName = $service->service_image;
        }


        $banner = '';
        $deleteOldbanner= "images/service/service_image/{$service->service_banner}";
        if ($bannerimage = $request->file('service_banner')) {
            if (file_exists($deleteOldbanner)) {
                File::delete($deleteOldbanner);
            }

            $banner = time() . '-' . uniqid() . '.' . $bannerimage->getClientOriginalExtension();
            $bannerimage->move('images/service/service_banner/', $banner);
        } else {
            $banner = $service->service_banner;
        }

        // $slug=Str::slug($request->slug, '-');
        $service->update(
            [
                'service_name' => $request->service_name,
                'slug' => Str::slug($request->service_name),
                'service_banner' => $banner, // 'service_banner
                'service_title' => $request->service_title,
                'service_image' => $imageName,
                'service_description' => $request->service_description,
                'service_process'=>$request->service_process,
                'service_status' => $request->service_status,
                'project' => $request->project,
                'client' => $request->client,
                'review' => $request->review,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'meta_keywords' => $request->meta_keywords,
            ]
        );

        return redirect()->route('admin.service_list')->with('success', 'Service updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function service_delete(string $id)
    {
        $service = Service::findOrFail($id);
        $deleteOldImage = "images/service/service_image/{$service->service_image}";
        $deleteOldBanner = "images/service/service_banner/{$service->service_banner}";
        if (file_exists($deleteOldImage)) {
            File::delete($deleteOldImage);
        }
        if (file_exists($deleteOldBanner)) {
            File::delete($deleteOldBanner);
        }
        $service->delete();
        return redirect()->route('admin.service_list')->with('success', 'Service deleted successfully.');
    }

    public function attributes(Request $request)
    {
        $request->validate(['service_id' => 'required|exists:services,id']);

        $attributes = Attribute::query()
            ->where('service_id', $request->service_id)
            ->pluck('attribute_name', 'id')
            ->toArray();

        return response()->json([
            'attributes' => $attributes
        ]);
    }
}
