<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medecin extends Model
{
    use HasFactory;
    protected $fillable=['nom','prenom','cin','telephone','specialite','service_id','hopital_id','email'];
}
