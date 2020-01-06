@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">

        @component('admin.components.breadcrumb')
            @slot('title') Редактирование Тэга @endslot
            @slot('parent') Главная @endslot
            @slot('active') Тэги @endslot
        @endcomponent

        <hr />

        <form class="form-horizontal" action="{{route('admin.category.update', $tag)}}" method="post">
            <input type="hidden" name="_method" value="put">
            {{ csrf_field() }}

            {{-- Form include --}}
            @include('admin.tags.partials.form')

        </form>
    </div>

@endsection

