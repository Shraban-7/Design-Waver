<?php

namespace App\Http\Controllers;
use App\Models\Service;
use Illuminate\Support\Facades\File;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{

    public function portfolio_list()
    {
        $portfolios = Portfolio::all();
        return view('admin.portfolio.portfolio_list', compact('portfolios'));
    }
    public function load_more(Request $request)
    {
        $request->validate([
            'service_id' => 'required',
        ]);
        $load_more='';
        $offset = $request->load*8;
        $portfolios = Portfolio::where('service_id', $request->service_id)->skip($offset)->take(8)->get();
        foreach ($portfolios as $data){
        $load_more.="<a href=\"".asset('images/portfolio/'.$data->portfolio_image)."\" data-lightbox=\"gallery\">
        <img class=\"w-full h-full object-cover cursor-pointer\" src=\"".asset('images/portfolio/'.$data->portfolio_image)."\"
            alt=\"portfolio\" />
            </a>";
        }
        echo $load_more;
    }


    public function portfolio_create()
    {
        return view('admin.portfolio.portfolio_create', [
            'services' => Service::query()
                ->select('id', 'service_name')
                ->pluck('service_name', 'id')
                ->prepend('Select Service', '')
                ->toArray(),
        ]);
    }

    public function portfolio_store(Request $request)
    {
        $request->validate([
            'portfolio_image' => 'required|image|mimes:png,jpg,jpeg,svg,gif,webp,avif,apng',
            'service_id' => 'required',
        ]);

        $imageName = '';
        if ($image = $request->file('portfolio_image')) {
            $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move('images/portfolio', $imageName);
        }

        // return $request;

        Portfolio::create([
            'portfolio_image' => $imageName,
            'service_id' => $request->service_id,
        ]);

        return redirect()->route('admin.portfolio_list')->with('success', 'Portfolio created successfully.');
    }

    public function portfolio_show(Portfolio $portfolio)
    {
        return view('admin.portfolio.show', compact('portfolio'));
    }

    public function portfolio_edit($id)
    {
        $portfolio = Portfolio::find($id);
        $service=Service::query()
                ->select('id', 'service_name')
                ->pluck('service_name', 'id')
                ->prepend('Select Service', '')
                ->toArray();
        return view('admin.portfolio.portfolio_edit', compact('portfolio','service'));
    }


    public function portfolio_update(Request $request, $id)
    {
        $portfolio = Portfolio::findOrFail($id);

        $request->validate([
            'service_id' => 'required',
        ]);

        $imageName = '';
        $deleteOldImage = "images/portfolio/{$portfolio->portfolio_image}";
        if ($image = $request->file('portfolio_image')) {
            if (file_exists($deleteOldImage)) {
                File::delete($deleteOldImage);
            }

            $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move('images/portfolio', $imageName);
        } else {
            $imageName = $portfolio->portfolio_image;
        }

        $portfolio->update([
            'portfolio_image' => $imageName,
            'service_id' => $request->service_id,
        ]);

        return redirect()->route('admin.portfolio_list')->with('success', 'Portfolio updated successfully');
    }

    public function portfolio_destroy($id)
    {
        $portfolio = Portfolio::find($id);
        $deleteOldImage = "images/portfolio/{$portfolio->portfolio_image}";
        if (file_exists($deleteOldImage)) {
            File::delete($deleteOldImage);
        }
        $portfolio->delete();

        return redirect()->route('admin.portfolio_list')->with('success', 'Portfolio deleted successfully');
    }

}
