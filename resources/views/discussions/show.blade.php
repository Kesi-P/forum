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

@auth
<div class="card">
  <div class="card-header">
    <p>Add Reply</p>
  </div>
  <div class="card-body">
    <form action="{{ route('replies.store', $discussions->slug)}}" method="post">
      @csrf
      <input type="hidden" name="reply" value="" id="reply">
      <trix-editor input="reply"></trix-editor><br>
      <button type="submit" name="button" class="btn btn-sm btn-primary"> Reply</button>
    </form>
  </div>
</div>
@else
<a href="{{route('login')}}" class="btn btn-sm btn-primary"> Sign in to add Reply</a>
@endauth
@endsection

@section('csssus')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
@endsection
@section('jssus')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
@endsection
