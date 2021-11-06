<?php

namespace almagest;

use Illuminate\Database\Eloquent\Model;

class Delivery_term extends Model
{
    protected $table = 'delivery_terms';

    protected $primaryKey='id';

    public $timestamps=true;

    protected $fillable =[
        'description'
    ];
    public function companies(){
    	return $this->belongsTo(Company::class, 'del_term_id');
    }

}
