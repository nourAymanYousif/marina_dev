@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-left">
            <div class="col-lg-4">

            <h1>Boats Operations</h1>
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
        <div style="width:110%" class="justify-content-center ">
            <div class="col-lg-12">
                <table  id="boats_table" class="display"  style="width:100%">
                    <thead>
                        <tr align="center" >
                            <th >#</th>
                            <th id="Name" name="Name"  title="Name">Register date</th>
                            <th id="Name" name="Name"  title="Name">Name</th>
                        <th id="Length" name="Length"  title="Length">Length</th>
                        <th id="Image" name="Image"  title="Image">Image</th>
                        <th id="Color" name="Color"  title="Color">Color</th>
                        <th id="Client" name="Client"  title="Client">Client</th>
                        <th id="Package" name="Package"  title="Package" tag="package">Package</th>
                        <th>Status</th>
                       
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                         $counter=1;  
                         $rowColor="#fff";
                        $icon="";
                        $title="" 
                        @endphp
                        @foreach($boats as $boat)
                      
                        <tr title="{{$title}}" style="background:{{$rowColor}}" align="center" >
                            <td>{{$counter}}</td>
                            <td>{{\Carbon\Carbon::parse($boat->created_at )->format('d/m/Y')}}</td>

                            <td ><a href="#">{{$boat->name}}</a></td>
                                <td>{{$boat->length}}</td>

                                <!-- Added Handler for the no image uploaded-->
                            @if (json_decode($boat->images) != null)
                                <td>
                                   
                                        
                                    @foreach(json_decode($boat->images) as $boat_image)



                                        <img id="myImg{{$boat_image}}" style="width: 50px" src="{{url('/boats')}}/{{$boat_image}}">
                                            
                                        <div id="myModal{{$boat_image}}" class="modal">
                                            <span id="cl{{$boat_image}}"class="close">&times;</span>
                                            <img class="modal-content" id="img01{{$boat_image}}">
                                            <div id="caption"></div>
                                          </div>

                                          <script>
                                            // Get the modal
                                            var modal = document.getElementById("myModal{{$boat_image}}");
                                            
                                            // Get the image and insert it inside the modal - use its "alt" text as a caption
                                            var img = document.getElementById("myImg{{$boat_image}}");
                                            var modalImg = document.getElementById("img01{{$boat_image}}");
                                            img.onclick = function(){
                                              modal.style.display = "block";
                                              modalImg.src = this.src;
                                              captionText.innerHTML = this.alt;
                                            }
                                            
                                            // Get the <span> element that closes the modal
                                            var span = document.getElementById("cl{{$boat_image}}");
                                            
                                            // When the user clicks on <span> (x), close the modal
                                            span.onclick = function() { 
                                              modal.style.display = "none";
                                            }
                                            </script>



                        @php
                         $counter++;   
                        @endphp
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
                                
                                @if($boat->has_main == 1)
                                <td title= "This Boat Has Maintenance Job Order" data="ok" >  <i  class="fa fa-wrench text-danger"> </i> Has Maintenance </td>

                                @else
                                <td title= "This Boat Has No Maintenance Job Order" data="m">  <span class="fa fa-check-circle text-success"></span>  Ready</td>

                                @endif


                               
                                <td dir="rtl">
                                    
                                    <div class="row">
                               

                                    <div class="col-lg-4">
                                        <a class="btn btn-warning" href="{{url('edit/boat').'/'.$boat->id}}"><i class="fa fa-edit"></i></a> 

                                     </div>
                                     
                                    <div class="col-lg-6">
                                        <form action="{{url('delete/boat').'/'.$boat->id}}" method="POST">
                                            @method('POST')
                                            @csrf
                                            <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> </button>               
                                           </form>
                                    </div>


                                    </div>
                                  
                                   
                                       
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<!-- To make the  alert hide after Specific Time -->
    <script>
    window.setTimeout(function() {
    $(".alerty").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 4000);
    </script>

@endsection

