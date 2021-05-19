<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceLogs extends Model
{
    use HasFactory;
    protected $table = 'invoices_log';
    protected $fillable = ['invoice_id','boat_id','client_id','user_id','paid_amount','payment_method'];


    public function client(){

        return $this->belongsTo('App\Models\Clients','client_id');

}
    public function boat(){

        return $this->belongsTo('App\Models\Boats','boat_id');

}
    public function invoice(){

        return $this->belongsTo('App\Models\Invoices','invoice_id');

}

  
    public function user(){

        return $this->belongsTo('App\Models\User','user_id');

}
   


}
