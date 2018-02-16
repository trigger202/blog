@extends('layouts.skeleton')

@section('title', 'Create New Post')


@section('content')

<div class="wrapper">

		@if (session('status'))
		    <div class="alert alert-success">
		        {{ session('status') }}
		    </div>
		@endif


		<a href="/posts"><button class="btn btn-primary btn-lg">Return To Posts</button></a><br>

		<h2 for="title">{{$post->title}} </h2><br>

		<p>{{$post->text }} </p>


		<h3>Comments</h3>

		@foreach($post->comments  as $comment)
			<p> {{ $comment->comment}} </p>

		@endforeach

        <form action="/posts/reaction" class="form-group" method="POST">
        	{{ CSRF_field() }}
        	<label for="Comment">Comment:</label>
        	<textarea class="form-control" name="comment"></textarea>
        	<input type="hidden" name="like" value="0" id="likeCount">
        	<input type="hidden" name="postID" value="{{$post->id}}" id="likeCount" readonly>


			<button type="button" class="btn btn-default btn-sm" id="like"> 
	          <span class="glyphicon glyphicon-thumbs-up"></span> 5
	        </button><br>

	        <button type="submit">send</button>
        </form>




</div>







<script type="text/javascript">
	
	$('#like').click(function() 
	{
		$('#likeCount').val(1);
		var count = $('#likeCount').val();
	});

</script>

@endsection