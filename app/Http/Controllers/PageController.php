<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\User;
use App\Models\Order;
use App\Models\Service;
use App\Models\HomeContent;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;

class PageController extends Controller
{



    public function page_list()
    {
        $pages = Page::all();
        return view('admin.pages.pages', compact('pages'));
    }
    public function pages_by_slug($slug)
    {
        $page = Page::where('slug', $slug)->first();
        $count_user = User::count();
        $count_order = Order::count();
        $services = Service::all();
        $contact_info = HomeContent::where('id',2)->first();
        return view('frontend.layouts.dynamic_page', compact(['page', 'count_user', 'count_order', 'services','contact_info']));
    }
    public function about_by_slug($slug)
    {
        $page = Page::where('slug', $slug)->first();


        return view('frontend.layouts.home', compact('page'));
    }





    // public function menu_pages()
    // {
    //     $pages = Page::all();
    //     $url="";
    //     foreach ($pages as  $value) {
    //         $url.="<a class=\"text-lightGray font-semibold text-lg\"
    //         href=\"".URL::to('pages/')."/$value->slug\">$value->title</a>";
    //     }
    //     echo $url;
    //     // return view('admin.service.service_list', compact('services'));
    // }


    public function page_create()
    {

        return view('admin.pages.create');
    }
    public function page_store(Request $request)
    {
        $request->validate([
            'page_name' => 'required',
            'title' => 'required',

            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
            'content' => 'required',
        ]);



        $banner = '';
        if ($image = $request->file('image')) {
            $banner = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move('images/pages', $banner);
        }

        $page = new Page;
        $page->page_name = $request->page_name;
        $page->title = $request->title;
        $page->slug =   Str::slug($request->page_name, '-');;
        $page->meta_title = $request->meta_title;
        $page->meta_description = $request->meta_description;
        $page->meta_keywords = $request->meta_keywords;
        $page->content = $request->content;
        $page->image = $banner;
        $page->save();


        // return $request->all();

        return redirect()->route('admin.page_list')
            ->with('success', 'Page created successfully.');
    }

    public function page_edit($id)
    {
        $page = Page::find($id);
        return view('admin.pages.edit', compact('page'));
    }
    public function page_edit_by_slug($slug)
    {

        $page = Page::where('slug', $slug)->first();
        return view('admin.pages.edit', compact('page'));
    }

    public function page_update(Request $request, $slug)
    {

        $page = Page::where('slug', $slug)->first();
        $request->validate([
            'page_name' => 'required',
            'title' => 'required',
            // 'slug' => 'required | unique:pages,slug,' . $page->id,
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
            'content' => 'required',
        ]);

        $banner = '';
        $deleteOldImage = "images/pages/{$page->image}";
        if ($image = $request->file('image')) {
            if (file_exists($deleteOldImage)) {
                File::delete($deleteOldImage);
            }

            $banner = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move('images/pages', $banner);
        } else {
            $banner = $page->image;
        }

        $page = Page::where('slug', $slug)->first();
        // return $request->all();
        $page->update([
            'page_name' => $request->page_name,
            'title' => $request->title,
            'slug' => Str::slug($request->page_name),
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'content' => $request->content,
            'image' => $banner
        ]);



        return redirect()->back()
            ->with('success', 'Page updated successfully.');
    }


    public function page_destroy($slug)
    {
        $page = Page::where('slug', $slug)->first();

        $deleteOldImage = "images/pages/{$page->image}";
        if (file_exists($deleteOldImage)) {
            File::delete($deleteOldImage);
        }
        $page->delete();

        return redirect()->route('admin.page_list')
            ->with('success', 'Page deleted successfully.');
    }
}
