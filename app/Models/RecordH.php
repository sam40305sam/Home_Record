<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordH extends Model
{
    use HasFactory;

    protected $table = 'recordsh';

    protected $fillable = [
        'temperature',
        'humidity',
        'numbers',
        'time',
    ];
}
