<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Nikolag\Square\Traits\HasCustomers;
class User extends Authenticatable
{
    use Notifiable;
    use HasCustomers;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Role', 'user_role', 'role_id', 'user_id' );
    }

    public function hasAnyrole($roles)
    {
        if(is_array($roles))
        {
            foreach ($roles as $role) {
                if($this->hasRole($role))
                {
                    return true;
                }
            }
        }else
        {
            if($this->hasRole($roles))
                {
                    return true;
                }
        }
        return false;
    }

    public function hasRole($role)
    {
        if($this->roles()->where('name', $role)->first())
        {
            return true;
        }
        return false;
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }
}
