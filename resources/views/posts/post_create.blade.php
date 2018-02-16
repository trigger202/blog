@extends('layouts.skeleton')

@section('title', 'Create New Post')


@section('content')


<div class="wrapper">

	<form action="/posts" method="Post" class="form-group">
		{{ CSRF_field() }}
		<label for="title">Title:</label>
		<input type="text" name="title" placeholder="Title" class="form-control"><br>
		<label for="Body">Body:</label>

		<textarea name="text" rows="5" cols="20" placeholder="Text" class="form-control"></textarea><br>
		<button class="btn btn-success" type="submit">Save</button>
	</form>


</div>




@endsection


