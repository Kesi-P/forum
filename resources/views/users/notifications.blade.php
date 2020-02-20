@extends('layouts.app')

@section('content')


<div class="container">

            <div class="card">
                <div class="card-header">Notifications</div>

                <div class="card-body">
                  <ul class="list-group">


                  @foreach ($notifications as $notification)
                <li class="list-group-item">
                  @if($notification->type === 'App\Notifications\NewReply')
                  New Reply

                  <a href="{{route('discussion.show',$notification->data['discussion']['slug'])}}" class="btn float-right btn-sm btn-info">View</a>
                  @endif
                </li>
                  @endforeach

                  </ul>
                </div>
            </div>

</div>
@endsection
