<?php
 $totals = $order['totals'];
 $items = $order['items'];
 $itemCount = $totals['items'];
 $uu = "http://www.aceluxurystore.com/confirm-payment?oid=".$order['id'];
?>
<center><img src="http://www.aceluxurystore.com/images/logo.png" width="150" height="150"/></center>
<h3 style="background: #ff9bbc; color: #fff; padding: 10px 15px;">Confirm payment for order {{$order['payment_code']}}</h3>

Hello {{$u['fname']}},<br> You just placed an order on our website. See the details below:<br><br>
Reference #: <b>{{$order['reference']}}</b><br>
<?php
foreach($items as $i)
{
	$product = $i['product'];
	$sku = $product['sku'];
	$qty = $i['qty'];
	$pu = url('product')."?sku=".$product['sku'];
	$img = $product['imggs'][0];
	
?>

<a href="{{$pu}}" target="_blank">
  <img style="vertical-align: middle;border:0;line-height: 20px;" src="{{$img}}" alt="{{$sku}}" height="80" width="80" style="margin-bottom: 5px;"/>
	  {{$sku}}
</a> (x{{$qty}})<br>
<?php
}
?>
Total: <b>&#8358;{{number_format($order['amount'],2)}}</b><br><br>
<h5 style="background: #ff9bbc; color: #fff; padding: 10px 15px;">Next steps</h5>

<p>Click the button below to confirm your payment for this order. Alternatively you can log in to your Dashboard to confirm payment for this order (go to Orders and click the Verify Payment button beside the order).</p><br>
<p style="color:red;"><b>NOTE:</b> This order is currently marked as <b>PENDING</b>. We will only process orders whose payment have been cleared in our accounts and confirmed.<br><br>Orders are delivered within 48 hours in Lagos.<br><br>Orders outside Lagos are delivered between 3 – 7 days.</p><br><br>

<a href="{{$uu}}" target="_blank" style="background: #ff9bbc; color: #fff; padding: 10px 15px; margin-right: 10px;">Confirm Payment</a>
<br><br>

