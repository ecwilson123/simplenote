@extens('layouts.default')

@section('title'){{ $note->title }} - Note - @endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}" type="text/css" />
@endsection

@section('content')
@include('notes.partials._info')
@include('notes.partials._stats')
<br>
<div id="note-text">
    {!! $note->body_text !!}
</div>
@endsection

@section('js')
<script type="text/javascript" src="{{ asset('js/delete.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/sweetalert.min.js') }}"></script>
@endsection
