@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Create Content</div>
        <div class="card-body">
            @include('messages')
            {!! Form::model($content, ['route' => 'content.update', 'method' => 'put'] ) !!}
            {!! Form::hidden('id', $content->id) !!}
            @include('content.form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection
