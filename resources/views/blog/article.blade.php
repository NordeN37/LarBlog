@extends('layouts.app')



@section('content')
	<div class="container">
	<div class="row">

		<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">{{ $article->title }}<hr>{{ $article->subtitle }}</div>
					<div class="panel-body">
						<p>{!!$article->description_short!!}</p>
					</div>
					<div class="panel-footer">
						<p>{{ $article->created_at }}</p>
					</div>
				</div>
		</div>
	</div>
	</div>
@endsection