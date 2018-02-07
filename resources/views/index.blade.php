@extends('layouts.skeleton')

@section('title', 'Blogs')


@section('content')

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif


<h2>Your Posts</h2>
<hr>
@foreach($blogList as $blog)
		<h2> <a href="/posts/{{$blog->id}}">{{ $blog->title }} - {{ $blog->id }} </a> </h2>

		<a href="/posts/{{$blog->id}}/edit"><button class="btn btn-info">Edit Post</button></a>
		<a href="/posts/{{$blog->id}}/delete"><button class="btn btn-danger">Delete Post</button></a>

		@isset($blog->user->name)
			<h4> Author: {{ $blog->user->name }}
		@endisset
		<p>{{ $blog->text }}</p>

@endforeach

@endsection


