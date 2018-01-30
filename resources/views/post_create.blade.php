@extends('layouts.skeleton')

@section('title', 'Create New Post')


@section('content')


<div class="wrapper">

	<form action="/posts" method="Post">
		{{ CSRF_field() }}

		<input type="text" name="title" placeholder="Title"><br>

		<textarea name="text" rows="5" cols="20" placeholder="Text"></textarea><br>

		<button class="btn btn-success" type="submit">Save</button>



	</form>


</div>




@endsection


