@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Create Category</div>
        <div class="card-body">
            @include('messages')
            <table class="table table-hover table-dashed table-bordered">
                <thead>
                <tr>
                    <th>
                        Name
                    </th>
                    <th>

                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>
                            {{$category->name}}
                        </td>
                        <td>
                            <a href="{{route('category.edit', ['id' => $category->id])}}" class="btn btn-sm btn-primary">Edit</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
