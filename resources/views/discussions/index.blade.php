@extends('layouts.app')

@section('content')


@foreach($discussions as $discussion)
<div class="card">
  <div class="card-header">
    <img src="{{ Gravatar::src($discussion->sus->email) }}" alt="">
    {{ $discussion->title}}
  </div>

  <div class="card-body">
    {!! $discussion->content !!}
  </div>
</div>
@endforeach
{{ $discussions->links()}}
@endsection
