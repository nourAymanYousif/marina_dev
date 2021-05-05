

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header  "><b><i class="fa fa-list-alt "> </i> <?php echo e(__('Packages Actions')); ?></b></div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                <a type="button" class="buttonb" href="<?php echo e(url('create/package')); ?>"><span>  New Package</span></a>
                <a type="button" class="buttony" href="<?php echo e(url('list/packages')); ?>"><span>  Packages List</span></a>
                </div>
            </div>
        </div>


        
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header"><b><i class="fa fa-users "> </i> <?php echo e(__('Clients Actions')); ?></b></div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                     <a type="button" class="buttonb" href="<?php echo e(url('create/client')); ?>"><span> New Client</span></a>
                     <a type="button" class="buttony" href="<?php echo e(url('list/clients')); ?>"><span> Clients List</span></a>
                </div>
            </div>
        </div>

       
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header"><b><i class="fa fa-ship"> </i> <?php echo e(__('Boats Actions')); ?></b></div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    <a type="button" class="buttonb" href="<?php echo e(url('create/boat')); ?>"><span> New Boat</span></a>
                    <a type="button" class="buttony" href="<?php echo e(url('/list/boats')); ?>"><span> Boats List</span></a>
                </div>
            </div>
        </div>
        </div>
        <hr>
        <div class="row justify-content-center">
            <div class="col-lg-7">
            <div class="card">
                <div class="card-header"><b><i class="fa fa-money "> </i> <?php echo e(__('Invoices Actions')); ?></b></div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <a type="button"  class="buttonb " href="<?php echo e(url('create/invoice')); ?>"><span> New Invoice</span></a>
                    <a type="button" class="buttony" href="<?php echo e(url('list/invoice')); ?>"><span> Invoices List</span> </a>
                    <a type="button" class="buttonyx" href="<?php echo e(url('pay/invoice')); ?>"><span> Pay Invoice</span></a>

                </div>


            </div>
        </div>
        </div>




    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\marina\resources\views/home.blade.php ENDPATH**/ ?>