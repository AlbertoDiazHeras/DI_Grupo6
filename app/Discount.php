<?php

namespace almagest;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $table = 'discounts';

    protected $primaryKey='id';

    public $timestamps=true;

    protected $fillable =[
        'name','discount'
    ];
}
