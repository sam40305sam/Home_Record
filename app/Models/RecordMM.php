<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordMM extends Model
{
    use HasFactory;

    protected $table = 'recordsmm';

    protected $fillable = [
        'temperature',
        'humidity',
        'numbers',
        'time',
    ];
}
