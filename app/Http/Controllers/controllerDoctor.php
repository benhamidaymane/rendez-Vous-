<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\medecin;
use App\Models\service;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class controllerDoctor extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = DB::select('SELECT m.*, s.nom as nom_service
    FROM medecins m
    INNER JOIN users u ON m.hopital_id = u.hopital_id
    INNER JOIN services s ON m.service_id = s.id
    WHERE u.id = ?
    ORDER BY m.id DESC', [auth()->user()->id]);

$countmedecins=DB::table('medecins')->where('hopital_id',auth()->user()->id)->count();
$counthospital=DB::table('hopitals')->count();
$countservice=DB::table('services')->where('hopital_id',auth()->user()->id)->count();
$countpatient=DB::table('patients')->where('hopital_id',auth()->user()->id)->count();
        return view('admin.doctor',compact('doctors','countmedecins','counthospital','countpatient','countservice'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users=auth()->user()->id;
        $services=DB::table('services')->where('hopital_id',$users)->get();
        
        return view('admin.create_doctor',compact('services','users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
    
        $validator = Validator::make($data, [
            'nom' => 'required',
            'prenom' => 'required',
            'cin' => 'required',
            'specialite' => 'required',
            'telephone' => 'required',
            'email' => 'required',
            'hopital_id' => 'required',
        ]);
    
        if ($validator->fails()) {
            // Validation failed, redirect back with error messages
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Create medecin record
        $medecin = Medecin::create($data);
    
        Session::flash('success_dcotor', 'Vous Ajouter Doctor Avec Succès!');
    
        // Get the authenticated user's ID
        
    
        $userData = [
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'email' => $request->input('email'),
            'password' => bcrypt('admin'),
            'is_admin' => false,
            'hopital_id' => $request->input('hopital_id'),
        ];

    
        // Validate user data
        $userValidator = Validator::make($userData, [
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'is_admin' => 'required|boolean',
            'hopital_id' => 'required',
        ]);

    
        if ($userValidator->fails()) {
            // User data validation failed, redirect back with error messages
            return redirect()->back()->withErrors($userValidator)->withInput();
        }
    
        // Create user record
        $user = User::create($userData);
    
        return redirect('/doctor');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $doctor=DB::table('medecins')->where('id',$id)->first();
        if (!$doctor) {
            return response()->json(['error' => 'doctor not found'], 404);
        }
        $service=DB::table('services')
        ->join('medecins','services.id','=','medecins.service_id')
        ->select('services.nom')
        ->where('medecins.id',$id)
        ->first();

        return response()->json([
           'id'=>$doctor->id,
           'nom'=>$doctor->nom,
           'prenom'=>$doctor->prenom,
           'cin'=>$doctor->cin,
           'telephone'=>$doctor->telephone,
           'services'=>$service,
           'specialite'=>$doctor->specialite,
           
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users=auth()->user()->id;
        $doctor = DB::table('medecins')->where('id', $id)->first();
        $services=DB::table('services')->where('hopital_id',$users)->get();
        return view('admin.edit_doctor', compact('doctor','services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $medecin = medecin::findOrFail($id);
        $medecin->nom = $request->input('nom');
        $medecin->prenom = $request->input('prenom');
        $medecin->cin = $request->input('cin');
        $medecin->specialite = $request->input('specialite');
        $medecin->telephone = $request->input('telephone');

       // Update the image only if a new image is provided
       if ($request->hasFile('image')) {
           $image = time().'.'.$request->image->extension();
           $request->image->storeAs('images', $image, 'public');
           $medecin->image = $image;
         }

         $validator = Validator::make($request->all(), [
            'nom'=>'required',
            'prenom'=>'required',
            'cin'=>'required',
            'specialite'=>'required',
            'telephone'=>'required',
        ]);
    
        if ($validator->fails()) {
            // Validation failed, redirect back with error messages
            return redirect()->back()->withErrors($validator)->withInput();
        }

       $medecin->save();
       Session::flash('success_doctor_update', 'Vous modifiez Doctor  Avec Succès!');
       return redirect('/doctor');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::delete('delete from medecins where id=?',[$id]);
        Session::flash('success_doctor_delete', 'Vous suppr doctor  Avec Succès!');

        return redirect('/doctor');

    }
}
