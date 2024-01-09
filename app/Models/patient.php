<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patient extends Model
{
    use HasFactory;
    protected $fillable=['nom','prenom','email','ville','adress','telephone','date','dateN','sexe','message','service_id','hopital_id'];
    
}
