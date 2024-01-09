<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\hopital;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class controllerHopital extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hopitals=DB::select('select * from hopitals');
        $countmedecins=DB::table('medecins')->count();
        $counthospital=DB::table('hopitals')->count();
        $countservice=DB::table('services')->count();
        $countpatient=DB::table('patients')->count();
       return   view('admin.hopital',compact('hopitals','countmedecins','counthospital','countpatient','countservice'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $regions=DB::table('region')->get();
        $villes=DB::table('ville')->get();
        return view('admin.create_hopital',compact('regions','villes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'nom'=>'required',
            'adress'=>'required',
            'ville'=>'required',
            'email'=>'required',
            'phone'=>'required',
        ]);
       
        hopital::create($data);

        return redirect('/hopital');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $hopital=DB::table('hopitals')->where('id',$id)->first();
        return view('admin.edit_hopital',compact('hopital'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $nom=$request->nom;
        $adress=$request->adress;
        $email=$request->email;
        $phone=$request->phone;
        

        DB::update('update hopitals set nom=?,adress=?,email=?,phone=? where id=?',[$nom,$adress,$email,$phone,$id]);
       


        return redirect('/hopital');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::delete('delete from hopitals where id =?',[$id]);
        Session::flash('success_hopital_delete', 'Vous suppr hopital  Avec Succès!');


        return redirect('/hopital');
    }
}
