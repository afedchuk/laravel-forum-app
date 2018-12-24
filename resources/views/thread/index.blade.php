@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="title m-b-md">
                Thread info
            </div>
            <div class="panel-body">
                <strong>Title:</strong> {{ $thread->title }}<br/>
                <strong>Content:</strong> {{ $thread->content }}
                <br/><br/>
                <h4>here you can see all thread replies:</h4>
                <br/>
                    <div class="list-group">
                    <?php $i=0; ?>
                    @foreach($thread->replies as $reply)
                            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start {{ $i!=0 ?: 'active'}}">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">{{ $reply->owner()->first()->email }}</h5>
                                    <small>{{ $reply->created_at }}</small>
                                </div>
                                <p class="mb-1">{{  $reply->body }}</p>
                            </a>
                            <?php $i++; ?>
                    @endforeach
                    </div>

                <br/>
                you can add your own reply on that thread
                <br/>
                {!! Form::model($threadReply, [
                    'method' => 'POST' ,
                    'route' =>  ['reply.store']
                ]) !!}
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="hidden" value="{{ $thread->id }}" name="thread_id">
                    <textarea class="form-control" rows="3" placeholder="Enter thread content" name="body">{{ $threadReply->body }}</textarea>
                    @if ($errors->has('body'))
                        <span class="text-danger">
                            <strong>{{ $errors->first('body') }}</strong>
                        </span>
                    @endif
                </div>
                {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
            <div>
            </div>
        </div>
    </div>
@endsection

