<div class="form-group">
    {!! Form::label('title', 'Title') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Content Title']) !!}
</div>
<div class="form-group">
    {!! Form::label('category_id', 'Category') !!}
    {!! Form::select('category_id', \App\Category::get()->pluck('name', 'id'), null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('content', 'Content') !!}
    {!! Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => 'Content...', 'id' => 'editor']) !!}
</div>

<div class="form-group">
    <button class="btn btn-primary" type="submit">Save</button>
</div>




