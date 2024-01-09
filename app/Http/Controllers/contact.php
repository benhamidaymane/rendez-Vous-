<?php

namespace App\Http\Controllers;

use App\Models\contact as ModelsContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class contact extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts=DB::table('contacts')->whereBetween('created_at', [now()->subDay(), now()->addDay(2)])->paginate(6);
        $countmedecins=DB::table('medecins')->count();
        $counthospital=DB::table('hopitals')->count();
        $countservice=DB::table('services')->count();
        $countpatient=DB::table('patients')->count();
        return view('admin.contact',compact('contacts','countmedecins','counthospital','countpatient','countservice'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->all();
        if (empty($data['name'])) {
            $errors['name'] = 'Please enter your name.';
        }
    
        if (empty($data['email'])) {
            $errors['email'] = 'Please enter your email.';
        }
    
        if (empty($data['subject'])) {
            $errors['subject'] = 'Please enter the subject.';
        }
    
        if (empty($data['message'])) {
            $errors['message'] = 'Please enter your message.';
        }
    
        if (isset($errors)) {
            return redirect('/Appointment#contact')->withErrors($errors)->withInput();
        }

        ModelsContact::create($data);
        Session::flash('success', 'Your message has been submitted successfully!');
        return redirect('/Appointment');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact=DB::table('contacts')->where('id',$id)->first();
        return view('admin.show_contact',compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::delete('delete from contacts where id=?',[$id]);
        return redirect()->back();
    }
}
