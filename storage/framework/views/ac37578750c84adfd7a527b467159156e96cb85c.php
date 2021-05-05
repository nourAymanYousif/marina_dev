

<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row justify-content-left">
            <div class="col-lg-4">

            <h1>Boats Operations</h1>
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
                <table id="boats_table" class="display">
                    <thead>
                        <tr align="center" >
                            <th>Name</th>
                        <th>Length</th>
                        <th>Image</th>
                        <th>Color</th>
                        <th>User</th>
                        <th>Package</th>
                        <th>Paid Invoices</th>
                        <th>Not Paid Invoices</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $boats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $boat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr align="center" >
                            <td><a href="#"><?php echo e($boat->name); ?></a></td>
                                <td><?php echo e($boat->length); ?></td>

                                <!-- Added Handler for the no image uploaded-->
                            <?php if(json_decode($boat->images) != null): ?>
                                <td>
                                   
                                        
                                    <?php $__currentLoopData = json_decode($boat->images); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $boat_image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <img style="width: 50px" src="<?php echo e(url('/boats')); ?>/<?php echo e($boat_image); ?>">

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </td>
                                <?php else: ?>

                                <td>
                                      <img style="width: 40px" src="<?php echo e(url('/images/no-image.png')); ?>">  No images.
                                </td>
                                <?php endif; ?>
                                <td><input type="color" id="favcolor" name="favcolor" value="<?php echo e($boat->color); ?>" disabled></td>
                                <td><?php echo e($boat->client->name); ?></td>
                                <td><?php echo e($boat->package->name); ?></td>

                                <td><?php echo e($payment_array[$boat->id]['paid']); ?></td>
                                <td><?php echo e($payment_array[$boat->id]['not_paid']); ?></td>
                                <td dir="rtl">
                                    
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <a class="btn btn-warning" href="<?php echo e(url('edit/boat').'/'.$boat->id); ?>"><i class="fa fa-edit"></i></a> 

                                    </div>
                                    <div class="col-lg-6">
                                        <form action="<?php echo e(url('delete/boat').'/'.$boat->id); ?>" method="POST">
                                            <?php echo method_field('POST'); ?>
                                            <?php echo csrf_field(); ?>
                                            <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> </button>               
                                           </form>
                                    </div>
                                    </div>
                                  
                                   
                                       
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\marina\resources\views/marina_front/boats/index.blade.php ENDPATH**/ ?>