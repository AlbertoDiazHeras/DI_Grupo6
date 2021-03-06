<?php

namespace almagest;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    protected $table = 'users';

    protected $primaryKey='id';

    public $timestamps=true;

    use HasApiTokens,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname','secondname','company_id','type','email','email_confirmed','password','actived','iscontact','deleted','code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    public function user(){
    	return $this->belongsTo(Company::class, 'id');
    }

    public function role(){
    	return $this->belongsTo(Role::class, 'id');
    }

    public function Admin(){
        if($this->type=='a'){
            return true;
        }
        return false;
    	
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        //'email_verified_at' => 'datetime',
    ];
}
