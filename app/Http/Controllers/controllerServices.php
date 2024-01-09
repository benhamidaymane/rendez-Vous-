<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\service;

class controllerServices extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services=DB::table('services')
        ->join('users','services.hopital_id','=','users.hopital_id')
        ->select('services.id','services.nom as service_nom','services.description as service_description','services.created_at')
        ->where('users.id',auth()->user()->id)
        ->simplePaginate(6);
        $countmedecins=DB::table('medecins')->where('hopital_id',auth()->user()->id)->count();
        $counthospital=DB::table('hopitals')->count();
        $countservice=DB::table('services')->where('hopital_id',auth()->user()->id)->count();
        $countpatient=DB::table('patients')->where('hopital_id',auth()->user()->id)->count();
        return view('admin.services',compact('services','countmedecins','counthospital','countpatient','countservice'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users=auth()->user()->id;
        return view('admin.create_services',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->all();
        $validator = Validator::make($data, [

            'nom' => 'required',
            'description'=>'required',
            'hopital_id'=>'required',
            

        ]);
        if ($request->hasFile('image')) {
            $image = time().'.'.$request->image->extension();
            $request->image->storeAs('images', $image, 'public');
            $data['image']->image = $image;
          }
    
        if ($validator->fails()) {
            // Validation failed, redirect back with error messages
            return redirect()->back()->withErrors($validator)->withInput();
        }
        Session::flash('success_services', 'Vous Ajouter Service  Avec Succès!');
        service::create($data);

        return redirect('/services');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $service = DB::table('medecins')
        ->join('services', 'medecins.service_id', '=', 'services.id')
        ->where('services.id', 1)
        ->select('services.id', 'services.nom', 'services.description')
        ->get();
    
    if ($service->isEmpty()) {
        return response()->json(['error' => 'service non trouvé'], 404);
    }
    
    
    
    return response()->json([
        'id' => $service[0]->id,
        'nom' => $service[0]->nom,
        'description' => $service[0]->description,
        
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $hopitals=DB::table('hopitals')->select('id','nom')->get();
        $service = DB::table('services')->where('id', $id)->first();
        return view('admin.edit_service', compact('service','hopitals'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $nom=$request->nom;
        $description=$request->description;
        
        $image=$request->image;

        $validator = Validator::make($request->all(), [

            'nom' => 'required',
            'description'=>'required',
            
            

        ]);
    
        if ($validator->fails()) {
            // Validation failed, redirect back with error messages
            return redirect()->back()->withErrors($validator)->withInput();
        }
        DB::update('update services set nom=?,description=?,image=? where id=?',[$nom,$description,$image,$id]);
        Session::flash('success_service_update', 'Vous modifiez service  Avec Succès!');
          return redirect('/services');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::findOrFail($id);

        // Perform any necessary checks or validations before deleting the service

        $service->delete();

        return redirect('/services');
    }
}
