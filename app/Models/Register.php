<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model

{
    use HasFactory;

    protected $table = 'registration'; 
    protected $fillable = ['name', 'phone', 'email', 'password']; 

}
