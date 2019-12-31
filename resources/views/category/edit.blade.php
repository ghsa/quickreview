@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Create Category</div>
        <div class="card-body">
            @include('messages')
            {!! Form::model($category, ['route' => 'category.update', 'method' => 'put'] ) !!}
            {!! Form::hidden('id', $category->id) !!}
            @include('category.form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection
