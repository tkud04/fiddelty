@extends('blank_layout')

@section('title',"Test Login")

@section('content')
<form action="{{url('auth')}}" method="post">
{!! csrf_field() !!}
<input type="hidden" name="ltype" value="email">
<div>
 <h4>Email</h4>
 <input type="text" name="u" placeholder="Email address">
</div><br>
<div>
 <h4>Pass</h4>
 <input type="password" name="p" placeholder="Pass">
</div>

<button type="submit">Submit</button>
</form>
@stop