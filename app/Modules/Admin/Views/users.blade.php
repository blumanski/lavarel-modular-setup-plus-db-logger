@extends('layouts.master')

@section('title')
	{{$title}}
@stop

@section('content')
    
    @foreach ($users as $user)
    	<ul>
    		<li>
    		{{$user['username']}}<br />
    		{{$user['firstname']}} {{$user['lastname']}}
    		</li>
    	</ul>
	@endforeach
    
@stop
