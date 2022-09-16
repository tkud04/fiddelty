<?php
$user = null;
$caption = "Not Found";
?>



<?php $__env->startSection('title',"Not Found"); ?>

<?php $__env->startSection('banner'); ?>
<?php echo $__env->make('generic-banner',['img' => "images/photo_interactivebankerincallcenter_color_muted_1920x600.jpg",'caption'=>$caption], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="section">
        <div class="container">
            

<?php echo $__env->make('breadcrumb',['caption'=>$caption], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

		<p><span>Sorry the page you are looking for has moved, or does not exist.</span></p>
        </div>
    </div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\bkupp\lokl\repo\fidellty\resources\views/errors/404.blade.php ENDPATH**/ ?>