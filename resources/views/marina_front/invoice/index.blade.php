@extends('layouts.app')

@foreach($invoices as $invoice) 

@include('marina_front.modals.client_log_modal')


@endforeach
@section('content')

<div class="container justify-content-center"  >
    <div class="main-body" >

        <div class="row justify-content-left">
            <div class="col-lg-6">

            <h1>Invoices Operations</h1>
        </div>
       
        <div class="col-lg-6 " align="center" >
            @if(Session::has('successDeleteMsg'))               
               
            <div class="alert alert-warning alerty text-left" role="alert" data-auto-dismiss="500">
                <strong> <i class="fa fa-exclamation-triangle"></i></strong> {!!Session::get('successDeleteMsg')!!}
              </div>
                         
            @endif
        </div>
    </div>
        <hr>
       <br>
        <div  style=" overflow-x:auto; width:110%; margin-right:100px"  class="row justify-content-left">
            <div class="col-xl-12" >
                <table  id="invoices_table"  style=" width:110%;" class="cell-border"   style="">
                    <thead>
                    <tr align="center" >
                       
                        <th>Invoice #</th>
                        <th>Issue Date</th>
                        <th>Boat Name</th>
                        <th>Owner</th>
                        <th>Package</th>
                        <th>Rate</th>
                        <th>Tax</th>
                        <th>Total</th>
                        <th>Paid Amount</th>
                        <th>Remain</th>
                        <th>Invoice Status</th>
                        <th>Actions</th>
                      
                      
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($invoices as $invoice)

                            <tr align="center" >
                                <td><b>{{$invoice->id}} </b> </td>

                                <td><a href="#" data-toggle="modal" data-target="#paymentHistory{{$invoice->id}}">{{\Carbon\Carbon::parse($invoice->created_at )->format('d/m/Y')}}</a></td>
                                @if($invoice->boat->name != null)
                                <td>{{$invoice->boat->name}}</td>
                                @else
                                <td>Boat Deleted</td>
                                @endif


                                @if($invoice->boat->client->name != null)
                                <td>{{$invoice->boat->client->name}}</td>
                                @else
                                <td>Client Deleted</td>
                                @endif

                                @if($invoice->boat->package->name != null)
                                <td>{{$invoice->boat->package->name}}</td>
                                @else
                                <td>Client Deleted</td>
                                @endif

                                @if($invoice->rate != null)
                                <td><b>{{$invoice->rate}} EGP</b> </td>
                                @else
                                <td>Package Deleted</td>
                                @endif
@php
 $remain=   $invoice->total -$invoice->paid_amount;
@endphp

                                <td><b>{{$invoice->tax}} %</b> </td>
                                <td><b>{{$invoice->total}} EGP</b> </td>
                                <td><b>{{$invoice->paid_amount}} EGP</b> </td>
                                <td><b>{{$remain}} EGP</b> </td>


                                @if($invoice->is_paid == 0 ) 
                                  <td align="center" style="background:#ff8b8e	;">Not Paid</td>
                                   @else
                                   <td style="background:#a1e2c2	;">Paid</td>

                                @endif
                      
                                <td>
                                <!--    <a  class="btn btn-warning" href="{{url('edit/invoice').'/'.$invoice->id}}"><i class="fa fa-edit"></i></a>
                                    <a  class="btn btn-warning" href="{{url('edit/invoice').'/'.$invoice->id}}"><i class="fa fa-edit"></i></a>
                                 -->   
                                    <a href="{{url('/print/invoice').'/'.$invoice->id}}" title="More.."  class="btn btn-default "><i class="fa fa-print"></i></a> </td>
                                 </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Button trigger modal -->

           

@endsection

