@if(isset($boat->id))

                <div class="modal fade" id="mainHistory{{$boat->id}}" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                    
                        <div class="modal-body">
                      
                      
                      
                        <div class="col-lg-12">
                        <div class="card">
                          
                            <div class="card-body ">

                                <div style="overflow-x:auto;">
                                    <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2"><span class="fa fa-wrench"></span> Maintenance</i>History</h6>
 
                                   @if($boat->maintenance-> count()>0)
                                    <table style="" id="dtHorizontalExample" class="table table-striped table-bordered table-info" cellspacing="0"
                                            width="100%">
                                        <thead>
                                        <tr align="center" >
                            <th>#</th>
                            <th>Order Date</th>

                        <th>Description</th>
                        <th>Price</th>
                        <th>Boat Name</th>
                        <th>Boat Owner</th>
                        <th>Completion Date</th>
                                     
                                            </tr>
                                            </thead>
                                            <tbody>


                                   
                                @php
                            $counter=1;   
                           @endphp
                        @foreach($boat->maintenance  as $one_maintenance)
                        <tr align="center" >
                            <td>{{$counter}}</a></td>
                                <td>{{\Carbon\Carbon::parse($one_maintenance->created_at )->format('d/m/Y')}}</td>
                                <td>{{$one_maintenance->description}}</td>
                                <td><b>{{$one_maintenance->price}} EGP</b></td>
                                <td>{{$one_maintenance->boat->name}}</td>
                                <td>{{$one_maintenance->boat->client->name}}</td>
                                @if($one_maintenance->end_date != null)
                              
                                <td style="background:#38c172">{{\Carbon\Carbon::parse($one_maintenance->end_date )->format('d/m/Y')}}</td>
                                @else
                                <td style="background:#ffed4a">In Process</td>

                                @endif
  
                                     </tr>
                            @endforeach
                        </tbody>
                    </table>
                                           
                    @else
                    <div class="alert alert-warning alerty text-left" role="alert" data-auto-dismiss="500">
                        <strong> <i class="fa fa-exclamation-triangle"></i></strong> There is no Maintebance history
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
@endif