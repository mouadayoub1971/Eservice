<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score_validate extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'module_id',
        'score_ds',
        'score_final',
        'status'
    ];
}
