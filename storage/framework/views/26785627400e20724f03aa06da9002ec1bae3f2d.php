<div class="side-div grid-child aside grey">
       <div>
	     <h2 class="text-white side-name">Welcome,<?php echo e($fname); ?></h2>
		 <h4 class="text-white side-date">Your last sign-in was on <?php echo e(date("jS F, Y h:i A")); ?></h4>
		 <a href="<?php echo e(url('transfer')); ?>" class="text-white" style="margin: 5px;">
		  <ion-icon name="lock-closed-outline" class="text-white"></ion-icon>
		  Transfer money
		 </a><br><br>
		 <a href="<?php echo e(url('signoff')); ?>" class="text-white" style="margin: 5px;">
		  <ion-icon name="lock-closed-outline" class="text-white"></ion-icon>
		   Sign off
		 </a>
	   </div><br>
	   <hr class="grey-outline">
	   <div>
	     <center>
		 <h2 class="text-white side-name">Meet with a banker</h2>
		  <ion-icon name="calendar-outline" class="text-white" style="font-size: 60px; color: green;"></ion-icon>
		  <h2 class="text-white side-name">Make an appointment online at your own convenience</h2>
		 </center>
	   </div><br>
	   <hr class="grey-outline">
	   <div style="margin: 5px">
	      <ion-icon name="flash-outline" class="text-white"></ion-icon>
		  Full site access
	   </div>
       </div><?php /**PATH C:\bkupp\lokl\repo\wells\resources\views/side-menu.blade.php ENDPATH**/ ?>