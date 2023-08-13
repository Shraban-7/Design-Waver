<?php

namespace App\Http\Controllers;

use App\Mail\CustomerOrderMail;
use App\Models\User;
use App\Models\Order;
use App\Mail\OrderMail;
use App\Models\Package;
use App\Models\Service;
use App\Models\Attribute;
use App\Models\OrderPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Darryldecode\Cart\Facades\CartFacade as Cart;



class OrderController extends Controller
{
    public function order_list()
    {
        $ordersPackage_complete = DB::table('orders')
            ->select('*')
            ->join('order_packages', 'order_packages.order_id', '=', 'orders.id')
            ->join('services', 'services.id', '=', 'order_packages.service_id')
            ->join('packages', 'packages.id', '=', 'order_packages.package_id')
            ->where('orders.work_status', 'completed')->get();
        $ordersPackage_pending = DB::table('orders')
            ->select('*')
            ->join('order_packages', 'order_packages.order_id', '=', 'orders.id')
            ->join('services', 'services.id', '=', 'order_packages.service_id')
            ->join('packages', 'packages.id', '=', 'order_packages.package_id')
            ->where('orders.work_status', 'pending')->get();
        $ordersPackage_processing = DB::table('orders')
            ->select('*')
            ->join('order_packages', 'order_packages.order_id', '=', 'orders.id')
            ->join('services', 'services.id', '=', 'order_packages.service_id')
            ->join('packages', 'packages.id', '=', 'order_packages.package_id')
            ->where('orders.work_status', 'processing')->get();
        $ordersPackage_decline = DB::table('orders')
            ->select('*')
            ->join('order_packages', 'order_packages.order_id', '=', 'orders.id')
            ->join('services', 'services.id', '=', 'order_packages.service_id')
            ->join('packages', 'packages.id', '=', 'order_packages.package_id')
            ->where('orders.work_status', 'decline')->get();
        // $complete = Order::where('work_status', 'completed')->get();
        //return $ordersPackage;

        //  return $ordersPackage_pending;

        $complete = $ordersPackage_complete->count();
        $processing = $ordersPackage_processing->count();
        $pending = $ordersPackage_pending->count();
        $decline = $ordersPackage_decline->count();

        // return $processing;

        return view('admin.order.order_list', compact('ordersPackage_complete', 'ordersPackage_pending', 'ordersPackage_processing', 'ordersPackage_decline','complete','processing','pending','decline'));
    }

    // public function order_list_2()
    // {
    // $ordersPackage = OrderPackage::with(['orders', 'services', 'packages'])->orderBy('created_at','desc')->get();
    //     $complete = Order::where('work_status', 'completed')->get();
    //     // return $complete;

    //     return view('admin.order.order_list', compact('ordersPackage', 'complete'));
    // }

    // public function order_show(Request $request)
    // {
    //     $order=Order::find($request->id);

    //     return view('admin.order.order_show',compact('order'));
    // }

    public function order_show($id)
    {
        $order = Order::find($id);
        $order_packages = OrderPackage::with(['services', 'packages'])->where('order_id', $id)->get();
        //echo "<pre>";print_r($order_packages);echo "</pre>";exit;

        return view('frontend.layouts.order_details', compact(['order', 'order_packages']));
    }
    public function order_show_admin($id)
    {
        $order = Order::find($id);
        $order_packages = OrderPackage::with(['services', 'packages'])->where('order_id', $id)->get();
        // $order_package = OrderPackage::whereIn('id', $order->pluck('id'))->get();
        $service = Service::whereIn('id', $order_packages->pluck('service_id'))->first();
        $package = Package::whereIn('id', $order_packages->pluck('package_id'))->first();
        //echo "<pre>";print_r($order_packages);echo "</pre>";exit;
        // return $service->service_name;
        // return $order_packages->main_price;
        // return $package->package_price;
        // dd($order);
        // dd($order_packages);

        return view('admin.order.order_details', compact(['order', 'order_packages', 'service', 'package']));
    }

    public function show(string $id)
    {
        $package = Package::with(['order_packages' => function ($query) {
            $query->first();
        }])->where('id', $id)->first();
        return view('frontend.layouts.package_show', compact(['package']));
    }

    public function order_list_order_packages()
    {
        // $orders = Order::with(['order_packages', 'services', 'packages'])->where('user_id', Auth::user()->id)->get();
        $orders = Order::where('user_id', Auth::user()->id)->get();
        return view('frontend.layouts.customer_order_list', compact('orders'));
    }
    public function order_list_order_packages_api()
    {
        // $orders = Order::with(['order_packages', 'services', 'packages'])->where('user_id', Auth::user()->id)->get();
        $orders = Order::where('user_id', Auth::user()->id)->get();
        return json_encode($orders);
        // return view('frontend.layouts.customer_order_list', compact('orders'));
    }


    public function download($id)
    {
        $req_file = Order::where('id', $id)->first();


        $path = public_path('files/order/' . $req_file->requirement_file);

        if (!file_exists($path)) {
            return redirect()->back()->with('error', 'File does not exist!');
        }
        return response()->download($path);
    }



    public function fetchPackage(Request $request)
    {
        $data['packages'] = Package::where('service_id', $request->service_id)->get('package_name', 'id');
        return response()->json($data);
    }

    public function create_order()
    {
        $services = Service::all();
        $packages = Package::all();
        $users = User::all();
        $cart_item = Cart::getContent();
        // $services=Service::get('service_name','id');
        // $packages=Package::where('service_id',$request->service_id)->get('package_name','id');
        return view('frontend.layouts.order', compact('users', 'services', 'packages', 'cart_item'));
    }

    public function order_store(Request $request)
    {

        $request->validate([
            'customer_name' => 'required',
            'customer_email' => 'required',
            'customer_phone' => 'required',
            'total_price' => 'required',
        ]);

        $req_img = '';
        if ($image = $request->file('requirement_image')) {
            $req_img = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move('images/order', $req_img);
        }
        $req_file = '';
        if ($file = $request->file('requirement_file')) {
            $req_file = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('files/order', $req_file);
        }

        $currentTime = Carbon::now();
        $data = array(
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
            'start_at' => $currentTime,
            'total_price' => $request->total_price,

            'coupon_code' => $request->coupon_code,
            'coupon_type' => $request->coupon_type,
            'coupon_value' => $request->coupon_value,
            'coupon_discount' => $request->coupon_discount,
            'requirement_image' => $req_img,
            'requirement_file' => $req_file,
            'requirement_desc' => $request->requirement_desc,
            'user_id' => Auth::user()->id
        );
        // print_r($data);exit;
        // return $data;
        $order = Order::create($data);
        $order_id = $order->id;
        $cart_item = Cart::getContent();
        foreach ($cart_item as $item) {
            $orderdata = array(
                'order_id' => $order_id,
                'service_id' => $item->service_id,
                'package_id' => $item->id,
                'package_price' => $item->price,
                'main_price' => $item->main_price,
                'package_quantity' => $item->quantity,
                'status' => 0,
            );


            $order_package = OrderPackage::create($orderdata);
        }


        //return $request->all();
        Cart::clear();
        //OrderMail::__construct($order);
        Mail::to('infodesignwaver@gmail.com')->send(new OrderMail($order));
        Mail::to($request->customer_email)->send(new CustomerOrderMail($order));
        return redirect()->route('customer_order_list')->with('success', 'Order Created Successfully');
    }

    public function order_edit($id)
    {
        $order = Order::find($id);
        //echo "<pre>";print_r($order);echo "</pre>";exit;
        $order_packages = OrderPackage::with(['services', 'packages'])->where('order_id', $order->id);
        // $services=Service::with(['packages'])->where('service_id',$order_packages->service_id)->get();
        // echo "<pre>";print_r($order_packages);echo "</pre>";exit;
        // $services=Service::get('service_name','id');
        // $packages=Package::where('service_id',$request->service_id)->get('package_name','id');

        return view('admin.order.update_order', compact('order', 'order_packages'));
    }

    public function order_update(Request $request, $id)
    {
        $order = Order::find($id);




        $data = array(
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
            'total_price' => $request->total_price,
            'work_status' => $request->work_status,
            'user_id' => Auth::user()->id
        );
        // print_r($data);exit;


        $order->update($data);
        return redirect()->route('admin.order_list')->with('success', 'Order Updated Successfully');
    }

    public function invoicePdf($order_id)
    {
        $order = Order::find($order_id);
        $order_packages = OrderPackage::with(['services', 'packages'])->where('order_id', $order->id)->get();
        // echo "<pre>";print_r($order_packages);echo "</pre>";exit;


        // view()->share(['services' => $services, 'packages' => $packages, 'users' => $users, 'cart_item' => $cart_item]);
        $pdf = Pdf::loadView('frontend.layouts.pdf_view', compact('order', 'order_packages'));
        return $pdf->download('invoice.pdf');
    }
    public function order_delete($id)
    {
        $order = Order::find($id);
        $deleteOldImage = "images/order/{$order->requirement_image}";
        $deleteOldFile = "files/order/{$order->requirement_file}";
        if (file_exists($deleteOldImage)) {
            File::delete($deleteOldImage);
        }
        if (file_exists($deleteOldFile)) {
            File::delete($deleteOldFile);
        }
        $order->delete();
        return redirect()->route('admin.order_list')->with('success', 'Order Deleted Successfully');
    }
}
