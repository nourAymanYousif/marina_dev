<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $fillable = ['description', 'price', 'end_date', 'boat_id', 'user_id', 'is_paid'];


    public function boat(){

        return $this->belongsTo('App\Models\Boats','boat_id');

    }
    public function user(){

        return $this->belongsTo('App\Models\Boats','user_id');

    }

}
