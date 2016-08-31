<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email', 
        'password',
        'ip',
        'fb_id',
        'occupation',
        'fb_picture'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    /*
    Relations 
    */

    public function proposals()
    {
        return $this->hasMany('\App\Proposal');
    }
    
    public function profile()
    {
        return $this->hasOne('\App\Profile');
    }
    
    public function posts()
    {
        return $this->hasMany('\App\Post');
    }
    
    public function votes()
    {
        return $this->hasMany('\App\Vote');
    }
    
}
