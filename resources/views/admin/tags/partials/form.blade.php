<label for="">Статус</label>
<select class="form-control" name="published">
</select>

<label for="">Наименование</label>
<input type="text" class="form-control" name="title" placeholder="Заголовок категории" value="{{$tag->title or ""}}" required>

<label for="">Родительская категория</label>
<select class="form-control" name="parent_id">
    <option value="0">-- без родительской категории --</option>
    @include('admin.tags.partials.categories', ['tags' => $tags])
</select>

<hr />

<input class="btn btn-primary" type="submit" value="Сохранить">

