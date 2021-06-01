@extends('layouts.app')

@section('content')

    <div class="container justify-content-center" >
        <div class="row justify-content-left">
            <div class="col-lg-5">

            <h1>Maintenance Operations</h1>
        </div>
       
        @if(Session::has('successDeleteMsg'))               
               
        <div class="col-lg-6 " align="center" >
           
            <div class="alert alert-danger alerty text-left" role="alert" data-auto-dismiss="500">
                <strong> <i class="fa fa-exclamation-triangle"></i></strong> {!!Session::get('successDeleteMsg')!!}
              </div>
                         
           
        </div> @endif
        @if(Session::has('mainMsg'))               
               
        <div class="col-lg-6 " align="center" >
           
            <div class="alert alert-danger alerty text-left" role="alert" data-auto-dismiss="500">
                <strong> <i class="fa fa-exclamation-triangle"></i></strong> {!!Session::get('mainMsg')!!}
              </div>
                         
           
        </div> @endif
        @if(Session::has('successupdateMsg'))               
               
        <div class="col-lg-6 " align="center" >
           
            <div class="alert alert-warning alerty text-left" role="alert" data-auto-dismiss="500">
                <strong> <i class="fa fa-exclamation-triangle"></i></strong> {!!Session::get('successupdateMsg')!!}
              </div>
                         
           
        </div> @endif
    </div>
        <hr>
       <br>
        <div  style=" overflow-x:auto;" class="row justify-content-center">
            <div class="col-lg-12">
                <table id="maintenance_table" class="display">
                    <thead>
                        <tr align="center" >
                            <th>#</th>
                            <th>Order Date</th>

                        <th>Description</th>
                        <th>Price</th>
                        <th>Boat Name</th>
                        <th>Boat Owner</th>
                        <th>Completion Date</th>
                      
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter=1;   
                           @endphp
                        @foreach($maintenance as $one_maintenance)
                        <tr align="center" >
                            <td>{{$counter}}</a></td>
                                <td>{{\Carbon\Carbon::parse($one_maintenance->created_at )->format('d/m/Y')}}</td>
                                <td>{{$one_maintenance->description}}</td>
                                <td>{{$one_maintenance->price}}</td>
                                <td>{{$one_maintenance->boat->name}}</td>
                                <td>{{$one_maintenance->boat->client->name}}</td>
                                @if($one_maintenance->end_date != null)
                              
                                <td style="background:#38c172">{{\Carbon\Carbon::parse($one_maintenance->end_date )->format('d/m/Y')}}</td>
                                @else
                                <td style="background:#ffed4a">In Process</td>

                                @endif
                                @php
                                        $flag="";
                                        @endphp
  
                                <td dir="rtl"> 
                                     <div align="center" class="row">
                                     
                                    <div  align="center" class="col-lg-4">
                                        <form action="{{url('delete/maintenance').'/'.$one_maintenance->id}}" method="POST">
                                            @method('POST')
                                            @csrf
                                            <button class="btn btn-danger" type="submit"><i class="fa fa-trash" {{$flag}}></i> </button>               
                                           </form>
                                    </div>
                                    <div align="center"class="col-lg-4">
                                        <a class="btn btn-warning" href="{{url('edit/maintenance').'/'.$one_maintenance->id}}" {{$flag}}><i class="fa fa-edit"></i></a> 
                                        </div>
                                        @if($one_maintenance->is_paid ==0)
                                       
                                        <div  align="center" class="col-lg-3">
                                          <form action="{{url('complete/maintenance').'/'.$one_maintenance->id}}" method="POST">
                                              @method('POST')
                                              @csrf
                                              <button class="btn btn-info" type="submit"><i class="fa fa-wrench"></i> </button>               
                                             </form>
                                      </div>
                                      @else 
                                      @php
                                          $flag="disabled";
                                      @endphp
                                       <div  align="center" class="col-lg-3">
                                       </div>
                                      @endif
                                    </div>
                                </td>
                            </tr>



                           
                         
                            @php
                            $counter++;   
                           @endphp
                        @endforeach
                    </tbody>
                </table>
          
     

            </div>
        </div>

 
       
    </div>


    <script>
        window.setTimeout(function() {
        $(".alerty").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 4000);
        </script>
 




@endsection

