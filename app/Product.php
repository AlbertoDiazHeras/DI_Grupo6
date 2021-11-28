<?php

namespace almagest;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $primaryKey='id';

    public $timestamps=true;

    protected $fillable =[
        'article_id','company_id','price','stock','color_name','weight','size','family_id','deleted'
    ];
}