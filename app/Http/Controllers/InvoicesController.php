<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Clients;
use App\Models\Boats;
use App\Models\InvoiceLogs;
use App\Models\Invoices;
use App\Models\Packages;

class InvoicesController extends Controller
{
    public function index(){
        $invoices = Invoices::all();
        
      return view('marina_front.invoice.index',compact('invoices'));
  }


  public function getPayHistory($record_id = null){
    if($record_id !=  null){
      $record = InvoiceLogs::find($record_id);
      }
  return view('marina_front.invoice.payment_printTemp',compact('record'));
}

  
  public function print($invoice_id = null){
    if($invoice_id != null){
      $invoice = Invoices::find($invoice_id);
  }
  
  return view('marina_front.invoice.invoice_temp',compact('invoice'));
}

public function getInvoice($invoice_id = null){

  if($invoice_id !=  null){

      return Invoices::find($invoice_id);
  }
  return [];
}
  
}
