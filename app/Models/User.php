<?php

namespace App\Models;

use App\Models\Role;
use App\Models\InfoUser;
use App\Trait\UserStateManager;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use HasApiTokens, HasFactory, Notifiable, UserStateManager;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'info_user_id',
        'email',
        'email_verified_at',
        'password',
        'blocked_at',
        'soft_deleted',
        'role_id',
        'stripeToken'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function scopeGetLoggedUserInfo($query)
    {
        return (object) $query->where('id', Auth::user()->id);
    }


    public static function getAllAdmin()
    {
        $roles = Role::getAllAdminRoleId()->get('id')->toArray();
        $adminArr = User::with('infoUser', 'role')->whereIn('role_id', $roles)->get();
        return $adminArr;
    }

    public function scopeGetUserWithInfo($query, $id)
    {
        return (object) $query->with('infoUser', 'role')->where('id', $id);
    }


    public function messages()
    {
        return $this->hasMany(Message::class);
    }


    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function infoUser()
    {
        return $this->belongsTo(InfoUser::class);
    }


    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
