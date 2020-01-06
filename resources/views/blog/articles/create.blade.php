@extends('layouts.app')

@section('content')

    <div class="container">

        @component('blog.components.breadcrumb')
            @slot('title') Создание новости @endslot
            @slot('parent') Главная @endslot
            @slot('active') Новости @endslot
        @endcomponent

        <hr />

        <form class="form-horizontal" action="{{route('user.article.store')}}" method="post">
            {{ csrf_field() }}

            {{-- Form include --}}
            @include('blog.articles.partials.form')

            <input type="hidden" name="created_by" value="{{Auth::id()}}">
        </form>
    </div>

@endsection
