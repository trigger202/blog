@extends('layouts.skeleton')

@section('title', 'Blogs')


@section('content')

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif


<h2>All active users</h2>
@foreach($blogList as $blog)
		<h2>{{ $blog->title }} - {{ $blog->id }}  </h2>
		@isset($blog->user->name)
			<h4> Author: {{ $blog->user->name }}
		@endisset
		<p>{{ $blog->text }}</p>

@endforeach

@endsection


