@extends('layout')

@section('title',"Dashboard")

<?php
$caption = "Dashboard";
?>

@section('banner')
@include('generic-banner',['img' => "images/photo_commercialcable_color_muted_1920x1080.jpg",'caption'=>$caption])
@stop

@section('content')
    <div class="section">
        <div class="container">
            

@include('breadcrumb',['caption'=>$caption])

			    <div class="row">
				    <div class="col-md-8">
                        <h2>{{$caption}}</h2>
						
					<?php
					if(count($accounts) > 0)
					{
					foreach($accounts as $a)
					{
					 $acname = $a['name'];
					 $actype = $a['type'];
					 $amount = $a['amount'];
					 $status = $a['status'];
					
					?>
<div class="accordion">
   <button aria-controls="accordion1907{{$a['id']}}" aria-expanded="false" class="accordion__header" data-target="#accordion1907{{$a['id']}}" data-toggle="collapse" type="button">
   {{$acname}}: ${{number_format($amount,2)}}<span class="icon-plus-circle"></span><span class="icon-minus-circle"></span>
   </button>
   <div aria-expanded="false" class="collapse in" id="accordion1907{{$a['id']}}" style="">
      <div class="accordion__body">
         <div>
            <h4>Account type: <a class="btn btn--primary" href="javascript:void(0)">{{$actype}}</a></h4>
            <h4>Account balance: <a class="btn btn--primary" href="javascript:void(0)">${{number_format($amount,2)}}</a></h4>
            <h4>Last transaction: <a class="btn btn--primary" href="javascript:void(0)">{{$a['date']}}</a></h4>
            <h4>Status: <a class="btn btn--primary" href="javascript:void(0)">{{strtoupper($status)}}</a></h4>
         </div>
      </div>
   </div>
</div>
					<?php
					}
					}
					?>
                     </div>
@include('sidebar',['posts' => $posts])
</div>
@stop
