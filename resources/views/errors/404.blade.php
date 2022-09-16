<?php
$user = null;
$caption = "Not Found";
?>

@extends('layout')

@section('title',"Not Found")

@section('banner')
@include('generic-banner',['img' => "images/photo_interactivebankerincallcenter_color_muted_1920x600.jpg",'caption'=>$caption])
@stop

@section('content')
    <div class="section">
        <div class="container">
            

@include('breadcrumb',['caption'=>$caption])

		<p><span>Sorry the page you are looking for has moved, or does not exist.</span></p>
        </div>
    </div>



@stop