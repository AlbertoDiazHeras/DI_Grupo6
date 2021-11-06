<?php

namespace almagest;

use Illuminate\Database\Eloquent\Model;

class Bank_entity extends Model
{
    protected $table='bank_entities';

    protected $primaryKey='id';

    public $timestamps=true;
    
    protected $fillable =[
        'name','ccc'
    ];
}
