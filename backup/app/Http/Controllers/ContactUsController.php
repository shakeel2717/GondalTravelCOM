<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Arr;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return(view('admin.create_contactus'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
      // return $request->input();
       $res=new ContactUs;
       $res->address=$request->input('addr');
       $res->phone=$request->input('phone');
       $res->email=$request->input('email');
       $res->message=$request->input('msg');
       $res->save();

       $request->session()->flash('msg','Data created');
       return redirect('/dashboard/admin/contactus');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(ContactUs $contactUs)
    {
        return view('contact')->with('about',ContactUs::all());


    }

    public function adminshow(ContactUs $contactUs)
    {


        return view('admin.contactus')->with('about',ContactUs::all());


    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(ContactUs $contactUs,$id)
    {
        return view('admin\edit_contactus')->with('about', ContactUs::find($id));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactUs $contactUs)
    {
        $res = ContactUs::find($request->id);
        $res->address=$request->input('addr');
        $res->phone=$request->input('phone');
        $res->email=$request->input('email');
        $res->message=$request->input('msg');
        $res->save();

        $request->session()->flash('msg','Data Updated');
        return redirect('/dashboard/admin/contactus');


    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactUs $contactUs)
    {
        //
    }
}
