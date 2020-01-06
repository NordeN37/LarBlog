@extends('layouts.app')

@section('title', $category->title)

@section('content')
	
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
		@forelse ($articles as $article)
			<div class="panel panel-default">
				<div class="panel-heading"><h2><a href="{{route('article', $article->slug)}}">{{$article->title}}<hr>{{ $article->subtitle }}</a></h2></div>

				<div class="panel-body"><p>{!!$article->description_short!!}</p></div>
				<div class="panel-footer">
					<p>{{ $article->created_at }}</p>
				</div>
			</div>
		@empty
			<h2 class="text-center">Пусто</h2>
		@endforelse

		{{$articles->links()}}
			</div>
		</div>
	</div>

@endsection