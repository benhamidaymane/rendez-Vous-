<?php

namespace App\Http\Controllers;
use App\Mail\SendPatientPDF;
use Illuminate\Support\Facades\Mail;
use App\Models\patient;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

use Illuminate\Http\Request;

class PDFcontroller extends Controller
{
    public function index()
    {
     $data['email']='benhamidayman@gmail.com';
     $data['title']='from me';
     $data['body']='from me';

     $pdf=PDF::loadView('pdf',$data);

     $data['pdf']=$pdf;
     try {
        Mail::to($data['email'])->send(new SendPatientPDF($data));
        dd('Mail sent successfully.');
    } catch (\Exception $e) {
        dd('Error sending mail: ' . $e->getMessage());
    }

    }
  
}
