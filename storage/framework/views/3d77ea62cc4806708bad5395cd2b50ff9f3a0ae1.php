<?php $__env->startSection('title',"Dashboard"); ?>

<?php
$caption = "Dashboard";
?>

<?php $__env->startSection('banner'); ?>
<?php echo $__env->make('generic-banner',['img' => "images/photo_commercialcable_color_muted_1920x1080.jpg",'caption'=>$caption], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="section">
        <div class="container">
            

<?php echo $__env->make('breadcrumb',['caption'=>$caption], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

			    <div class="row">
				    <div class="col-md-8">
                        <h2><?php echo e($caption); ?></h2>
						
					<?php
					if(count($accounts) > 0)
					{
					foreach($accounts as $a)
					{
					 $acname = $a['name'];
					 $actype = $a['type'];
					 $amount = $a['amount'];
					 $status = $a['status'];
					
					?>
<div class="accordion">
   <button aria-controls="accordion1907<?php echo e($a['id']); ?>" aria-expanded="false" class="accordion__header" data-target="#accordion1907<?php echo e($a['id']); ?>" data-toggle="collapse" type="button">
   <?php echo e($acname); ?>: $<?php echo e(number_format($amount,2)); ?><span class="icon-plus-circle"></span><span class="icon-minus-circle"></span>
   </button>
   <div aria-expanded="false" class="collapse in" id="accordion1907<?php echo e($a['id']); ?>" style="">
      <div class="accordion__body">
         <div>
            <h4>Account type: <a class="btn btn--primary" href="javascript:void(0)"><?php echo e($actype); ?></a></h4>
            <h4>Account balance: <a class="btn btn--primary" href="javascript:void(0)">$<?php echo e(number_format($amount,2)); ?></a></h4>
            <h4>Last transaction: <a class="btn btn--primary" href="javascript:void(0)"><?php echo e($a['date']); ?></a></h4>
            <h4>Status: <a class="btn btn--primary" href="javascript:void(0)"><?php echo e(strtoupper($status)); ?></a></h4>
         </div>
      </div>
   </div>
</div>
					<?php
					}
					}
					?>
                     </div>
<?php echo $__env->make('sidebar',['posts' => $posts], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mac/repos/fiddelty/resources/views/dashboard.blade.php ENDPATH**/ ?>