@extends('layouts.app')


@section('content')
{{ auth::user()->id }}

<!-- 		<form action="{{ route('messages.store') }}" method="post">
	<label for="msg"></label>
	<input type="text" name="msg" >

	<label for="msg"></label>
	<input type="numbers" name="sender">


	{{  @csrf_field() }}
	<button type="submit"></button>

</form> -->


@endsection


      