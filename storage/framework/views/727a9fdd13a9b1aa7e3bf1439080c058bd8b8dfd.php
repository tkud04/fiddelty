<?php
 $name = $data->name;
 $email = $data->email;
 $phone = isset($data->phone) ? $data->phone : "";
 $msg = $data->message;
 $recipient = $data->recipient;
 $ct = $data->ct;
 ?>
<center><img src="logo.png" width="150" height="150"/></center>
<h3 style="background: #00dd00; color: #fff; padding: 10px 15px;">New message from: <?php echo e($name); ?></h3>
<p>Recipient: <?php echo e($recipient); ?></p><br>
<p>Contact details: <?php echo e($email); ?> | <?php echo e($phone); ?></p><br>
<p>Best time to call: <?php echo e($ct); ?></p><br>
<p>Message: <em><?php echo e($msg); ?></em></p><br><br>
<?php /**PATH C:\bkupp\lokl\repo\fidellty\resources\views/emails/contact.blade.php ENDPATH**/ ?>