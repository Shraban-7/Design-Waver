<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Models\User;

class CouponController extends Controller
{
    public function coupon_list()
    {
        $coupons = Coupon::all();
        return view('admin.coupon.coupons', compact('coupons'));
    }

    public function coupon_create()
    {
        $users=User::all();
        return view('admin.coupon.coupon_add',compact('users'));
    }

    public function coupon_store(Request $request)
    {
        $request->validate([
            'coupon_code' => 'required|unique:coupons',
            'coupon_type' => 'required',
            'coupon_value' => 'required',
            'coupon_start_date' => 'required',
            'coupon_end_date' => 'required',
        ]);

        $coupon = new Coupon();
        $coupon->user_id=$request->user_id;
        $coupon->coupon_code = $request->coupon_code;
        $coupon->coupon_type = $request->coupon_type;
        $coupon->coupon_value = $request->coupon_value;
      

        $coupon->coupon_start_date = $request->coupon_start_date;
        $coupon->coupon_end_date = $request->coupon_end_date;
        $coupon->save();

        return redirect()->route('admin.coupon_list')->with('success', 'Coupon created successfully');
    }

    public function coupon_edit($id)
    {
        $coupon = Coupon::find($id);
        $users=User::all();
        return view('admin.coupon.coupon_edit', compact('coupon','users'));
    }

    public function coupon_update(Request $request, $id)
    {
        $request->validate([
            'coupon_code' => 'required|unique:coupons,coupon_code,' . $id,
            'coupon_type' => 'required',
            'coupon_value' => 'required',

            'coupon_start_date' => 'required',
            'coupon_end_date' => 'required',
        ]);

        $coupon = Coupon::find($id);
        $coupon->user_id=$request->user_id;
        $coupon->coupon_code = $request->coupon_code;
        $coupon->coupon_type = $request->coupon_type;
        $coupon->coupon_value = $request->coupon_value;

        $coupon->coupon_start_date = $request->coupon_start_date;
        $coupon->coupon_end_date = $request->coupon_end_date;
        $coupon->update();

        return redirect()->route('admin.coupon_list')->with('success', 'Coupon updated successfully');
    }

    public function coupon_update_by_user(Request $request, $id)
    {

        $coupon = Coupon::find($id);
        $coupon->coupon_used=$request->coupon_used;
        $coupon->update();

        return redirect()->back();
    }

    public function coupon_destroy($id)
    {
        $coupon = Coupon::find($id);
        $coupon->delete();

        return redirect()->route('admin.coupon_list')->with('success', 'Coupon deleted successfully');
    }

    public function checkCoupon(Request $request)
    {
        $coupon = Coupon::where('coupon_code', $request->coupon_code)->first();
        if (!$coupon) {
            return response()->json(['error' => 'Invalid coupon code.']);
        }
        else{
            if($coupon->coupon_used>=$coupon->max_used){
                return response()->json(['error' => 'Maximum use done.']);
            }
            else if($coupon->coupon_start_date>date('Y-m-d')){
                return response()->json(['error' => 'Coupon code is not started yet.']);
            }
            else if($coupon->coupon_end_date<date('Y-m-d')){
                return response()->json(['error' => 'Coupon code is expired.']);
            }
            else{
                return response()->json($coupon);
            }
        }

    }


}
