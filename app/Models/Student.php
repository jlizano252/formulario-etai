<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'ide',
        'name',
        'lastname',
        'email',
        'mobile',
        'career',
        'emergency_name_1',
        'emergency_phone_1',
        'emergency_name_2',
        'emergency_phone_2',
    ];
}
