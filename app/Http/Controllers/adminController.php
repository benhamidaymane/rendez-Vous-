<?php

namespace App\Http\Controllers;

use App\Models\hopital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\patient;
use Carbon\Carbon;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = DB::table('patients')
        ->select('patients.id', 'patients.created_at', 'patients.nom as patient_nom', 'patients.prenom', 'patients.email', 'patients.adress', 'patients.telephone', 'patients.date', 'patients.dateN', 'hopitals.nom as hopital_nom', 'services.nom as service_nom', 'patients.sexe', 'patients.message')
        ->join('hopitals', 'patients.hopital_id', '=', 'hopitals.id')
        ->join('services', 'patients.service_id', '=', 'services.id')
        ->whereBetween('patients.created_at', [now()->subDay(), now()->addDays(6)])
        ->where('patients.hopital_id',auth()->user()->id)
        ->paginate(10);
        $countmedecins = DB::table('medecins')->where('hopital_id',auth()->user()->id)->count();
        $counthospital=DB::table('hopitals')->count();
        $countservice=DB::table('services')->where('hopital_id',auth()->user()->id)->count();
        $countpatient=DB::table('patients')->where('hopital_id',auth()->user()->id)->count();
        
        return view('admin.index2',compact('patients','countmedecins','counthospital','countpatient','countservice'));
         
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
        //
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $patient = patient::find($id);
        $patients = DB::table('patients')
        ->select('patients.id', 'patients.created_at', 'patients.nom as patient_nom', 'patients.prenom', 'patients.email', 'patients.adress', 'patients.telephone', 'patients.date', 'patients.dateN', 'hopitals.nom as hopital_nom', 'services.nom as service_nom', 'patients.sexe', 'patients.message')
        ->join('hopitals', 'patients.hopital_id', '=', 'hopitals.id')
        ->join('services', 'patients.service_id', '=', 'services.id')
        ->whereBetween('patients.created_at', [now()->subDay(), now()->addDays(6)])
        ->where('patients.hopital_id',auth()->user()->id)
        ->paginate(10);
        $countmedecins=DB::table('medecins')->where('hopital_id',auth()->user()->id)->count();
        $counthospital=DB::table('hopitals')->count();
        $countservice=DB::table('services')->where('hopital_id',auth()->user()->id)->count();
        $countpatient=DB::table('patients')->where('hopital_id',auth()->user()->id)->count();
        
    $countpatient = DB::table('patients')->count();

    if ($patient) {
        return view('admin.index2', compact('patient','patients', 'countmedecins', 'counthospital', 'countservice','countpatient'));
    } else {
        abort(404); // or return a custom error view if desired
    }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $services=DB::select('select * from services');
        
        $villes=DB::select('select * from ville');
        $hopitals=DB::select('select * from hopitals');
        $patient=DB::table('patients')->where('id',$id)->first();
        $disabledDays = [];
        $date = Carbon::now();

        for ($i = 0; $i < 365; $i++) {
        if ($date->isSaturday() || $date->isSunday() || $i === 364) {
            $disabledDays[] = $date->format('Y-m-d');
        }
  
        $date->addDay();
        
        return view('admin.edit_patient',compact('patient','hopitals','services','disabledDays','villes'));
    }
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $nom=$request->nom;
        $prenom=$request->prenom;
        $email=$request->email;
        $telephone=$request->telephone;
        $dateN=$request->dateN;
        $ville=$request->ville;
        $hopital=$request->hopital_id;
        $service=$request->service_id;
        
        

        $validator = Validator::make($request->all(), [

            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required',
            'telephone' => 'required',
            'dateN' => 'required',
            'ville' => 'required',
            'hopital_id' => 'required',

            
            

        ]);
    
        if ($validator->fails()) {
            // Validation failed, redirect back with error messages
            return redirect()->back()->withErrors($validator)->withInput();
        }
        DB::update('update patients set nom=?,prenom=?,email=?,telephone=?,dateN=?,ville=?,hopital_id=?,service_id=? where id=?',[$nom,$prenom,$email,$telephone,$dateN,$ville,$hopital,$service,$id]);
        return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::delete('delete from patients where id=?',[$id]);
        return redirect('/admin');
    }
}
