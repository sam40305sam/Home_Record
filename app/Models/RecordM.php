<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordM extends Model
{
    use HasFactory;

    protected $table = 'records_m';

    protected $fillable = [
        'avg_tem',
        'avg_hum',
        'numbers',
        'time',
    ];
}
