<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RemainingDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'phone_number',
        'professional_license_number',
        'state_of_licensure',
        'areas_of_expertise',
        'bio',
        'profile_picture',
        'work_address',
        'address_line1',
        'address_line2',
         'country',
         'state',
          'city',
          'postal_code'
    ];
}
