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
        <hr>
        @if($discussions->bestReply)
        <div class="card text-white bg-primary" >
          <div class="card-header">
            <img width="20px" height="20px" style="border-radius: 50%" src="{{ Gravatar::src($discussions->bestReply->owner->email)}}" alt="">
            Has a best reply</div>
          <div class="card-body">
            <p class="card-text">
              {{$discussions->bestReply->owner->name}}
              <hr>
              {!! $discussions->bestReply->content !!}</p>
          </div>
        </div>


        @endif
    </p>
  </div>
</div>


@auth
<div class="card">
  <div class="card-header">
    <p>Add Reply</p>
  </div>
  <div class="card-body">
    @foreach ($discussions->replies()->paginate(2) as $reply)
    <img width="20px" height="20px" style="border-radius: 50%" src="{{Gravatar::src($reply->owner->email)}}" alt="">
    <p>{!! $reply->owner->name !!}</p>
    <p>{!! $reply->content !!}</p>
    <p>{!! $reply->created_at !!}</p>

    @if(auth()->user()->id === $discussions->user_id)
    <form class="" action="{{route('discussions.best-reply', ['discussion' => $discussions->slug, 'reply' => $reply->id])}}" method="post">
      @csrf
      <button type="submit" name="button" class="btn btn-sm btn-primary">Mark as best</button>
    </form>
    <br><br>
    @endif

    @endforeach
      {{ $discussions->replies()->paginate(2)->links() }}
    <form action="{{ route('replies.store', $discussions->slug)}}" method="POST">
      @csrf
      <input id="content" type="hidden" name="content">
      <trix-editor input="content" name="content" id="content"></trix-editor>
      <button type="submit" class="btn btn-sm btn-primary"> Reply</button>
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
