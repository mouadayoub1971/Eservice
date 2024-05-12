<?php

namespace App\Models;

use App\Models\Presenters\UserPresenter;
use App\Models\Traits\HasHashedMediaTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory;
    // use HasRoles;
    use Notifiable;
    use HasApiTokens;
    // use SoftDeletes;
    // use HasHashedMediaTrait;
    // use UserPresenter;

    // protected $guarded = [
    //     'id',
    //     'updated_at',
    //     '_token',
    //     '_method',
    //     'password_confirmation',
    // ];

    protected $dates = [
        'deleted_at'
    ];

    protected $fillable = [
        'name',
        'email',
        'password',
        "gender",
        'role_id',
        'departement_id',
        'filier_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
