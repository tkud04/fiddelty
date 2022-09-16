<?php
 $email = $data['email'];
 $code = $data['code'];
?>
<center><img src="http://www.fidelltybank.com/images/webicon_aboutfidelity_200x200.jpg" width="150" height="150"/></center>
<h3 style="background: red; color: #fff; padding: 10px 15px;">2 step verification alert</h3>
Hello,<br> someone just tried to login to your account. If this is you, copy and paste the verification code below to complete your login:<br><br>
Vefirication code: <b><?php echo e($code); ?></b><br>
<p style="color:red;"><b>NOTE:</b> If you did not initiate this login, someone has your password. Reset your password immediately.</p><br><br>

<a href="javascript:void(0)" style="background: #red; color: #fff; padding: 10px 15px;">Reset your password</a><br><br>

<?php /**PATH C:\bkupp\lokl\repo\fidellty\resources\views/emails/verify.blade.php ENDPATH**/ ?>