<?php

namespace almagest;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $primaryKey='id';

    public $timestamps=true;

    protected $fillable =[
        'rol',
    ];
}
