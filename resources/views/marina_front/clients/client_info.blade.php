@extends('layouts.appCustom')
@if($client->invoices -> count() > 0)
@foreach($client->invoices as $invoice)

@include('marina_front.modals.client_log_modal')


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
                <div class="card mt-4">
                    <h6 style="padding-left:15px;padding-top:15px;" class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2"><span class="fa fa-info-circle"></span> client</i>boats</h6>
                        @if($client-> boats ->count() >0)   
                        <div style="overflow-x:auto;padding-left:15px; padding-right:15px;">

                    <table style="  width:20px;" id="dtHorizontalExample" class="table table-striped table-bordered table-sm" cellspacing="0"
                    width="100%">
                                        <thead>
                            <tr align="center" >
                                <th>Name</th>
                            <th>Length</th>
                            <th>Image</th>
                            <th>Color</th>
                            <th>Client</th>
                            <th>Package</th>
                            
                        </tr>
                        </thead>
                        <tbody>

                    @foreach($client->boats as $boat)
                    <tr align="center" >
                        <td><a href="#">{{$boat->name}}</a></td>
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
                            <td> {{$boat->client->name}}</td>
                            @if($boat->package != null)
                            <td>{{$boat->package->name}}</td>
                            @else
                            <td>Package Deleted</td>
                            @endif
                              </tr>
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
                <div class="row gutters-sm">
                    <div class="col-md-12">
                        <div class="card h-100">
                            <div class="card-body">
                                <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2"><span class="fa fa-money"></span> client</i>Invoices</h6>
                                 @if($client->invoices-> count() > 0)     
                            <div style="overflow-x:auto;overflow-y:auto;">
                          

                            <table style="width:850px;" id="dtHorizontalExample" class="table table-striped table-bordered table-sm" cellspacing="0"
                                    width="100%">
                                <thead>
                                    <tr align="center" >
                                         <th>ID</th>
                                        <th>Issue Date</th>
                                        <th>Invoice Status</th>

                                        <th>Boat Name</th>
                                        <th>Owner</th>
                                        <th>Package</th>
                                        <th>Rate</th>
                                        <th>Total</th>
                                        <th>Paid Amount</th>
                             
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($client->invoices as $invoice)
                                            <tr align="center" >
                                           
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
                
                                                <td><b>{{$invoice->total}} EGP</b> </td>
                                                <td><b>{{$invoice->paid_amount}} EGP</b> </td>
                                             
                                      
                                               
                                                 </tr>
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
</div>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript">


</script>

@endsection
