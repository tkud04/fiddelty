<?php
$user = null;
$caption = "A Technical Error has Occured";
?>



<?php $__env->startSection('title',"Server Error"); ?>

<?php $__env->startSection('banner'); ?>
<?php echo $__env->make('generic-banner',['img' => "images/photo_interactivebankerincallcenter_color_muted_1920x600.jpg",'caption'=>$caption], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="section">
        <div class="container">
            

<?php echo $__env->make('breadcrumb',['caption'=>$caption], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

		<p><span>Not to worry, it's nothing serious. We are already working on it as you read this.</span></p>
        </div>
    </div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mac/repos/fiddelty/resources/views/errors/500.blade.php ENDPATH**/ ?>