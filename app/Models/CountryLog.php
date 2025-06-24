<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'request_timestamp',
        'num_countries_returned',
        'countries_details',
    ];
  
}
