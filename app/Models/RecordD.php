<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordD extends Model
{
    use HasFactory;

    protected $table = 'recordsd';

    protected $fillable = [
        'temperature',
        'humidity',
        'numbers',
        'time',
    ];
}
