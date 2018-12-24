@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="title m-b-md">
                        User Profile
                    </div>
                    <div class="panel-body">
                        Welcome, Dear Captain <b>({{ $user->email }})</b><br/>
                        here you can update your profile infomation
                        <br/><br/><br/>
                        If you want to manage your threads please follow <a href="{{ url('/threads') }}"><b>next link</b></a>
                    </div>
                    <div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection