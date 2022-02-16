<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salami extends Model
{
    use HasFactory;

    protected $fillable=[
        'Name',
        'Price',
        'Production time',

    ];
}
