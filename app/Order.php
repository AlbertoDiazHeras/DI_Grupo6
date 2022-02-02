<?php

namespace almagest;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $primaryKey='id';

    public $timestamps=true;

    protected $fillable =[
        'num','issue_date','origin_company_id','target_company_id','deleted'
    ];

    public function OrigenCompania(){
        return $this->belongsTo(Company::class,'origin_company_id');
    }
    public function DestinoCompania(){
        return $this->belongsTo(Company::class,'target_company_id');
    }
}