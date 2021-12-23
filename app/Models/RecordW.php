<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordW extends Model
{
    use HasFactory;

    protected $table = 'records_w';

    protected $fillable = [
        'avg_tem',
        'avg_hum',
        'numbers',
        'time',
    ];
}
