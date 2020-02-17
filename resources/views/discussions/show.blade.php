@extends('layouts.app')

@section('content')


<div class="card">
  <div class="card-header">
    <div class="d-flex justify-content-between">
      <div >
        <img width="40px" height="40px" style="border-radius: 50%" src="{{ Gravatar::src($discussions->sus->email) }}" alt="">
        <span><small>{{ $discussions->sus->name}}</small></span>
      </div>

    </div>
  </div>

  <div class="card-body">
    <p>
      <b>{{ $discussions->title}}</b>
        <hr>
        {!! $discussions->content !!}
    </p>    
  </div>
</div>

@endsection
