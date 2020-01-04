@extends('layouts.app')

@section('content')

    @include('messages')
    <div id="app">
        @foreach($contents as $content)
            @include('content.content')
        @endforeach
    </div>
@endsection
@section('content-script')
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="/vendor/markdown.min.js"></script>
@endsection
