<?php

namespace almagest;

use Illuminate\Database\Eloquent\Model;

class Delivery_notes extends Model
{
    protected $table = 'delivery_notes';

    protected $primaryKey='id';

    public $timestamps=true;

    protected $fillable =[
        'num','issue_date','order_id','deleted'
    ];

    public function pedidos(){
        return $this->belongsTo('almagest\Order','order_id');
    }
}