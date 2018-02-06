@extends('layouts.skeleton')

@section('title', 'Create New Post')


@section('content')


<div class="wrapper">

		<label for="title">{{$post->title}} </label><br>

		<p>{{$post->text }} </p>

		<button type="button" class="btn btn-default btn-sm"> 
          <span class="glyphicon glyphicon-thumbs-up"></span> 5
        </button>

</div>




@endsection


