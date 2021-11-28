<?php

namespace almagest;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    protected $table = 'families';

    protected $primaryKey='id';

    public $timestamps=true;

    protected $fillable =[
        'name','profit_margin','deleted'
    ];
}