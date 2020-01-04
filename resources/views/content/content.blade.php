<div class="card mb-3">
    <div class="card-header">
        <badge  class="badge badge-info">{{$content->category->name}}</badge> {{$content->title}}
       <span style="float: right"><mark-review-component :content_id="{{$content->id}}" /></span>
    </div>
    <div class="card-body">
        {!! $content->content !!}
        <a href="{{route('content.edit', ['id' => $content->id])}}"><i class="fas fa-edit"></i></a>
    </div>
</div>
