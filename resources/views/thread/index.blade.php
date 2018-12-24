@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="title m-b-md">
                Thread info
            </div>
            <div class="panel-body">
                {{ $thread->title }}<br/>
                {{ $thread->content }}
            </div>
            <div>
            </div>
        </div>
    </div>
@endsection

