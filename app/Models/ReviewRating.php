<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewRating extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'contact',
        'rating',
        'patient_ip_address',
    ];
}
