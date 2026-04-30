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

    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
    */

    public function getMobileFormattedAttribute()
    {
        return $this->formatPhone($this->mobile);
    }

    public function getEmergencyPhone1FormattedAttribute()
    {
        return $this->formatPhone($this->emergency_phone_1);
    }

    public function getEmergencyPhone2FormattedAttribute()
    {
        return $this->formatPhone($this->emergency_phone_2);
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    public function formatPhone($phone)
    {
        if (!$phone) return null;

        return preg_replace(
            '/(\+\d{3})(\d{4})(\d{4})/',
            '$1 $2-$3',
            $phone
        );
    }
}
