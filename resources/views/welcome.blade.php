@extends('layouts.app')

@section('content')
    <div class="content">

        <div class="panel panel-default">
            <div class="title m-b-md">
                Laravel Forum
            </div>
            <div class="panel-body">
                A very simple application exposing the most common and basic functionalities of a forum app. <br/>Before using app please log in or create a new account.
                <br/><br/><br/>
                <div class="links">
                    @auth
                        <b>You are already logged in app, now you can create or update your <a href="{{ url('/profile') }}">profile information</a></b>
                    @else
                        <a href="{{ url('login') }}">Login</a>
                        <a href="{{ url('register') }}">Register</a>
                    @endauth
                </div>
            </div>
            <div>

            </div>
        </div>

    </div>
@endsection

