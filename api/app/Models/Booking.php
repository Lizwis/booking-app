<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;


class Booking extends Model
{
    use HasApiTokens, HasFactory;


    protected $fillable = [
        'booking_date',
        'reason',
        'name',
        'surname'
    ];
}
