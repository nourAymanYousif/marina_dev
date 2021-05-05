

<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row justify-content-left">
            <div class="col-lg-4">

            <h1>Invoices Operations</h1>
        </div>
       
        <div class="col-lg-6 " align="center" >
            <?php if(Session::has('successDeleteMsg')): ?>               
               
            <div class="alert alert-warning alerty text-left" role="alert" data-auto-dismiss="500">
                <strong> <i class="fa fa-exclamation-triangle"></i></strong> <?php echo Session::get('successDeleteMsg'); ?>

              </div>
                         
            <?php endif; ?>
        </div>
    </div>
        <hr>
       <br>
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <table id="invoices_table" class="display">
                    <thead>
                    <tr align="center" >
                       
                        <th>Issue Date</th>
                        <th>Boat Name</th>
                        <th>Owner</th>
                        <th>Package</th>
                        <th>Rate</th>
                        <th>Paid Amount</th>
                        <th>Invoice Status</th>
                        <th>Actions</th>

                    </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr align="center" >
                                <td><a href="#"><?php echo e(\Carbon\Carbon::parse($invoice->created_at )->format('d/m/Y')); ?></a></td>
                                <td><?php echo e($invoice->boat->name); ?></td>
                                <td><?php echo e($invoice->boat->client->name); ?></td>
                                <td><?php echo e($invoice->boat->package->name); ?></td>
                                <td><b><?php echo e($invoice->boat->package->rate); ?> EGP</b> </td>
                                <td><b><?php echo e($invoice->paid_amount); ?> EGP</b> </td>
                              <?php if($invoice->is_paid == 0 ): ?> 
                                  <td align="center" style="background:#ff8b8e	;">Not Paid</td>
                                   <?php else: ?>
                                   <td style="background:#a1e2c2	;">Paid</td>

                                <?php endif; ?>
                      
                                <td>
                                <!--    <a  class="btn btn-warning" href="<?php echo e(url('edit/invoice').'/'.$invoice->id); ?>"><i class="fa fa-edit"></i></a>
                                    <a  class="btn btn-warning" href="<?php echo e(url('edit/invoice').'/'.$invoice->id); ?>"><i class="fa fa-edit"></i></a>
                                 -->   
                                    <button title="More.." disabled class="btn btn-dark"><b>...</b></button> </td>
                                 </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\marina\resources\views/marina_front/invoice/index.blade.php ENDPATH**/ ?>