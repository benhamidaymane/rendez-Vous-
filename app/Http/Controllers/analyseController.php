<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class analyseController extends Controller
{
    public function index(){
        $countmedecins=DB::table('medecins')->where('hopital_id',auth()->user()->id)->count();
        $counthospital=DB::table('hopitals')->count();
        $countservice=DB::table('services')->where('hopital_id',auth()->user()->id)->count();
        $countpatient=DB::table('patients')->where('hopital_id',auth()->user()->id)->count();
        $serviceCount=DB::select('SELECT services.nom, 
        COUNT(*) AS count, 
        (COUNT(*) / (SELECT COUNT(*) FROM patients)) * 100 AS percentage
         FROM patients
        JOIN services ON patients.service_id = services.id
        GROUP BY patients.service_id
        ORDER BY count DESC');
        return view('admin.analyse' ,compact('countmedecins','counthospital','countservice','countpatient','serviceCount'));
    }
}
