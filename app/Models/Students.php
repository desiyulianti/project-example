<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $table = 'student'; //$table menyimpan informasi nama tabel customers
    //save customer table name information
    public $timestamps = true;

    protected $fillable = ['name_student', 'gender', 'address', 'id_lessons'];
}