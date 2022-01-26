<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordW extends Model
{
    use HasFactory;

    protected $table = 'recordsw';

    protected $fillable = [
        'temperature',
        'humidity',
        'numbers',
        'time',
    ];
}
