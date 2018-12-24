@extends('layouts.app')

@section('content')
<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="title m-b-md">
            @if ($thread->id)
                Update existing thread
            @else
                Create a new thread
            @endif
        </div>
        <div class="panel-body">
            {!! Form::model($thread, [
            'method' => $thread->id ? 'PATCH' : 'POST' ,
            'route' =>  $thread->id  ? ['threads.update', $thread->id] : ['threads.store']
        ]) !!}
            {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $thread->id }}">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" placeholder="Enter thread title" name="title" value="{{ $thread->title }}">
                    @if ($errors->has('title'))
                        <span class="text-danger">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" rows="3" placeholder="Enter thread content" name="content">{{ $thread->content }}</textarea>
                    @if ($errors->has('content'))
                        <span class="text-danger">
                            <strong>{{ $errors->first('content') }}</strong>
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

