<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeTable extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'start_time',
        'end_time',
        'module_filier_id',
        'day',
    ];
}
