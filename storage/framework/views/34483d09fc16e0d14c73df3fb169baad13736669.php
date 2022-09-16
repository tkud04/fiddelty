<?php $__env->startSection('title',"Account Summary"); ?>

<?php $__env->startSection('content'); ?>
		<div class="mainContentCol">
        	<div id="contentBody">
	       <div class="grid-container">
		   <div class="main-div grid-child">
            <?php
			$lname = "Alexander"; $fname = "Philip";
			 $accounts = [
			   ['icon' => "wallet-outline",'name' => "checking",'number' => "xxxxxxx252",'amount' => "1200000"],
			   ['icon' => "wallet-outline",'name' => "way 2 save savings",'number' => "xxxxxxx515",'amount' => "520000"],
			   ['icon' => "wallet-outline",'name' => "credit card",'number' => "xxxxxxx914",'amount' => "18000"],
			 ];
             foreach($accounts as $acct)
			 {
            ?>			
				<div class="row-data tapa">

						 <div class="grid-container">

       <div class="main-div grid-child">
           <div class="card1" data-item="card1" data-tcm="182-139340-16">
								<div class="cardContent">
									<span>
									  <ion-icon name="<?php echo e($acct['icon']); ?>"></ion-icon>
									</span>
									<div>
									  <h2 class="acct-type"><?php echo e($acct['name']); ?></h2>
										<h4 class="acct-number"><?php echo e($acct['number']); ?></h4>	
									</div>
																	
								</div>
			</div>
       </div>

       <div class="side-div grid-child">  
		 <h1><sup>$</sup><?php echo e(number_format($acct['amount'],2)); ?></h1>
		 <h4>Available balance</h4>
       </div>
  
     </div>
						
					
					
						
					
				</div>
				<?php
			    }
				?>
			</div>
			<?php echo $__env->make('side-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			</div>
	    </div>
	 </div>
		<br><br>
		
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\bkupp\lokl\repo\wells\resources\views/dashboard.blade.php ENDPATH**/ ?>