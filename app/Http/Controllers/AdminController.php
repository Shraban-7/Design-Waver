<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Order;
use App\Models\OrderPackage;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $count_order = OrderPackage::all()->count();
        $count_user=User::all()->count();
        $order=OrderPackage::all();
        $processing=Order::all()->where('work_status','processing')->count();
        $total_price=0;
        foreach ($order as $data)
        {
            $total_price+=($data->package_price*$data->package_quantity);
        }

        $contacts=Contact::all()->sortDesc();
        return view('admin.admin_pages.admin_dashboard',compact('count_order','count_user','total_price','contacts','processing'));
    }

    public function AdminLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }



    public function AdminLogin()
    {
        return view('auth.login');
    }
}
