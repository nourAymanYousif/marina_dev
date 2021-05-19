@extends('layouts.printLayout')

@section('content')
<div class="container ">
        <div class="row row-printable">
            <!-- Start .row -->
            <div class="col-md-9">
                <!-- col-lg-6 start here -->
                <div class="invoice-logo"><img width="150px;" src="/images/logo.png" alt="Invoice logo"></div>
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
                                        <li><strong>Receipt #:</strong> #AAA000{{$record->id}}</li>
                                        <li><strong>Invoice Date:</strong>{{\Carbon\Carbon::parse($record->created_at )->format(' D: d, M, Y')}}</li>
                                       
                                        <li><strong>Status:</strong> <span class="label label-danger">Paid</span></li>
                                    </ul>
                            </div>
                            <div class="col-md-3  text-left" >
                                <ul class="list-unstyled" >
                                    <li><strong>Invoiced To</strong></li>
                                    <li>{{$record->client->name}}</li>
                                    <li>{{$record->client->mobile}}</li>
                                </ul>
                            </div>
                            </div>
                            <div class="row row-printable">
                                <div class="col-lg-12">
<br>
                                    <h2 align="center"> Cash Receipt  Voucher</h2>
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
                                                <th class="per70 text-left"> OP Date</th>
                                                <th class="per70 text-left"> Invoice Date</th>
                                                <th class="per70 text-left"> Invoice #</th>
                                                <th class="per70 text-center">Boat Name</th>
                                                <th class="per70 text-center">Total Invoice</th>
                                                <th class="per70 text-center">Remain </th>
                                                <th class="per5 text-center">Paid_amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{\Carbon\Carbon::parse($record->created_at )->format(' d/m/Y')}} </td>
                                                <td>{{\Carbon\Carbon::parse($record->invoice->created_at )->format(' d/m/Y')}} </td>
                                                <td>#AAA000{{$record->invoice->id }} </td>
                                                <td class="text-center">{{$record->boat->name}}</td>
                                                <td class="text-center">{{$record->invoice->total}} EGP</td>
                                                <td class="text-center">{{$record->invoice->total - $record->invoice->paid_amount}} EGP</td>
                                                <td class="text-center">{{$record->paid_amount}} EGP</td>
                                            </tr>
                                           
                                          
                                        </tbody>
                                        @php
                                        $subtotal= 0;

                                        @endphp
                                        <tfoot>
                                           
                                          
                                        
                                            <tr>
                                                <th colspan="6" class="text-right">Total Paid:</th>
                                                <th class="text-center">{{$record->paid_amount}} EGP</th>
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