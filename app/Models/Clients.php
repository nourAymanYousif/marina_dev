<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;

    protected $table = 'client';
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'job_title',
        'address',
        'national_id_image',
        'national_id',
        'nationality'
    ];
    

    public function boats(){

        return $this->hasMany(Boats::class,'client_id');
}
   
 
    public function invoices(){

        return $this->hasMany('App\Models\Invoices','user_id');

    }
    public function logRecords(){

        return $this->hasMany(InvoiceLogs::class,'client_id');

    }
}
