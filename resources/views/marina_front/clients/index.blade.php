@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-left">
            <div class="col-lg-4">

            <h1>Clients Operations</h1>
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
                <table id="clients_table" class="display">
                    <thead>
                        <tr align="center" >
                            <th>#</th>
                            <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                       <!-- <th>Nationality</th>-->
                       <!-- <th>ID</th>-->
                        <th>ID Image</th>
                     <!--   <th>Address</th>-->
                     <!--   <th>Job Title</th>-->
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                        $counter=1;   
                       @endphp
                        @foreach($clients as $client)
                        <tr align="center" >
                            <td >{{$counter}}</td>

                            <td><a href="{{url('client').'/'.$client->id}}">{{$client->name}}</a></td>
                                <td>{{$client->email}}</td>
                                <td>{{$client->mobile}}</td>
                               <!-- <td>{{$client->nationality}}</td> -->
                                <!--  <td>{{$client->national_id}}</td> -->
                                            @if (json_decode($client->national_id_image) != null)
                                    <td>
                                       
                                            
                                        @foreach(json_decode($client->national_id_image) as $client_image)
    
                                            <img id="myImg{{$client_image}}" style="width: 50px" src="{{url('/clients')}}/{{$client_image}}">
                                            
                                            <div id="myModal{{$client_image}}" class="modal">
                                                <span id="cl{{$client_image}}"class="close">&times;</span>
                                                <img class="modal-content" id="img01{{$client_image}}">
                                                <div id="caption"></div>
                                              </div>

                                              <script>
                                                // Get the modal
                                                var modal = document.getElementById("myModal{{$client_image}}");
                                                
                                                // Get the image and insert it inside the modal - use its "alt" text as a caption
                                                var img = document.getElementById("myImg{{$client_image}}");
                                                var modalImg = document.getElementById("img01{{$client_image}}");
                                                img.onclick = function(){
                                                  modal.style.display = "block";
                                                  modalImg.src = this.src;
                                                  captionText.innerHTML = this.alt;
                                                }
                                                
                                                // Get the <span> element that closes the modal
                                                var span = document.getElementById("cl{{$client_image}}");
                                                
                                                // When the user clicks on <span> (x), close the modal
                                                span.onclick = function() { 
                                                  modal.style.display = "none";
                                                }
                                                </script>
                                        @endforeach
    
                                    </td>
                                    @else
    
                                    <td>
                                          <img style="width: 40px" src="{{url('/images/no-image.png')}}">  No images.
                                    </td>
                                    @endif
                                
                                   



                             
                               <!-- <td>{{$client->address}}</td> -->
                               <!-- <td>{{$client->job_title}}</td>-->
                      
                               

                                <td dir="rtl"> 
                                    <div align="center" class="row">
                                   
                                   <div  align="center" class="col-lg-3">
                                       <form action="{{url('delete/client').'/'.$client->id}}" method="POST">
                                           @method('POST')
                                           @csrf
                                           <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> </button>               
                                          </form>
                                   </div>
                                   <div align="center"class="col-lg-3">
                                    <a class="btn btn-warning" href="{{url('edit/client').'/'.$client->id}}"><i class="fa fa-edit"></i></a> 
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
    </div>

    <script>
        window.setTimeout(function() {
        $(".alerty").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 4000);
        </script>
        

@endsection

