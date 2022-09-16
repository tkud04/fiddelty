<?php
$user = null;
$caption = "A Technical Error has Occured";
?>

@extends('layout')

@section('title',"Server Error")

@section('banner')
@include('generic-banner',['img' => "images/photo_interactivebankerincallcenter_color_muted_1920x600.jpg",'caption'=>$caption])
@stop

@section('content')
    <div class="section">
        <div class="container">
            

@include('breadcrumb',['caption'=>$caption])

		<p><span>Not to worry, it's nothing serious. We are already working on it as you read this.</span></p>
        </div>
    </div>



@stop