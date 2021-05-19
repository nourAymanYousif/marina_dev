@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-left">
            <div class="col-lg-4">

            <h1>Packeges Operations</h1>
        </div>
       
        @if(Session::has('successDeleteMsg'))               
               
        <div class="col-lg-6 " align="center" >
           
            <div class="alert alert-danger alerty text-left" role="alert" data-auto-dismiss="500">
                <strong> <i class="fa fa-exclamation-triangle"></i></strong> {!!Session::get('successDeleteMsg')!!}
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
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <table id="packages_table" class="display">
                    <thead>
                        <tr align="center" >
                            <th>#</th>
                            <th>Name</th>
                        <th>Description</th>
                        <th>Rate</th>
                        <th>Boats on Package</th>
                      
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter=1;   
                           @endphp
                        @foreach($packages as $package)
                        <tr align="center" >
                            <td>{{$counter}}</a></td>
                            <td><a href="#">{{$package->name}}</a></td>
                                <td>{{$package->description}}</td>
                                <td>{{$package->rate}}</td>
                                <td>   
                                    
                                  @if ($package->boatsOnPackage >0)
                                  <a  href="#" id="boats{{$package-> id}}" title="{{$package->id}}"  data-toggle="modal" > {{$package->boatsOnPackage}} </a>
    
                                    @else
                                    {{$package->boatsOnPackage}} 
                                    @endif
                     

                                


                                </td>
  
                                <td dir="rtl"> 
                                     <div align="center" class="row">
                                    <div align="center"class="col-lg-3">
                                    <a class="btn btn-warning" href="{{url('edit/package').'/'.$package->id}}"><i class="fa fa-edit"></i></a> 
                                    </div>
                                    <div  align="center" class="col-lg-3">
                                        <form action="{{url('delete/package').'/'.$package->id}}" method="POST">
                                            @method('POST')
                                            @csrf
                                            <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> </button>               
                                           </form>
                                    </div>
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

 
        @foreach($packages as $package)

        @if ($package->boatsOnPackage >0)

        <div id="boatModal{{$package->id}}" class="modal">
           <span id="cls{{$package->id}}" class="close">&times;</span>
           
           <div class="modal-content" id="content{{$package->id}}"  role="dialog">
            <br>
       <h3 align="center">Boats on {{$package->name}} Package</h3>
            
               <table class="table table-striped table" style="padding:20px;">
                   <thead>
                       <tr align="center" >
                           <th>Name</th>
                       <th>Length</th>
                       <th>Image</th>
                       <th>Color</th>
                       <th>Owner</th>
                      
                   </tr>
                   </thead>
                   <tbody>
                      
                       @foreach($package->boats as $boat)
       
                       <tr align="center" >
                           <td><a href="#">{{$boat->name}} </a></td>
                               <td>{{$boat->length}}</td>
       
                               <!-- Added Handler for the no image uploaded-->
                           @if (json_decode($boat->images) != null)
                               <td>
                                  
                                       
                               @foreach(json_decode($boat->images) as $boat_image)
       
       
       
                                       <img  style="width: 50px" src="{{url('/boats')}}/{{$boat_image}}">
                              
                               @endforeach
       
                                   </td>
                           @else
       
                                   <td>
                                       <img style="width: 40px" src="{{url('/images/no-image.png')}}">  No images.
                                   </td>
       
                           @endif
                                   <td><input type="color" id="favcolor" name="favcolor" value="{{$boat->color}}" disabled></td>
                                   <td> {{$boat->client->name}}</td>
                                           </tr>
                                           @endforeach
                   </tbody>
               </table>
               
              
       
           </div>
          
       
         </div>
        
        
        <script>
 
            // Get the modal
            var link = document.getElementById("boats{{$package-> id}}");
   
            link.onclick = function(){
                var modal = document.getElementById("boatModal{{$package-> id}}"); 
                var span = document.getElementById("cls{{$package->id}}");
                 modal.style.display = "block";

                 span.onclick = function() { 

                modal.style.display = "none";
                }
            }
            
           
           
            </script>
        
         @endif
         @endforeach
    </div>


    <script>
        window.setTimeout(function() {
        $(".alerty").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 4000);
        </script>
 




@endsection

