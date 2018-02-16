@extends('layouts.skeleton')

@section('content')

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<a href="/posts"><button class="btn btn-primary btn-lg">Return To Posts</button></a>
<h2>Edit Post</h2>
<hr>
@isset($post)
<form method="post" action="/posts/{{$post->id}}" >
	{{ method_field('patch') }}
	{{ CSRF_field() }}
	<input type="text" name="title" value="{{$post->title}}"><br>
	<textarea name="post_text" rows="10" class="post">{{ $post->text }}</textarea><br>

	<button type="submit" class="btn btn-success">Update</button>

</form>
@endisset

@endsection

