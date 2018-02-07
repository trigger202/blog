@extends('layouts.skeleton')

@section('content')

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif


<h2>Edit Post</h2>
<hr>
@isset($post)
<form method="post" action="/posts/{{$post->id}}" >
	{{ method_field('patch') }}
	{{ CSRF_field() }}
	<input type="text" name="title" value="{{$post->title}}"><br>
	<textarea name="post_text" rows="10" class="post">{{ $post->text }}</textarea>

	<button type="submit">Update</button>

</form>
@endisset

@endsection

