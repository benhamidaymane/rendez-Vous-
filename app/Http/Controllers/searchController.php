<?php

namespace App\Http\Controllers;

use App\Models\patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class searchController extends Controller
{
    

    public function search(Request $request)

{
    $id = $request->input('search');
    $patients=DB::table('patients')
    ->where('patients.hopital_id',auth()->user()->id)
    ->where('patients.id',$id)
    ->first();
    $countmedecins = DB::table('medecins')->where('hopital_id',auth()->user()->id)->count();
        $counthospital=DB::table('hopitals')->count();
        $countservice=DB::table('services')->where('hopital_id',auth()->user()->id)->count();
        $countpatient=DB::table('patients')->where('hopital_id',auth()->user()->id)->count();
    $validator = Validator::make($request->all(), [
        'search' => 'required',
    ]);

    if ($validator->fails()) {
        // Validation failed, redirect back with error messages
        return redirect()->back()->withErrors($validator)->withInput();
    }
    return view('admin.search',compact('patients','countmedecins','counthospital','countpatient','countservice'));
}
}
