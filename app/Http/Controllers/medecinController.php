<?php

namespace App\Http\Controllers;

use App\Models\patient;
use Illuminate\Http\Request;

class medecinController extends Controller
{
    public function index()
{
    $events = [];

    $patients = Patient::all();

    foreach ($patients as $patient) {
        $events[] = [
            'id' => $patient->id,
            'title' => $patient->nom . ' ' . $patient->prenom,
            'start' => $patient->dateN,
            'end' => $patient->dateN,
        ];
    }

    return view('medecin.index', compact('events'));
}

    public function show($id){
        $patient=patient::findOrFail($id);
        return view('medecin.show',compact('patient'));
    }


}
