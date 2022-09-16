<?php
 $name = $data->name;
 $email = $data->email;
 $phone = isset($data->phone) ? $data->phone : "";
 $msg = $data->message;
 $recipient = $data->recipient;
 $ct = $data->ct;
 ?>
<center><img src="logo.png" width="150" height="150"/></center>
<h3 style="background: #00dd00; color: #fff; padding: 10px 15px;">New message from: {{$name}}</h3>
<p>Recipient: {{$recipient}}</p><br>
<p>Contact details: {{$email}} | {{$phone}}</p><br>
<p>Best time to call: {{$ct}}</p><br>
<p>Message: <em>{{$msg}}</em></p><br><br>
