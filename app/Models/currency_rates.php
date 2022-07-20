<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class currency_rates extends Model
{
    use HasFactory;

    protected $fillable = [
        'code', 'name', 'rate', 'date'
    ];
}
