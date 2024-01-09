<?php

namespace App\Http\Controllers;

use App\Models\hopital;
use App\Models\patient;
use App\Models\service;
use App\Models\contact;
use App\Models\medecin;
use Carbon\Carbon;
use App\Models\ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;


class VilleController extends Controller
{
    public function ville(Request $request){
        $regionid=$request->regionId;
        
        $villes=DB::table('ville')->where('region',$regionid)->get();

        return response()->json($villes);
    }

    public function hopital(Request $request)
    {
        $villeid = $request->input('villeid');
        
        // Retrieve the hospitals based on the selected city ID
        $hospitals = hopital::where('ville_id', $villeid)->get();
    
        return response()->json($hospitals);
    }

    public function service(Request $request)
    {
        $serviceid = $request->input('serviceid');
        
        // Retrieve the hospitals based on the selected city ID
        $services = service::where('hopital_id', $serviceid)->get();
    
        return response()->json($services);
    }

    public function patientCount(Request $request)
    {
        $serviceId = $request->input('serviceId');
        $hopitalId = $request->input('hopitalId');
        
        // Retrieve the hospitals based on the selected city ID
        $patients = patient::where('service_id', $serviceId)->where('hopital_id',$hopitalId)->count();
    
        return response()->json($patients);
    }

    public function updateStatus(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);
        
        // Update the status
        $contact->status = 1;
        $contact->save();
        
        return response()->json(['message' => 'Status updated successfully']);
    }
    public function show($id)
    {
        $patient = Patient::find($id);

        if (!$patient) {
            return response()->json(['error' => 'Patient not found'], 404);
        }
        $patientInfo = DB::table('services')
        ->join('patients', 'services.id', '=', 'patients.service_id')
        ->select('services.nom', 'patients.service_id', 'patients.id')
        ->where('patients.id', '=', $id)
        
        ->first();
        $villeInfo =DB::table('ville')
        ->join('patients','ville.id','=','patients.ville')
        ->select('ville.ville')
        ->where('patients.id',$id)
        ->first();

          $createdDate = Carbon::parse($patient->created_at)->format('Y/m/d');
        return response()->json([
            'id'=>$patient->id,
            'nom' => $patient->nom,
            'prenom'=>$patient->prenom,
            'dateN'=>$patient->dateN,
            'ville'=>$villeInfo->ville,
            'service_nom'=>$patientInfo->nom,
            'created_at'=>$createdDate,


        ]);
    }
    public function showDoctor(string $id)
    {
        $doctor=DB::table('medecins')->where('id',$id)->first();
        if (!$doctor) {
            return response()->json(['error' => 'doctor not found'], 404);
        }
        $service=DB::table('services')
        ->join('medecins','services.id','=','medecins.service_id')
        ->select('services.nom')
        ->where('medecins.id',$id)
        ;

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
    public function showService(string $id)
    {
        $service=DB::table('services')->where('id',$id)->first();
        
        if (!$service) {
            return response()->json(['error' => 'service not found'], 404);
        }

        return response()->json([
           'id'=>$service->id,
           'nom'=>$service->nom,
           'description'=>$service->description,
           
        ]);
    }

    public function generatePDF(Request $request)
{
    // Retrieve the form data
    $formData = $request->all();

    // Generate the PDF content using the PDF library
    $pdf = PDF::loadView('pdf', compact('formData'));

    // Generate a unique filename for the PDF
    $filename = $request->nom . $request->prenom . '.pdf';

    // Save the PDF to a temporary location
    $tempPath = sys_get_temp_dir() . '/' . $filename;
    $pdf->save($tempPath);

    // Get the stream URL
    $streamUrl = asset($tempPath);

    // Return the stream URL in the JSON response
    return response()->json(['stream' => $streamUrl]);
}
public function medecinPDF($id){
    $medecin = medecin::findOrFail($id);

    $pdf=PDF::loadView('pdff',compact('medecin'));

    return $pdf->stream('file.pdf');
}

}
