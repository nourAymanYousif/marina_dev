<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceLogs extends Model
{
    use HasFactory;
    protected $table = 'invoices_log';
    protected $fillable = ['invoice_id','boat_id','client_id','user_id','paid_amount','payment_method'];

}
