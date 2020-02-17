@extends('layouts.app')

@section('content')


@foreach($discussions as $discussion)
<div class="card">
  <div class="card-header">
    <div class="d-flex justify-content-between">
      <div >
        <img width="40px" height="40px" style="border-radius: 50%" src="{{ Gravatar::src($discussion->sus->email) }}" alt="">
        <span><small>{{ $discussion->sus->name}}</small></span>
      </div>
      <div>
        <a href="{{ route('discussion.show' ,$discussion->slug)}}" class="btn btn-success btn-sm">View</a>
      </div>
    </div>
  </div>

  <div class="card-body">
      <b>{{ $discussion->title}}</b>
  </div>
</div>
@endforeach
{{ $discussions->links()}}
@endsection
