@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="{{ url('/notes') }}" class="link">
                    Notes
                </a>
            </div>
            <div class="panel-body">
                @include('notes.partials._summary')
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="{{ url('/collections') }}" class="link">
                    Collections
                </a>
            </div>
            <div class="panel-body">
                @include('collections.partials._summary')
            </div>
        </div>
    </div>
</div>
@stop
