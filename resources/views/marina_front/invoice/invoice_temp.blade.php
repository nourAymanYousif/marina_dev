@extends('layouts.printLayout')

@section('content')
<div class="container ">
        <div class="row row-printable">
            <!-- Start .row -->
            <div class="col-md-9">
                <!-- col-lg-6 start here -->
                <div class="invoice-logo"><img width="150px;" src="/images/logo.png"  alt="Invoice logo"></div>
            </div>
            <!-- col-lg-6 end here -->
            <div class="col-md-3" >
                <!-- col-lg-6 start here -->
                <div class="invoice-from" >
                    <ul class="list-unstyled text-left">
                        <li><b>Fanar Deluna Resort</b></li>
                        <li>100Km Zaafarana shit</li>
                        <li>0122225465666</li>
                    </ul>
                </div>
            </div>
            </div>

                
                            <!-- col-lg-12 start here -->
                            <div class="row row-printable">
                                <div class="col-md-9">
                                <ul class="list-unstyled mb0">
                                        <li><strong>Invoice</strong> #AAA000{{$invoice->id}}</li>
                                        <li><strong>Invoice Date:</strong>{{\Carbon\Carbon::parse($invoice->created_at )->format(' D: d, M, Y')}}</li>
                                       
                                        <li><strong>Status:</strong> <span class="label label-danger">UNPAID</span></li>
                                    </ul>
                            </div>
                            <div class="col-md-3  text-left" >
                                <ul class="list-unstyled" >
                                    <li><strong>Invoiced To</strong></li>
                                    <li>{{$invoice->client->name}}</li>
                                    <li>{{$invoice->client->mobile}}</li>
                                </ul>
                            </div>
                            </div>
                            <div class="row row-printable">
                                <div class="col-lg-12">
<br>
                                    <h2 align="center"> Invoice</h2>
<br>
<br>
                            </div>
                            </div>

                            <div class="row row-printable">
                                <div class="col-lg-12">

                            <div class="invoice-items">
                                <div class="table-responsive" style="overflow: hidden; outline: none;" tabindex="0">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="per70 text-left">Issue date</th>
                                                <th class="per70 text-center">Boat Length</th>
                                                <th class="per5 text-center">Rate</th>
                                                <th class="per25 text-center">Total Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{\Carbon\Carbon::parse($invoice->issue_date )->format(' d/m/Y')}} </td>
                                                <td class="text-center">{{$invoice->boat->length}}</td>
                                                <td class="text-center">{{$invoice->rate}} EGP Per Meter</td>
                                                <td class="text-center"><b>{{$invoice->total}}EGP </b> </td>
                                            </tr>
                                           
                                          
                                        </tbody>
                                        @php
                                        $subtotal=($invoice->boat->length) * ($invoice->rate);

                                        @endphp
                                        <tfoot>
                                            <tr>
                                                <th colspan="3" class="text-right">Sub Total:</th>
                                                <th class="text-center">{{$subtotal}} EGP</th>
                                            </tr>
                                            <tr>
                                                <th colspan="3" class="text-right">VAT:</th>
                                                <th class="text-center">{{$invoice->tax}} %</th>
                                            </tr>
                                        
                                            <tr>
                                                <th colspan="3" class="text-right">Total Remain:</th>
                                                <th class="text-center">{{$invoice->total - $invoice->paid_amount }} EGP</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            
                 
        </div>
        <!-- col-lg-12 end here -->
    </div>
    </div>
    <script type="text/javascript">
        window.onload = function() { window.print(); }
        
        window.onafterprint = function(event) {

        document.location.href = "/list/invoice"; 
    };


   </script>
    @endsection