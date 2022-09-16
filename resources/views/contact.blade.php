@extends('layout')

@section('title',"Contact Us")

<?php
$caption = "Contact Us";
?>

@section('banner')
@include('generic-banner',['img' => "images/photo_interactivebankerincallcenter_color_muted_1920x600.jpg",'caption'=>$caption])
@stop

@section('content')
    <div class="section">
        <div class="container">
            

@include('breadcrumb',['caption'=>$caption])

			    <div class="row">
				    <div class="col-md-8">
                        <h2>{{$caption}}</h2>
                        


<style type="text/css">
body .EPiServerForms .Form__Status .Form__Success__Message{background-color:#ededed!important}
</style>


<form method="post" action="{{url('contact')}}" enctype="multipart/form-data" class="EPiServerForms ValidationSuccess" id="contact-form">
   <input type="hidden" id="tk" value="{{csrf_token()}}">
   <aside class="Form__Description">To send a secure e-mail message to Fidelity Bank, choose from the drop-down list below. After selecting a department, fill out this form and click the &quot;Send Message&quot; button below. Please be sure to include a phone number and a time when you can be reached.</aside>
   <div class="Form__Status">
      <div class="well Form__Status__Message hide" data-f-form-statusmessage>
      </div>
   </div>
   <div data-f-mainbody class="Form__MainBody">
      <section id="__field_" data-f-type="step" data-f-element-name="__field_" class="Form__Element FormStep Form__Element--NonData " data-f-stepindex="0" data-f-element-nondata>
         <!-- Each FormStep groups the elements below it til the next FormStep -->
         <div class="form-group Form__Element FormSelection  ValidationRequired" data-epiforms-element-name="recipient">
            <label for="fed20231-9f3b-487e-bd94-c84cc4f3637f" class="control-label">Send To:</label>
            <select class="form-control" name="recipient" id="fed20231-9f3b-487e-bd94-c84cc4f3637f"  required>
               <option value="none">Select a recipient</option>
               <option value="Customer Service"  >Customer Service</option>
               <option value="Mortgage Loan Servicing"  >Mortgage Loan Servicing</option>
               <option value="Consumer Loan Servicing"  >Consumer Loan Servicing</option>
               <option value="Online &amp; Mobile Banking Services"  >Online &amp; Mobile Banking Services</option>
               <option value="Treasury Services"  >Treasury Services</option>
               <option value="Private Banking"  >Private Banking</option>
               <option value="37th &amp; Woodlawn Branch - 3641 N Woodlawn"  >37th &amp; Woodlawn Branch - 3641 N Woodlawn</option>
               <option value="Bradley Fair Branch - 2111 N Bradley Fair Parkway"  >Bradley Fair Branch - 2111 N Bradley Fair Parkway</option>
               <option value="Cherry Creek Branch - 7711 East Harry"  >Cherry Creek Branch - 7711 East Harry</option>
               <option value="Crestview Branch - 12715 E Central"  >Crestview Branch - 12715 E Central</option>
               <option value="Derby Branch - 2542 North Rock Road"  >Derby Branch - 2542 North Rock Road</option>
               <option value="Downtown Main Office - 100 E English"  >Downtown Main Office - 100 E English</option>
               <option value="East Harry Branch - 3525 E Harry"  >East Harry Branch - 3525 E Harry</option>
               <option value="Metcalf Branch - 14435 Metcalf Avenue - Suite 100"  >Metcalf Branch - 14435 Metcalf Avenue, Suite 100</option>
               <option value="NewMarket Square Branch - 2251 N Maize Road"  >NewMarket Square Branch - 2251 N Maize Road</option>
               <option value="Northwest Branch - 8442 W 13th Street"  >Northwest Branch - 8442 W 13th Street</option>
               <option value="South Seneca Branch - 3128 South Seneca"  >South Seneca Branch - 3128 South Seneca</option>
               <option value="Twin Lakes Branch - 2265 North Amidon"  >Twin Lakes Branch - 2265 North Amidon</option>
               <option value="Westlink Branch - 9300 W Central"  >Westlink Branch - 9300 W Central</option>
               <option value="Woodlawn Branch - 1306 N Woodlawn"  >Woodlawn Branch - 1306 N Woodlawn</option>
            </select>
            <span class="error Form__Element__ValidationError hh" id="error-recipient" data-f-validationerror="" >Select a recipient</span>
         </div>
         <div class="Form__Element form-group FormTextbox ValidationRequired" data-f-element-name="name" data-f-type="textbox">    
		 <label for="700a080c-cf6e-486a-81ab-a3053891b46b" class="Form__Element__Caption">Full Name:</label>
            <input name="name" id="700a080c-cf6e-486a-81ab-a3053891b46b" type="text" class="form-control FormTextbox__Input"  required />
            <span class="error Form__Element__ValidationError hh" id="error-name" data-f-validationerror="" >Enter your full name</span>
         </div>
         <div class="Form__Element form-group FormTextbox ValidationRequired" data-f-element-name="email" data-f-type="textbox">     
		 <label for="89919c03-5e3c-4272-b6e7-02c9e344e105" class="Form__Element__Caption">Email Address:</label>
            <input name="email" id="89919c03-5e3c-4272-b6e7-02c9e344e105" type="text" class="form-control FormTextbox__Input"
               placeholder="example@example.com"  required />
            <span class="error Form__Element__ValidationError hh" id="error-email" data-f-validationerror="" >Enter your email address</span>
         </div>
         <div class="Form__Element form-group FormTextbox ValidationRequired" data-f-element-name="phone" data-f-type="textbox">    
		 <label for="9a4a7133-1841-4f46-90c0-1cf1e5ca98e5" class="Form__Element__Caption">Phone Number:</label>
            <input name="phone" id="9a4a7133-1841-4f46-90c0-1cf1e5ca98e5" type="text" class="form-control FormTextbox__Input"
               placeholder="xxx-xxx-xxxx"  required />
            <span class="error Form__Element__ValidationError hh" id="error-phone" data-f-validationerror="" >Enter your phone number</span>
         </div>
         <div class="Form__Element form-group FormTextbox ValidationRequired" data-f-element-name="call-time" data-f-type="textbox">  
		 <label for="c0afcc49-340e-469e-9ba2-f5ac8c1f9673" class="Form__Element__Caption">Best Time to Call:</label>
            <input name="call-time" id="c0afcc49-340e-469e-9ba2-f5ac8c1f9673" type="text" class="form-control FormTextbox__Input"  required />
            <span class="error Form__Element__ValidationError hh" id="error-call-time" data-f-validationerror="" >Give us the best time to call you</span>
         </div>
         <div class="Form__Element form-group FormTextbox ValidationRequired" data-f-element-name="subject" data-f-type="textbox">     
		 <label for="4e2cfcc9-2f0d-475c-accf-ef5774f2212e" class="Form__Element__Caption">Subject:</label>
            <input name="subject" id="4e2cfcc9-2f0d-475c-accf-ef5774f2212e" type="text" class="form-control FormTextbox__Input"  title="Enter a subject" required />
            <span class="error Form__Element__ValidationError hh" id="error-subject" data-f-validationerror="" >Subject is required</span>
         </div>
         <div class="form-group Form__Element FormTextbox FormTextbox--Textarea ValidationRequired" data-epiforms-element-name="message">
            <label for="49faf1e8-98c9-4186-a22e-eab2399deff8" class="control-label">Message:</label>
            <textarea name="message" 
               id="49faf1e8-98c9-4186-a22e-eab2399deff8" 
               class="form-control FormTextbox__Input" 
               placeholder="Please write your message here." 
               data-epiforms-label="Message:"
               required 
               rows="5"></textarea>
            <span id="error-message" class="error Form__Element__ValidationError hh">Message is required</span>
         </div>
         <div class="Form__Element Form__CustomElement FormRecaptcha" data-epiforms-element-name="__field_5572" data-epiforms-sitekey="6LfQezYUAAAAANpiqFUQqcBx0OeknSl5lN784eX2" id="11702e7d-0efb-4054-b6c4-5954c6e3b74e">
            <div class="recaptcha-container">
               <div class="g-recaptcha" data-sitekey="6LfQezYUAAAAANpiqFUQqcBx0OeknSl5lN784eX2"></div>
               <span data-epiforms-linked-name="__field_5572"
                  class="Form__Element__ValidationError"
                  style="display:none;">
               </span>
            </div>
         </div>
         <button id="contact-submit" name="submit" type="submit" value="2e69f4c3-8415-417f-9a63-f10744289a6c" data-epiforms-is-finalized="false"
            data-epiforms-is-progressive-submit="true"
            class="Form__Element FormExcludeDataRebind FormSubmitButton btn btn--primary "
            >
         Submit</button>
		 <div class="Form__Element hh" id="contact-loading">
            <img src="images/loading.gif" alt="Sending..">
			<span>Sending your message..</span>
         </div>
      </section>
   </div>
</form>
</div>
<div class="col-md-4 sidebar">
   <div>
      <h3>Fidelity Bank</h3>
      <p><b>Report a lost or stolen ATM or VISA check card:<br /></b>1.800.966.2951<br /><br /><strong>Contact our retail banking customer care center:</strong><br />1.800.658.1637<br />Monday - Friday, 7:30 A.M. - 8:00 P.M. CT<br />Saturday, 9:00 A.M. - 5:00 P.M. CT</p>
      <p><strong>For questions, error resolution or information requests concerning existing consumer loans send correspondence to:</strong><br />ATTN: Consumer Loan Servicing<br />Fidelity Bank<br /><span style="letter-spacing: 0.2px;">P.O. Box 3377<br /></span>Wichita, KS 67201</p>
      <p><strong>Send mortgage loan servicing correspondence to:</strong><br />ATTN: Loan Servicing Department<br />Fidelity Bank<br />P.O. Box 1007<br />Wichita, KS 67201</p>
      <p>Mortgage customer service: 1.800.304.6161<br />Monday - Friday, 8:00 A.M. - 5:00 P.M. CT</p>
   </div>
</div>
</div>
</div>
</div>
@stop