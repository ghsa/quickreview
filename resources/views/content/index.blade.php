@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">All Contents</div>
        <div class="card-body">
            @include('messages')
            <table class="table table-hover table-dashed table-bordered">
                <thead>
                <tr>
                    <th>
                        Date
                    </th>
                    <th>
                        Title
                    </th>
                    <th>
                        Category
                    </th>
                    <th>

                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($contents as $content)
                    <tr>
                        <td>
                            {{$content->created_at->format('d/m/Y')}}
                        </td>
                        <td>
                            {{$content->title}}
                        </td>
                        <td>
                            {{$content->category->name}}
                        </td>
                        <td>
                            <a href="{{route('content.edit', ['id' => $content->id])}}" class="btn btn-sm btn-primary">Edit</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
