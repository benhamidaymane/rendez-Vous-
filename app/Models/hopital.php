<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hopital extends Model
{
    use HasFactory;
    protected $fillable=['nom','adress','ville','email','phone'];
}
