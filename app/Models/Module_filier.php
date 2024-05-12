<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module_filier extends Model
{
    use HasFactory;

    protected $fillable = [
        'module_id',
        'filier_id'
    ];
}
