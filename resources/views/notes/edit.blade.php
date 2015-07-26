@extends('layouts.default')

@section('title')Edit {{ $note->title }} - @endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/kube-btns.css') }}">
@endsection

@section('section')
<h2>Edit {{ $note->title }}</h2>
<br>
@include('flash::message')
@include('layouts.partials._errors')

{!! Form::open(['route' => 'notes.update', $note->id]) !!}
    @include('notes.partials._form', ['title_val' => $note->title, 'collection_val' => $note->colleciont_id, 'body_text_val' => $note->body_text, 'is_public_val' => $is_public])
{!! Form::close() !!}
@endsection
