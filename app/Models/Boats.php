<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Boats extends Model
{
    use HasFactory;

    protected $fillable = ['name','length', 'color', 'images','user_id','package_id','client_id','has_main'];





    public function user(){

            return $this->belongsTo('App\Models\User','user_id');

    }
    public function client(){

        return $this->belongsTo('App\Models\Clients','client_id');

}

    public function package(){

        return $this->belongsTo('App\Models\Packages','package_id');

    }
    public function invoices(){

        return $this->hasMany(Invoices::class,'boat_id');

    }
    public function maintenance(){

        return $this->hasMany(Maintenance::class,'boat_id');

    }
   
}
