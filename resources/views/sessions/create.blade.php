@extends('layouts.default')

@section('content')
<h1>Sign In</h1>
@include('flash::message')
@include('layouts.partials._errors')

{!! Form::open(['route' => 'login_path']) !!}
<div class="form-group">
    {!! Form::label('username', 'Username:') !!}
    {!! Form::text('username', $username, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
<div class="form-group">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control', 'required' => 'required']) !!}
</div>
<div class="form-group">
    {!! Form::submit('Sign In', ['class' => 'btn btn-primary']) !!}
    <a class="btn btn-link" href="{{ url('/password/email') }}">Forgot your password?</a>
</div>
{!! Form::close() !!}
@stop
