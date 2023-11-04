<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
   
class Plan extends Model
{
    use HasFactory;
    protected $fillable = [
        'plan_id','name','billing_methode','interval_count','amount','currency'
    ];
}
