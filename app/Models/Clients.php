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
}
