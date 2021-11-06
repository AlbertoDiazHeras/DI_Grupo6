<?php

namespace almagest;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    protected $table = 'transports';

    protected $primaryKey='id';

    public $timestamps=true;

    protected $fillable =[
        'min','max','price'
    ];
}
