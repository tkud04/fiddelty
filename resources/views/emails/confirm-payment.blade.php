<?php
  $uu = "http://www.aceluxurystore.com/track?o=".$order['reference'];
?>
<center><img src="http://www.aceluxurystore.com/images/logo.png" width="150" height="150"/></center>
<h3 style="background: #ff9bbc; color: #fff; padding: 10px 15px;">Payment confirmed!</h3>
Hello {{$user->fname}},<br> your payment for order <b>{{$order['payment_code']}}</b> has been cleared and your order is being processed. <br><br>
<h5 style="background: #ff9bbc; color: #fff; padding: 10px 15px;">Next steps</h5>

<p>Kindly click the button below to track your delivery. Alternatively you can log in to your Dashboard to track your order (go to Orders and click the Track button beside the order).</p><br>
<p style="color:red;"><b>NOTE:</b> Orders are delivered within 48 hours in Lagos.<br><br>Orders outside Lagos are delivered between 3 – 7 days.</p><br><br>

<a href="{{$uu}}" target="_blank" style="background: #ff9bbc; color: #fff; padding: 10px 15px;">Track your order</a><br><br>

