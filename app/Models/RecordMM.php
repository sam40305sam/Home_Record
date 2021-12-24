<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordMM extends Model
{
    use HasFactory;

    protected $table = 'records_MM';

    protected $fillable = [
        'avg_tem',
        'avg_hum',
        'numbers',
        'time',
    ];
}
