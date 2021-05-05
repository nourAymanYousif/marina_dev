

<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row justify-content-left">
            <div class="col-lg-4">

            <h1>Clients Operations</h1>
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
                <table id="clients_table" class="display">
                    <thead>
                        <tr align="center" >
                            <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Nationality</th>
                        <th>ID</th>
                        <th>ID Image</th>
                        <th>Address</th>
                        <th>Job Title</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr align="center" >
                            <td><a href="#"><?php echo e($client->name); ?></a></td>
                                <td><?php echo e($client->email); ?></td>
                                <td><?php echo e($client->mobile); ?></td>
                                <td><?php echo e($client->nationality); ?></td>
                                <td><?php echo e($client->national_id); ?></td>
                                <td><img style="width: 50px" src="<?php echo e(url('/clients')); ?>/<?php echo e($client->national_id_image); ?>">              </td>
                                <td><?php echo e($client->address); ?></td>
                                <td><?php echo e($client->job_title); ?></td>
                      
                                <td dir="rtl"><a class="btn btn-warning" href="<?php echo e(url('edit/client').'/'.$client->id); ?>"><i class="fa fa-edit"></i></a> <button class="btn btn-danger"><i class="fa fa-trash"></i></button> </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\marina\resources\views/marina_front/clients/index.blade.php ENDPATH**/ ?>