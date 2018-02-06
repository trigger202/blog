@extends('layouts.skeleton')

@section('title', 'Create New Post')


@section('content')


<div class="wrapper">

		<label for="title">{{$post->title}} </label><br>

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