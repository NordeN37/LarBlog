@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            @foreach($articles as $article)
            <div class="panel panel-default">
                <div class="panel-heading"><a href="{{route('article', $article->slug)}}">{{ $article->title }}<hr>{{ $article->subtitle }}</a></div>
                <div class="panel-body">
                    <p>{!!$article->description_short!!}</p>
                </div>
                <div class="panel-footer">
                    <p>{{ $article->created_at }}</p>
                </div>
            </div>
        @endforeach
        </div>
    </div>
    {{$articles->links()}}
</div>
@endsection
