<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordY extends Model
{
    use HasFactory;

    protected $table = 'recordsy';

    protected $fillable = [
        'temperature',
        'humidity',
        'numbers',
        'time',
    ];
}
