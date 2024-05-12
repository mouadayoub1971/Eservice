<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module_prof extends Model
{
    use HasFactory;

    protected $fillable = [
        'module_id',
        'prof_id'
    ];
}
