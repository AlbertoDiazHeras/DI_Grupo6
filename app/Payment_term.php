<?php

namespace almagest;

use Illuminate\Database\Eloquent\Model;

class Payment_term extends Model
{
    protected $table = 'payment_terms';

    protected $primaryKey='id';

    public $timestamps=true;

    protected $fillable =[
        'description'
    ];
}
