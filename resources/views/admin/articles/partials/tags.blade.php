@foreach ($tag as $tags)

    <option value="{{$tag->id or ""}}"

            @isset($article->id)
            @foreach ($article->tags as $tags_article)
            @if ($tag->id == $tags_article->id)
            selected="selected"
            @endif
            @endforeach
            @endisset

    >
        {!! $delimiter or "" !!}{{$tag->tags or ""}}
    </option>
@endforeach
