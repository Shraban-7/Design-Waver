<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Service;
use App\Mail\ContactMail;
use App\Models\HomeContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact_list(){
        $contacts= Contact::all();
        return view('admin.admin_pages.contact', compact('contacts'));
    }


    public function contact(){
        $services=Service::all();
        $contact_info = HomeContent::where('id',2)->first();
        return view('frontend.layouts.contact', compact('services','contact_info'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',

            'service_name'=>'required',
            'message'=>'required',
            'phone'=>'required',

        ]);

        // return $request->all();

        $contact=Contact::create($request->all());
        Mail::to('infodesignwaver@gmail.com')->send(new ContactMail($contact));
        return redirect()->route('user.contact')->with('success','Message sent successfully');
    }

    public function show(Contact $contact) {
        return view('admin.admin_pages.contact_show_admin',compact('contact'));
    }
    public function update(Request $request,Contact $contact)
    {
        $data = array(
            'is_read'=>$request->is_read
        );

        $contact->update($data);

        return redirect()->route('contact_show',$contact);

    }

    public function contact_delete($id){
        $contact=Contact::find($id);
        $contact->delete();
        return redirect()->route('admin.contact_list')->with('success','Message deleted successfully');
    }
}
