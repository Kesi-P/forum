@extends('layouts.app')

@section('content')


<div class="container">

            <div class="card">
                <div class="card-header">Add Discussion</div>

                <div class="card-body">
                  <form action="{{ route('discussion.store')}} " method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" name="title" class="form-control" value="">

                    </div>
                    <div class="form-group">
                      <label for="content">Content</label>
                      <input id="content" type="hidden" name="content">
                      <trix-editor input="content"></trix-editor>

                      <textarea class="form-control" name="content" id="content" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="channel">Channel</label>
                      <select class="form-control" id="channel" name="channel">
                        @foreach($channels as $channel)
                        <option value="{{ $channel->id }}">{{ $channel->name }}</option>
                        @endforeach
                      </select>
                    </div>
                    <button type="submit" class="btn btn-success" name="button">Create Discussion</button>
                  </form>

                </div>
            </div>

</div>
@endsection

@section('csssus')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
@endsection
@section('jssus')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
@endsection
