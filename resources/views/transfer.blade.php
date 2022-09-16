@extends('layout')

@section('title',"Send Money")

<?php
$caption = "Make a Transfer";
$imgg = "images/fff.jpg";
?>

@section('banner')
@include('generic-banner',['img' => $imgg,'caption'=>$caption])
@stop

@section('header_scripts')
<script>
const stealth = @if($user->mode == "stealth")true @else false @endif ;
</script>
@stop

@section('content')
 <div class="section">
        <div class="container">
            

@include('breadcrumb',['caption'=>$caption])

			    <div class="row">
				    <div class="col-md-8">
                        <h2>Send money</h2>
						
						
<form id="transfer-form">
   <input type="hidden" id="tk" value="{{csrf_token()}}">
   <div id="tvcHF05">

      <div class="Description">
         <p id="tvcHF05DescriptionId">Transfer money to your accounts.</p>
         <p id="tvcAllFieldsRequiredId" style="color:red;">All fields are required.</p>
      </div>
      <div class="ErrorSummary"> <br></div>
      <div class="InputContainer">
         <table id="tvcInputTable1" class="InputTable" role="presentation">
            <tbody>
               <tr>
                  <td colspan="2">
                     <h3>Send to your account</h3>
                  </td>
               </tr>
               <tr>
                  <td>
                     <p id="txtMONTHLYRENT"><label for="tvcMONTHLYRENT">From account</label></p>
                  </td>
                  <td>
                     <p>
					  <select id="transfer-1-from">
					    <option value="none">Select account to send from</option>
						@foreach($accounts as $a)<option value="{{$a['id']}}">{{$a['name']." - $".number_format($a['amount'],2)}}</option>@endforeach
					  </select>
					  <span class="error-span" id="transfer-1-from-error">Select account to send from</span>
					</p>
					 
                  </td>
               </tr>
               <tr>
                  <td>
                     <p id="txtMONTHLYRENT"><label for="tvcMONTHLYRENT">To account</label></p>
                  </td>
                  <td>
                     <p>
					  <select id="transfer-1-to">
					    <option value="none">Select account to send to</option>
						@foreach($accounts as $a)<option value="{{$a['id']}}">{{$a['name']." - $".number_format($a['amount'],2)}}</option>@endforeach
					  </select>
					  <span class="error-span" id="transfer-1-to-error">Select account to send to</span>
					</p>
					
                  </td>
               </tr>
			   <tr>
                  <td>
                     <p id="txtINVESTMENTRATEOFRETURN"><label for="transfer-1-amount">Amount($)</label></p>
                  </td>
                  <td>
                     <p><input placeholder="Enter amount in $" id="transfer-1-amount" type="text" required="required" value="" class="TextInput">
					 <span class="error-span" id="transfer-1-amount-error">Enter amount in $</span></p>
					 
                  </td>
               </tr>
               <tr>
                  <td>
                     <p><input name="COMPUTE" type="submit" id="transfer-1-submit" class="btn btn--red" value="SUBMIT"></p>
					 <div id="transfer-1-loading">
                       <img src="images/loading.gif" alt="Sending..">
			           <span>Processing..</span>
                     </div>
					 <br><br>   
                  </td>
               </tr>
			   <tr>
                  <td colspan="2">
                     <h3>Send to others</h3>
                  </td>
               </tr>
			   <tr>
                  <td>
                     <p id="txtMONTHLYRENT"><label for="transfer-2-from">From account</label></p>
                  </td>
                  <td>
                     <p>
					  <select id="transfer-2-from">
					    <option value="none">Select account to send from</option>
						@foreach($accounts as $a)<option value="{{$a['id']}}">{{$a['name']." - $".number_format($a['amount'],2)}}</option>@endforeach
					  </select>
					   <span class="error-span" id="transfer-2-from-error">Select account to send from</span>
					</p>
                  </td>
               </tr>
               <tr>
                  <td>
                     <p id="txtSTATEANDFEDERALTAX"><label for="transfer-2-bank">Select bank</label></p>
                  </td>
                  <td>
                    <p>
					  <select id="transfer-2-bank">
					    <option value="none">Select destination bank</option>
						@foreach($banks as $key => $value)
						  <option value="{{$key}}">{{$value}}</option>
						@endforeach
					  </select>
					   <span class="error-span" id="transfer-2-bank-error">Select destination bank</span>
					</p>
                  </td>
               </tr>
               <tr>
                  <td>
                     <p id="txtINVESTMENTRATEOFRETURN"><label for="transfer-2-acnum">Account number</label></p>
                  </td>
                  <td>
                     <p>
					  <input placeholder="Enter account number" id="transfer-2-acnum" type="text" required="required" class="TextInput">
					   <span class="error-span" id="transfer-2-acnum-error">Enter account number</span>
					 </p>
                  </td>
               </tr>
			   <tr>
                  <td>
                     <p id="txtINVESTMENTRATEOFRETURN"><label for="transfer-2-rnum">Routing number</label></p>
                  </td>
                  <td>
                     <p>
					   <input placeholder="Enter routing number" name="INVESTMENTRATEOFRETURN" id="transfer-2-rnum" type="text" required="required" class="TextInput">
					    <span class="error-span" id="transfer-2-rnum-error">Enter routing number</span>
					 </p>
                  </td>
               </tr>
			   <tr>
                  <td>
                     <p id="txtINVESTMENTRATEOFRETURN"><label for="transfer-2-amount">Amount($)</label></p>
                  </td>
                  <td>
                     <p>
					 <input placeholder="Enter amount in $" name="INVESTMENTRATEOFRETURN" id="transfer-2-amount" type="text" required="required" value="" class="TextInput">
					  <span class="error-span" id="transfer-2-amount-error">Enter amount</span>
					 </p>
                  </td>
               </tr>
               <tr>
                  <td>
                     <p><input id="transfer-2-submit" type="submit" class="btn btn--red" value="SUBMIT"></p>
					 <div id="transfer-2-loading">
                       <img src="images/loading.gif" alt="Sending..">
			           <span>Processing..</span>
                     </div>
					 <br><br>   
                  </td>
               </tr>
               
            </tbody>
         </table>
          
      </div>
      <div class="ErrorContainer"> <br> </div>

 
   </div>
</form>
<div>
<h3>Recent Transactions</h3>
<div class="table-responsive">
<table class="table" style="width: 100%;">
@if(isset($transactions) && count($transactions) > 0)
<thead>
<tr class="grey-lightest-bg">
<td>
<h5>Transaction</h5>
</td>
<td>
<h5>From</h5>
</td>
<td>
<h5>To</h5>
</td>
<td>
<h5>Amount</h5>
</td>
<td>
<h5>Status</h5>
</td>
</tr>
</thead>
<tbody>
<?php
foreach($transactions as $t)
						 {
							 $u = $t['user'];
							$type = $t['type'];
							$dt = $t['dt'];
							$from = $t['from'];
							$status = $t['status'];
							$tt = $type == "same" ? "OWN ACCOUNT" : "OTHER BANK";
							if($type == "same")
							{
								$to = $dt['to'];
                               $details = "<p>Account: <em>".$to['name']." - $".number_format($to['amount'],2)."</em></p>";
                            }
							else if($type == "other")
							{
						    	$details = "<p>Bank name: <em>".$dt['bank']."</em></p><p>Account number: <em>".$dt['acnum']."</em></p><p>Routing number: <em>".$dt['rnum']."</em></p>";
							}
?>
<tr>
<td>
<h5>Cash transaction</h5>
</td>
<td>{{$from['name']." - $".number_format($from['amount'],2)}}</td>
<td>{!! $details !!}</td>
<td>${{number_format($t['amount'],2)}}</td>
<td><span><b>{{strtoupper($t['status'])}}</b></span></td>
</tr>
<?php
						 }
?>
@else
<h3><em>No transactions on record.</em></h3>
@endif
</tbody>
</table>
</div>
</div>
</div>
@include('sidebar',['posts' => $posts])
</div>
@stop