@extends('layouts.default')

@section('title'){{ $collection->name }} Collection - @endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}" type="text/css" />
@endsection

@section('content')
    @include('flash::message')
    @include('collections.partials._info')
    <hr>
    @foreach($notes as $note)
        @if ($note->is_public || $note->user == Auth::User())
            <div class="note">
                @include('notes.partials._info')
                @include('notes.partials._stats')
            </div>
        @endif
    @endforeach
@endsection

@section('js')
<script type="text/javascript" src="{{ asset('js/delete.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/sweetalert.min.js') }}"></script>
@endsection
