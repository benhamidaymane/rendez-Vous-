<?php

namespace App\Http\Controllers;

use App\Models\hopital;
use App\Models\patient;
use App\Models\region;
use App\Models\service;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\File;
class AControler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctores=DB::table('medecins')->orderByDesc('created_at')->limit(4)->get();
        $services=DB::table('services')->orderByDesc('created_at')->limit(6)->get();
        $countmedecins=DB::table('medecins')->count();
        $counthospital=DB::table('hopitals')->count();
        $countservice=DB::table('services')->count();
        $countpatient=DB::table('patients')->count();
        return view('indexC',compact('doctores','countmedecins','counthospital','services','countservice'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctors=DB::table('medecins')->select('id','nom','prenom')->get();
        $hopitals=DB::table('hopitals')->select('id','nom')->get();
        $services=DB::table('services')->select('id','nom')->get();

        $regions=DB::table('region')->get();
        $villes=DB::table('ville')->get();
        
        $disabledDays = [];
        $date = Carbon::now();

        for ($i = 0; $i < 365; $i++) {
        if ($date->isSaturday() || $date->isSunday() || $i === 364) {
            $disabledDays[] = $date->format('Y-m-d');
        }
  
        $date->addDay();
    }

        return view('create',compact('doctors','hopitals','services','disabledDays','villes','regions'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{

    set_time_limit(120);

    
    $data=$request-> validate([
        'nom' => 'required',
        'prenom' => 'required',
        'email' => 'required',
        'ville' => 'required',
        'adress' => 'required',
        'telephone' => 'required',
        'hopital_id' => 'required',
        'service_id' => 'required',
        'date' => 'required',
        'dateN' => 'required',
        'sexe' => 'required',
        'message'=>'required',
    ]);
    
    
    
     $patient=patient::create($data);
    $idservice = $request->service_id;
    $idhopital = $request->hopital_id;
    $id=$patient->id;

    $service = service::find($idservice);
    $serviceNom = $service->nom;
    $hopital= hopital::find($idhopital);
    $hopitalnom=$hopital->nom;
    $hopitaladress=$hopital->adress;
    

    $pdf=PDF::loadView('pdf',compact('serviceNom','data','hopitalnom','hopitaladress','id'));

    return $pdf->stream($request->nom.$request->prenom.'.pdf');
    

}



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //$user =DB::table('users')->select('name','email','password')->where('id',$id)->first();
      //  return view('admin.showprofil',compact('user'));
      $patients=DB::table('patients')->select('id','nom','prenom','adress','telephone','email','date','dateN','sexe','message')->where('id',$id)->first();
        return view('admin.search',compact('patients'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $user=DB::table('users')->where('id',$id)->first();
       return view('admin.editprofil',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */


    public function update(Request $request, string $id)
    {
        $user = Auth::user(); // Assuming you're using Laravel's built-in authentication
    

    // Validate the form data

    
    $request->validate([
        'nom' => 'required',
        'email' => 'required|email',
        'current_password' => 'required',
        'password' => 'nullable|min:8|confirmed',
    ]);

    // Check if the current password matches the user's actual password
    if (!Hash::check($request->current_password, $user->password)) {
        return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect.']);
    }

    // If the current password is correct, update the user's profile
    $name = $request->nom;
    $email = $request->email;
    $password = bcrypt($request->input('password'));

    DB::update('update users set nom=?, email=?, password=? where id=?', [$name, $email, $password, $id]);

    Session::flash('success_admin_update', 'Profile updated successfully!');
    return redirect('/admin');

    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
