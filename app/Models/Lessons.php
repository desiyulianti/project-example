<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lessons extends Model
{
    protected $table = 'lessons';
    public $timestamps = true;

    protected $fillable = ['type_of_lessons'];
}
