<?php

namespace App\Http\Controllers;

use App\Models\Boats;
use App\Models\Clients;
use App\Models\InvoiceLogs;
use App\Models\Invoices;
use App\Models\Packages;
use App\Traits\Uploads;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function showCreateInvoice(){

        $boats = Boats::all();

        return view('marina_front.invoice.create_invoice',compact('boats'));

    }

    public function createInvoice(Request $request){


        $tax = 1 + $request->tax/100;

        $boat = Boats::find($request->boat_id);

        $total = ((int) $boat->length * (int) $boat->package->rate);

        $total = $total * $tax;

        $invoice = Invoices::create([
            'user_id' => Boats::find($request->boat_id)->client->id,
            'boat_id' => $request->boat_id,
            'tax' => $request->tax,
            'issue_date' => \Carbon\Carbon::today(),
            'total' => $total,
            'rate' => $boat->package->rate,

        ]);

        return view('home');



    }

    public function showPayInvoice(){
        $invoices = Invoices::where('is_paid',0)->get();
        return view('marina_front.invoice.pay_invoice',compact('invoices'));
    }

    public function payInvoice(Request $request){
      $invoice = Invoices::find($request->invoice);
      $is_paid = 0;
      InvoiceLogs::create([
      'invoice_id' => $request->invoice,
      'boat_id' =>$invoice->boat_id,
      'user_id' => auth()->user()->id,
      'client_id' =>$invoice->user_id,
      'paid_amount' =>$request->paid_amount,
      'payment_method' => $request->payment_method
      ]);

     
      $paid_amount = $invoice->paid_amount + $request->paid_amount;
      if($paid_amount >= $invoice->total){
          $is_paid = 1;
      }

      


      $invoice->update(['paid_amount'=> $paid_amount,'is_paid'=> $is_paid,'payment_method' => $request->payment_method]);
      $invoice->save();
      return redirect()->back()->with('payAlert','The  <strong>Payment operation </strong> done successfully');

    }

  

}
