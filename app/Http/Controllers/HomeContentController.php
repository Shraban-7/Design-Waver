<?php

namespace App\Http\Controllers;

use App\Models\HomeContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HomeContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contents = HomeContent::all();
        return view('admin.content.list', compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.content.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $banner = '';
        if ($image = $request->file('banner')) {
            $banner = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move('images/content', $banner);
        }

        HomeContent::create([
            'title' => $request->title,
            'header' => $request->header,
            'banner' => $banner,
            'sub_title1' => $request->sub_title1,
            'sub_title2' => $request->sub_title2,
            'sub_title3' => $request->sub_title3,
            'content1' => $request->content1,
            'content2' => $request->content2,
            'content3' => $request->content3
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(HomeContent $homeContent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HomeContent $homeContent)
    {
        return view('admin.content.edit',compact('homeContent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HomeContent $homeContent)
    {
        $banner = '';
        $deleteOldImage = "images/content/{$homeContent->banner}";
        if ($image = $request->file('banner')) {
            if (file_exists($deleteOldImage)) {
                File::delete($deleteOldImage);
            }

            $banner = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move('images/content', $banner);
        } else {
            $banner = $homeContent->banner;
        }

        $data = array(
            'title' => $request->title,
            'header' => $request->header,
            'banner' => $banner,
            'sub_title1' => $request->sub_title1,
            'sub_title2' => $request->sub_title2,
            'sub_title3' => $request->sub_title3,
            'content1' => $request->content1,
            'content2' => $request->content2,
            'content3' => $request->content3
        );

        $homeContent->update($data);
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HomeContent $homeContent)
    {
        //
    }
}
