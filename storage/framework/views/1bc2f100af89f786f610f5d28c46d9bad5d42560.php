<?php $__env->startSection('title',"Transfer Money"); ?>

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
			 
			 $dt = [
			   ['type' => "send",'date' => date("m/d/y"),'amount' => "1000000",'short_acc_from' =>"3675",'short_acc_to' =>"5631",'status' => "Pending"],
			   ['type' => "send",'date' => date("m/d/y"),'amount' => "457000",'short_acc_from' =>"0918",'short_acc_to' =>"6703",'status' => "Pending"],
			 ];
            ?>
            <div class="main-div">			
            <div class="m-5">			
             <form class="zipStateForm">
			   <p class="control-label"><b>From</b></p>
			   <select class="form-control">
			     <option value="none">Select account</option>
				 <?php
				  foreach($accounts as $a)
				  {
				 ?>
				    <option value="<?=$a['name']?>"><?=ucwords($a['name']).' - $'.number_format($a['amount'],2)?></option>
				 <?php
				  }
				 ?>
			   </select><br><br>
			   <p class="control-label"><b>To</b></p>
			   <select class="form-control">
			     <option value="none">Select account</option>
			   </select>
			 </form>
			 </div><br>
			 <hr>
			 <div class="m-5">
			 <center>
			   <p class="m-5 text-grey">2 Scheduled Transfers & Payments</p>
			 </center>
			 </div>
			 <hr>
			 <div class="m-10">
			   <?php
			    foreach($dt as $d)
				{
			   ?>
			     <div class="grid-container">
				   <div class="grid-child">
				  
				  
				  <div class="grid-container">
				   <div class="grid-child">
				  
				  
				  <div class="grid-container m-5">
				   <div class="grid-child">
				    <p style="font-size: 1.5em;"><span style="color: skyblue; font-weight: bold;"><?=ucwords($d['type'])?></span> <?=$d['date']?></p>
					<p style="font-size: 1.5em;">
					  <span style="font-weight: bold;">From</span><span>....<?=$d['short_acc_from']?></span>
					  <ion-icon name="arrow-forward-outline"></ion-icon>
					  <span style="font-weight: bold;">To</span><span>....<?=$d['short_acc_to']?></span> 
					</p>
					<p style="font-size: 1.5em;">
					  <span><?=ucwords($d['status'])?></span>
					</p>
				   </div>
				   <div class="side-div grid-child">
				    <p style="font-size: 2em;">$<?=number_format($d['amount'],2)?></p>
				   </div>
				 </div>
				  
				  
				   </div>
				   <div class="side-div grid-child">
				    
				   </div>
				 </div>
				  
				  
				   </div>
				   <div class="side-div grid-child">
				    
				   </div>
				 </div>
			     <hr>
			   <?php
			    }
			   ?>
			 </div>
			 </div>
			</div>
			<?php echo $__env->make('side-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			</div>
	    </div>
	 </div>
		<br><br>
		
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\bkupp\lokl\repo\wells\resources\views/transfer.blade.php ENDPATH**/ ?>