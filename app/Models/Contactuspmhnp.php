<?php

namespace App\Models;

// use App\Mail\ContactMail;
// use Illuminate\Support\Facades\Mail;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contactuspmhnp extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'dr_rid','email','message'];

}
