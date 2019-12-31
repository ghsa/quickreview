@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            <span class="fa fa-exclamation-triangle margin-right" aria-hidden="true"></span>
            {!!  $error !!}
        </div>
    @endforeach
@endif

@if(session('success'))
    <div class="alert alert-success"><span class=" fa fa-check-circle margin-right" aria-hidden="true"></span> {!! session('success') !!}</div>
@endif
