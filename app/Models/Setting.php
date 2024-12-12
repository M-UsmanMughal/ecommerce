<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table ='settings'; 
    protected $fillable = ['title', 'logo', 'phone', 'email', 'github_link', 'linkedin_link', 'about_photo_1', 'about_photo_2', 'address', 'about_description'];
}
