@extends('layout')

@section('title',"Send Money")

<?php
$caption = "Make a Transfer";
$imgg = "images/fff.jpg";
?>

@section('banner')
@include('generic-banner',['img' => $imgg,'caption'=>$caption])
@stop

@section('content')
 <div class="section">
        <div class="container">
            

@include('breadcrumb',['caption'=>$caption])

			    <div class="row">
				    <div class="col-md-8">
                        <h2>{{$caption}}</h2>
						
						
<form id="transfer-form">
   <input type="hidden" id="tk" value="{{csrf_token()}}">
   <div id="tvcHF05">
      <div class="Title">
         <h2 id="tvcHF05TitleId">Should I rent or buy?</h2>
      </div>
      <div class="Description">
         <p id="tvcHF05DescriptionId">This calculator compares the cost of renting versus the real cost of buying a home.</p>
         <p id="tvcAllFieldsRequiredId">All fields are required.</p>
      </div>
      <div class="ErrorSummary"> <br></div>
      <div class="InputContainer">
         <table id="tvcInputTable1" class="InputTable" role="presentation">
            <tbody>
               <tr>
                  <td colspan="2">
                     <h3>Rent Information</h3>
                  </td>
               </tr>
               <tr>
                  <td>
                     <p id="txtMONTHLYRENT"><label for="tvcMONTHLYRENT">Monthly rent</label></p>
                  </td>
                  <td>
                     <p><input title="Input for monthly rent" name="MONTHLYRENT" id="tvcMONTHLYRENT" type="text" required="required" value="$2,100.00" class="TextInput"></p>
                  </td>
               </tr>
               <tr>
                  <td>
                     <p id="txtRENTERSINSURANCE"><label for="tvcRENTERSINSURANCE">Monthly renter's insurance</label></p>
                  </td>
                  <td>
                     <p><input title="Input for renter's insurance" name="RENTERSINSURANCE" id="tvcRENTERSINSURANCE" type="text" required="required" value="$30.00" class="TextInput"></p>
                  </td>
               </tr>
               <tr>
                  <td>
                     <p id="txtRENTINCREASE"><label for="tvcRENTINCREASE">How much will rent increase each year?</label></p>
                  </td>
                  <td>
                     <p><input title="Input for rent increase" name="RENTINCREASE" id="tvcRENTINCREASE" type="text" required="required" value="3.000 %" class="TextInput"></p>
                  </td>
               </tr>
               <tr>
                  <td colspan="2"><br></td>
               </tr>
               <tr>
                  <td colspan="2">
                     <h3>Purchase Information</h3>
                  </td>
               </tr>
               <tr>
                  <td>
                     <p id="txtHOMECOST"><label for="tvcHOMECOST">Home price</label></p>
                  </td>
                  <td>
                     <p><input title="Input for home cost" name="HOMECOST" id="tvcHOMECOST" type="text" required="required" value="$350,000.00" class="TextInput"></p>
                  </td>
               </tr>
               <tr>
                  <td>
                     <p id="txtDOWNPAYMENT"><label for="tvcDOWNPAYMENT">Down payment</label></p>
                  </td>
                  <td>
                     <input title="Input for down payment" name="DOWNPAYMENT" id="tvcDOWNPAYMENT" type="text" required="required" value="20.000 %" onchange="javascript:PercentDollar_SelectType(this,DOWNPAYMENT_TYPE);" class="tvcPercentOrDollarInputClass">
                     <fieldset class="tvcFieldsetForRadioClass">
                        <legend id="tvcDOWNPAYMENT_Legend" class="tvcLegendForRadioClass">down payment as a percent or in dollars</legend>
                        <input class="tvcRadioClass" name="DOWNPAYMENT_TYPE" id="tvcDOWNPAYMENT_TYPE_Percent" value="Percent" checked="checked" type="radio"> <label for="tvcDOWNPAYMENT_TYPE_Percent" class="tvcRadioLabelClass">%</label> <input class="tvcRadioClass" name="DOWNPAYMENT_TYPE" id="tvcDOWNPAYMENT_TYPE_Dollar" value="Dollars" type="radio"> <label for="tvcDOWNPAYMENT_TYPE_Dollar" class="tvcRadioLabelClass">$ &nbsp;&nbsp;</label>
                     </fieldset>
                  </td>
               </tr>
               <tr>
                  <td>
                     <p id="txtINTERESTRATE"><label for="tvcINTERESTRATE">Interest rate</label></p>
                  </td>
                  <td>
                     <p><input title="Input for interest rate" name="INTERESTRATE" id="tvcINTERESTRATE" type="text" required="required" value="5.125 %" class="TextInput"></p>
                  </td>
               </tr>
               <tr>
                  <td>
                     <p id="txtLOANTERM"><label for="tvcLOANTERM">Loan Term</label></p>
                  </td>
                  <td>
                     <input title="Input for loan term" name="LOANTERM" id="tvcLOANTERM" type="text" required="required" value="30" class="tvcMonthsOrYearsInputClass">
                     <fieldset class="tvcFieldsetForRadioClass">
                        <legend id="tvcLOANTERM_Legend" class="tvcLegendForRadioClass">loan term in months or years</legend>
                        <input class="tvcRadioClass" name="LOANTERM_UNITS" id="tvcLOANTERM_UNITS_Months" value="Months" type="radio"> <label for="tvcLOANTERM_UNITS_Months" class="tvcRadioLabelClass">Months</label> <input class="tvcRadioClass" name="LOANTERM_UNITS" id="tvcLOANTERM_UNITS_Years" value="Years" checked="checked" type="radio"> <label for="tvcLOANTERM_UNITS_Years" class="tvcRadioLabelClass">Years</label>
                     </fieldset>
                  </td>
               </tr>
               <tr>
                  <td>
                     <p id="txtPOINTS"><label for="tvcPOINTS">Points</label></p>
                  </td>
                  <td>
                     <p><input title="Input for points" name="POINTS" id="tvcPOINTS" type="text" required="required" value="1.000 %" class="TextInput"></p>
                  </td>
               </tr>
               <tr>
                  <td>
                     <p id="txtFEES"><label for="tvcFEES">Closing cost for buying</label></p>
                  </td>
                  <td>
                     <input title="Input for fees" name="FEES" id="tvcFEES" type="text" required="required" value="$1,500.00" onchange="javascript:PercentDollar_SelectType(this,FEES_TYPE);" class="tvcPercentOrDollarInputClass">
                     <fieldset class="tvcFieldsetForRadioClass">
                        <legend id="tvcFEES_Legend" class="tvcLegendForRadioClass">fees as a percent or in dollars</legend>
                        <input class="tvcRadioClass" name="FEES_TYPE" id="tvcFEES_TYPE_Percent" value="Percent" type="radio"> <label for="tvcFEES_TYPE_Percent" class="tvcRadioLabelClass">%</label> <input class="tvcRadioClass" name="FEES_TYPE" id="tvcFEES_TYPE_Dollar" value="Dollars" checked="checked" type="radio"> <label for="tvcFEES_TYPE_Dollar" class="tvcRadioLabelClass">$ &nbsp;&nbsp;</label>
                     </fieldset>
                  </td>
               </tr>
               <tr>
                  <td colspan="2"><br></td>
               </tr>
               <tr>
                  <td colspan="2">
                     <h3>Home Information</h3>
                  </td>
               </tr>
               <tr>
                  <td>
                     <p id="txtPROPERTYTAX"><label for="tvcPROPERTYTAX">Annual property taxes</label></p>
                  </td>
                  <td>
                     <input title="Input for property tax" name="PROPERTYTAX" id="tvcPROPERTYTAX" type="text" required="required" value="1.250 %" onchange="javascript:PercentDollar_SelectType(this,PROPERTYTAX_TYPE);" class="tvcPercentOrDollarInputClass">
                     <fieldset class="tvcFieldsetForRadioClass">
                        <legend id="tvcPROPERTYTAX_Legend" class="tvcLegendForRadioClass">property tax as a percent or in dollars</legend>
                        <input class="tvcRadioClass" name="PROPERTYTAX_TYPE" id="tvcPROPERTYTAX_TYPE_Percent" value="Percent" checked="checked" type="radio"> <label for="tvcPROPERTYTAX_TYPE_Percent" class="tvcRadioLabelClass">%</label> <input class="tvcRadioClass" name="PROPERTYTAX_TYPE" id="tvcPROPERTYTAX_TYPE_Dollar" value="Dollars" type="radio"> <label for="tvcPROPERTYTAX_TYPE_Dollar" class="tvcRadioLabelClass">$ &nbsp;&nbsp;</label>
                     </fieldset>
                  </td>
               </tr>
               <tr>
                  <td>
                     <p id="txtMONTHLYMAINTENANCE"><label for="tvcMONTHLYMAINTENANCE">Average monthly maintenance</label></p>
                  </td>
                  <td>
                     <p><input title="Input for monthly maintenance" name="MONTHLYMAINTENANCE" id="tvcMONTHLYMAINTENANCE" type="text" required="required" value="$125.00" class="TextInput"></p>
                  </td>
               </tr>
               <tr>
                  <td>
                     <p id="txtHOMEOWNERSINSURANCE"><label for="tvcHOMEOWNERSINSURANCE">Monthly homeowner's insurance</label></p>
                  </td>
                  <td>
                     <p><input title="Input for homeowner's insurance" name="HOMEOWNERSINSURANCE" id="tvcHOMEOWNERSINSURANCE" type="text" required="required" value="$100.00" class="TextInput"></p>
                  </td>
               </tr>
               <tr>
                  <td>
                     <p id="txtHOMEAPPRECIATION"><label for="tvcHOMEAPPRECIATION">How much will your home appreciate each year?</label></p>
                  </td>
                  <td>
                     <p><input title="Input for home appreciation" name="HOMEAPPRECIATION" id="tvcHOMEAPPRECIATION" type="text" required="required" value="4.000 %" class="TextInput"></p>
                  </td>
               </tr>
               <tr>
                  <td>
                     <p id="txtASSOCIATIONDUES"><label for="tvcASSOCIATIONDUES">Other monthly costs<br><small>(Association dues, etc...)</small></label></p>
                  </td>
                  <td>
                     <p><input title="Input for association dues" name="ASSOCIATIONDUES" id="tvcASSOCIATIONDUES" type="text" required="required" value="$50.00" class="TextInput"></p>
                  </td>
               </tr>
               <tr>
                  <td colspan="2"><br></td>
               </tr>
               <tr>
                  <td colspan="2">
                     <h3>Personal Information</h3>
                  </td>
               </tr>
               <tr>
                  <td>
                     <p id="txtSTATEANDFEDERALTAX"><label for="tvcSTATEANDFEDERALTAX">State and Federal tax rate</label></p>
                  </td>
                  <td>
                     <p><input title="Input for state and federal tax rate" name="STATEANDFEDERALTAX" id="tvcSTATEANDFEDERALTAX" type="text" required="required" value="25.000 %" class="TextInput"></p>
                  </td>
               </tr>
               <tr>
                  <td>
                     <p id="txtINVESTMENTRATEOFRETURN"><label for="tvcINVESTMENTRATEOFRETURN">Investment rate of return<br><small>(or bank account savings rate)</small></label></p>
                  </td>
                  <td>
                     <p><input title="Input for investment rate of return" name="INVESTMENTRATEOFRETURN" id="tvcINVESTMENTRATEOFRETURN" type="text" required="required" value="2.300 %" class="TextInput"></p>
                  </td>
               </tr>
               <tr>
                  <td>
                     <p id="txtLENGTHOFSTAY"><label for="tvcLENGTHOFSTAY">How long will you stay in this property?</label></p>
                  </td>
                  <td>
                     <input title="Input for length of stay" name="LENGTHOFSTAY" id="tvcLENGTHOFSTAY" type="text" required="required" value="5" class="tvcMonthsOrYearsInputClass">
                     <fieldset class="tvcFieldsetForRadioClass">
                        <legend id="tvcLENGTHOFSTAY_Legend" class="tvcLegendForRadioClass">length of stay in months or years</legend>
                        <input class="tvcRadioClass" name="LENGTHOFSTAY_UNITS" id="tvcLENGTHOFSTAY_UNITS_Months" value="Months" type="radio"> <label for="tvcLENGTHOFSTAY_UNITS_Months" class="tvcRadioLabelClass">Months</label> <input class="tvcRadioClass" name="LENGTHOFSTAY_UNITS" id="tvcLENGTHOFSTAY_UNITS_Years" value="Years" checked="checked" type="radio"> <label for="tvcLENGTHOFSTAY_UNITS_Years" class="tvcRadioLabelClass">Years</label>
                     </fieldset>
                  </td>
               </tr>
               <tr>
                  <td colspan="2"><br></td>
               </tr>
               <tr>
                  <td colspan="2">
                     <h3>Sale Information</h3>
                  </td>
               </tr>
               <tr>
                  <td>
                     <p id="txtAGENTCOMMISSION"><label for="tvcAGENTCOMMISSION">Real estate agent commission</label></p>
                  </td>
                  <td>
                     <input title="Input for agent commission" name="AGENTCOMMISSION" id="tvcAGENTCOMMISSION" type="text" required="required" value="6.000 %" onchange="javascript:PercentDollar_SelectType(this,AGENTCOMMISSION_TYPE);" class="tvcPercentOrDollarInputClass">
                     <fieldset class="tvcFieldsetForRadioClass">
                        <legend id="tvcAGENTCOMMISSION_Legend" class="tvcLegendForRadioClass">agent commission as a percent or in dollars</legend>
                        <input class="tvcRadioClass" name="AGENTCOMMISSION_TYPE" id="tvcAGENTCOMMISSION_TYPE_Percent" value="Percent" checked="checked" type="radio"> <label for="tvcAGENTCOMMISSION_TYPE_Percent" class="tvcRadioLabelClass">%</label> <input class="tvcRadioClass" name="AGENTCOMMISSION_TYPE" id="tvcAGENTCOMMISSION_TYPE_Dollar" value="Dollars" type="radio"> <label for="tvcAGENTCOMMISSION_TYPE_Dollar" class="tvcRadioLabelClass">$ &nbsp;&nbsp;</label>
                     </fieldset>
                  </td>
               </tr>
               <tr>
                  <td>
                     <p id="txtCLOSINGFEES"><label for="tvcCLOSINGFEES">Closing cost for selling</label></p>
                  </td>
                  <td>
                     <input title="Input for closing fees" name="CLOSINGFEES" id="tvcCLOSINGFEES" type="text" required="required" value="$2,000.00" onchange="javascript:PercentDollar_SelectType(this,CLOSINGFEES_TYPE);" class="tvcPercentOrDollarInputClass">
                     <fieldset class="tvcFieldsetForRadioClass">
                        <legend id="tvcCLOSINGFEES_Legend" class="tvcLegendForRadioClass">closing fees as a percent or in dollars</legend>
                        <input class="tvcRadioClass" name="CLOSINGFEES_TYPE" id="tvcCLOSINGFEES_TYPE_Percent" value="Percent" type="radio"> <label for="tvcCLOSINGFEES_TYPE_Percent" class="tvcRadioLabelClass">%</label> <input class="tvcRadioClass" name="CLOSINGFEES_TYPE" id="tvcCLOSINGFEES_TYPE_Dollar" value="Dollars" checked="checked" type="radio"> <label for="tvcCLOSINGFEES_TYPE_Dollar" class="tvcRadioLabelClass">$ &nbsp;&nbsp;</label>
                     </fieldset>
                  </td>
               </tr>
            </tbody>
         </table>
         <p><input name="COMPUTE" type="submit" id="COMPUTE" value="COMPUTE" onclick="this.form.method = 'get'; remove_nonTVCElements(this.form);"></p>     
      </div>
      <div class="ErrorContainer"> <br> </div>

      <p> <input name="CALCULATORID" type="hidden" id="txt_CALCULATORID" value="HF05"></p>
   </div>
</form>
</div>
@include('sidebar',['posts' => $posts])
</div>
@stop