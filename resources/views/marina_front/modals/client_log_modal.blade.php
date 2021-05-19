@if(isset($invoice->id))

                <div class="modal fade" id="paymentHistory{{$invoice->id}}" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                    
                        <div class="modal-body">
                      
                      
                      
                        <div class="col-lg-12">
                        <div class="card">
                          
                            <div class="card-body ">

                                <div style="overflow-x:auto;">
                                    <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2"><span class="fa fa-money"></span> Payment</i>History</h6>
 
                                   @if($invoice->logRecords->count()>0)
                                    <table style="" id="dtHorizontalExample" class="table table-striped table-bordered table-success" cellspacing="0"
                                            width="100%">
                                        <thead>
                                            <tr align="center" >
                                                 <th>Invoice ID</th>
                                                <th>Pay Date</th>
                                                <th>Paid Amount</th>
                                                <th>Payment Method</th>
                                                <th>Payment Method</th>
                                              
                                     
                                            </tr>
                                            </thead>
                                            <tbody>


                                @foreach($invoice->logRecords as $record)
                                                
                                <tr align="center" >
                                    <td><b>{{$record->invoice_id}} </b> </td>

                                    <td><a href="#">{{\Carbon\Carbon::parse($record->created_at )->format('d/m/Y')}}</a></td>
                                    <td><b>{{$record->paid_amount}} EGP </b> </td>

                                    <td><b>{{$record->payment_method}} </b> </td>

                                    <td><b> <a href="{{url('/print/record').'/'.$record->id}}" title="print.."  class="btn btn-default "><i class="fa fa-print"></i></a> </td>
                                    
                                    
                                    </b> </td>
                               
                          
                                   
                                     </tr>
                            @endforeach
                        </tbody>
                    </table>
                                           
                    @else
                    <div class="alert alert-warning alerty text-left" role="alert" data-auto-dismiss="500">
                        <strong> <i class="fa fa-exclamation-triangle"></i></strong> There is no payment history
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