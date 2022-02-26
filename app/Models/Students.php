<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $table = 'student';  //save student table name information
   
    public $timestamps = true;

    protected $fillable = ['name_student', 'gender', 'address', 'id_lessons'];
}
