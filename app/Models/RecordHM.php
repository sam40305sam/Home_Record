<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordHM extends Model
{
    use HasFactory;

    protected $table = 'records_hm';

    protected $fillable = [
        'avg_tem',
        'avg_hum',
        'numbers',
        'time',
    ];
}
