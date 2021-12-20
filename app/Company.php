<?php

namespace almagest;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table='companies';

    protected $primaryKey='id';

    public $timestamps=true;

    protected $fillable =[
        'name','address','city','cif','email','phone','del_term_id','transport_id','payment_term_id','bank_entity_id','discount_id'
    ];

    public function users(){
    	return $this->hasMany(User::class);
    }

    public function delivery_terms(){
    	return $this->hasMany(Delivery_term::class);
    }

}
