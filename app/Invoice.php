<?php

namespace almagest;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoices';

    protected $primaryKey='id';

    public $timestamps=true;

    protected $fillable =[
        'num','issue_date','delivery_note_id','deleted'
    ];
    public function delivery_note_id(){
    	return $this->belongsTo('almagest\Invoice','delivery_note_id');
    }
}