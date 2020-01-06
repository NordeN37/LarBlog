@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="jumbotron text-center">
                    <a href="{{route('user.article.index')}}"><p><span class="label label-primary">Материал {{$count_articles}}</span></p></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <a class="btn btn-block btn-default" href="{{route('user.article.create')}}">Создать материал</a>
                @foreach ($articles as $article)
                    <a class="list-group-item" href="{{route('user.article.edit', $article)}}">
                        <h4 class="list-group-item-heading">{{$article->title}}</h4>
                        <p class="list-group-item-text">
                            {{$article->categories()->pluck('title')->implode(', ')}}
                        </p>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
