

<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row justify-content-left">
            <div class="col-lg-4">

            <h1>Packeges Operations</h1>
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
                <table id="packages_table" class="display">
                    <thead>
                        <tr align="center" >
                            <th>Name</th>
                        <th>Description</th>
                        <th>Rate</th>
                        <th>Boats on Package</th>
                      
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr align="center" >
                            <td><a href="#"><?php echo e($package->name); ?></a></td>
                                <td><?php echo e($package->description); ?></td>
                                <td><?php echo e($package->rate); ?></td>
                                <td><?php echo e($package->boatsOnPackage); ?></td>
  
                                <td dir="rtl">  <div align="center" class="row">
                                    <div align="center"class="col-lg-2">
                                    <a class="btn btn-warning" href="<?php echo e(url('edit/package').'/'.$package->id); ?>"><i class="fa fa-edit"></i></a> 
                                    </div>
                                    <div  align="center" class="col-lg-2">
                                        <form action="<?php echo e(url('delete/package').'/'.$package->id); ?>" method="POST">
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



<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\marina\resources\views/marina_front/packages/index.blade.php ENDPATH**/ ?>