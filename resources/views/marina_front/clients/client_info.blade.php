@extends('layouts.appCustom')
@if($client->invoices -> count() > 0)
@foreach($client->invoices as $invoice)

@include('marina_front.modals.client_log_modallink')


@endforeach
@endif
@section('content')
<div class="container">
    <div class="main-body">

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{'/home'}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{'/list/clients'}}">Clients</a></li>
                <li class="breadcrumb-item active" aria-current="page">Client Profile</li>
            </ol>
        </nav>
        <!-- /Breadcrumb -->

        <div class="row gutters-md">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h6 align="center" class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2"><span class="fa fa-id-card"></span> client</i>Identity</h6>
                        <div class="d-flex flex-column align-items-center text-center">


                            @if (json_decode($client->national_id_image) != null)    
                                @foreach(json_decode($client->national_id_image) as $client_image)

                                    <img id="myImg{{$client_image}}" width="300" src="{{url('/clients')}}/{{$client_image}}">
                                    <hr>
                                 @endforeach
                            @else
                                  <img style="width: 40px" src="{{url('/images/no-image.png')}}">  No images.
                            @endif


                            <div class="mt-3">
                                <h4> {{$client->name}}</h4>
                                <p class="text-secondary mb-1"> {{$client->job_title}}</p>
                               
                            </div>
                        </div>
                    </div>
                </div>
              
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2"><span class="fa fa-info-circle"></span> client</i>Information</h6>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Full Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$client->name}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$client->email}}
                            </div>
                        </div>
                        <hr>
                     
                     
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Mobile</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$client->mobile}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Nationality</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$client->nationality}}
                            </div>
                        </div>
                        <hr>
                          
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">National ID</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$client->national_id}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Address</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$client->address}}
                            </div>
                        </div>
                    </div>
                </div>
            

                <div class="row ">

                <div class="col-md-12">
                        <div class="card h-100" style="">
                        
                    <h6 style="padding-left:15px;padding-top:15px;" class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2"><span class="fa fa-ship"></span> client</i>boats ({{$client->boats->count()}})</h6>
                        @if($client-> boats ->count() >0)   
                        <div style=" height:150px; overflow-y:auto;padding-left:15px; padding-right:15px;">

                    <table  id="dtHorizontalExample" class="table table-striped table-bordered table-sm" cellspacing="0"
                           width="100%">
                                        <thead>
                            <tr align="center" >
                                <th>#</th>
                                <th>Name</th>
                                <th>Register Date</th>
                            <th>Length</th>
                            <th>Image</th>
                            <th>Color</th>
                            <th>Paid Invoices</th>
                            <th>Package</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                    @php
                    $counter=1;
                    @endphp
                              @foreach($client->boats as $boat)
                              <tr align="center" >
                                  <td>{{$counter }}</td>
                                  <td>{{$boat->name}}</td>
                                  <td>{{\Carbon\Carbon::parse($boat->created_at )->format('d/m/Y')}}</td>
                              <td>{{$boat->length}}</td>

                            <!-- Added Handler for the no image uploaded-->
                               @if (json_decode($boat->images) != null)
                                <td>
                                @foreach(json_decode($boat->images) as $boat_image)

                                    <img id="myImg{{$boat_image}}" style="width: 30px" src="{{url('/boats')}}/{{$boat_image}}">
                                     
                                @endforeach

                            </td>
                            @else

                            <td>
                                  <img style="width: 40px" src="{{url('/images/no-image.png')}}">  No images.
                            </td>
                            @endif
                            <td><input type="color" id="favcolor" name="favcolor" value="{{$boat->color}}" disabled></td>
                            <td> {{$boat->paidInvoices}}</td>
                            @if($boat->package != null)
                            <td>{{$boat->package->name}}</td>
                            @else
                            <td>Package Deleted</td>
                            @endif
                              </tr>
                              @php
                    $counter++;
                    @endphp
                    @endforeach

                     </tbody>
                     </table></div>
                     @else
                      <div style="overflow-x:auto;padding-left:15px;padding-right:15px">

                     <div class="alert alert-warning alert text-left" style=""role="alert" >
                 <strong> <i class="fa fa-exclamation-triangle"></i></strong> There is no Boats for this client
                 </div>
              </div>
            @endif

                
                </div>
                </div>
                </div>
                </div>
                </br>
                <div class="row gutters-lg" >
                    <div class="col-lg-12" >
                        <div class="card h-100" align="center">
                            <div class="card-body" align="center">
                            @php
                    $counter=1;
                    @endphp
                                <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2"><span class="fa fa-money"></span> client</i>Invoices ({{$client->invoices->count()}})</h6>
                                 @if($client->invoices-> count() > 0)     
                            <div style="overflow-x:auto;overflow-y:auto;">
                          

                            <table style="width:1115px;" id="dtHorizontalExample" class="table table-striped table-bordered table-sm" cellspacing="0"
                                    width="100%">
                                <thead>
                                    <tr align="center" >
                                         <th>#</th>
                                         <th>Invoice ID</th>
                                        <th>Issue Date</th>
                                        <th>Invoice Status</th>

                                        <th>Boat Name</th>
                                        <th>Package</th>
                                        <th>Rate</th>
                                        <th>Tax</th>
                                        <th>Total</th>
                                        <th>Paid Amount</th>
                                        <th>Remain</th>

                             
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($client->invoices as $invoice)
                                            <tr align="center" >
                                           
                                                <td><b>{{$counter}} </b> </td>
                                                <td><b>{{$invoice->id}} </b> </td>

                                                <td><a href="#"data-toggle="modal" data-target="#paymentHistory{{$invoice -> id}}">{{\Carbon\Carbon::parse($invoice->created_at )->format('d/m/Y')}}</a></td>
                                                @if($invoice->is_paid == 0 ) 
                                                <td align="center" style="background:#ff8b8e	;">Not Paid</td>
                                                 @else
                                                 <td style="background:#a1e2c2	;">Paid</td>
              
                                              @endif
                                                @if($invoice->boat->name != null)
                                                <td>{{$invoice->boat->name}}</td>
                                                @else
                                                <td>Boat Deleted</td>
                                                @endif
                
                
                                              
                
                                                @if($invoice->boat->package->name != null)
                                                <td>{{$invoice->boat->package->name}}</td>
                                                @else
                                                <td>No PAckage</td>
                                                @endif
                
                                                @if($invoice->rate != null)
                                                <td><b>{{$invoice->rate}} EGP</b> </td>
                                                @else
                                                <td>Package Deleted</td>
                                                @endif
                                                @if($invoice->tax != null)
                                                <td><b>{{$invoice->tax}} %</b> </td>
                                                @else
                                                <td>No tax</td>
                                                @endif
                
                                                <td><b>{{$invoice->total}} EGP</b> </td>
                                                <td><b>{{$invoice->paid_amount}} EGP</b> </td>
                                                @if($invoice->total != null)
                                                <td><b>{{$invoice->total- $invoice->paid_amount}} EGP</b></td>
                                                @else
                                                <td>No Invoice</td>
                                                @endif
                                      
                                               
                                                 </tr>
                                                 @php
                    $counter++;
                    @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                                </div> 
                                @else
                                <div class="alert alert-warning alert text-left" role="alert" >
                                    <strong> <i class="fa fa-exclamation-triangle"></i></strong> There is no invoices for this client
                                  </div>
                                @endif

                           
                        
                             
                            </div>
                        </div>
                    </div>
                   </div>
        
   



            </div>

</div>

</div>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript">


</script>

@endsection
