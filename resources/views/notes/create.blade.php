@extends('layouts.default')

@section('title', 'Create New Note - ')

@section('css')
<link rel='stylesheet' type='text/css' href="{{ asset('css/kube-btns.css') }}">
@endsection

@section('content')
<h2>Create new notes</h2>
<br>
@include('flash::message')
@include('layouts.partials._errors')

{!! Form::open(['route' => 'notes.store']) !!}
    @include('notes.partials._form', ['title_val' => '', 'collection_val' => 0, 'body_text_val' => '', 'is_public_val' => 0])
{!! Form::close() !!}
@endsection

@section('js')
<script type="text/javascript" src="{{ asset('js/redactor/redactor.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/kube.min.js') }}"></script>
<script type="text/javascript">
    function redactorStart() {
        $('#redactor').redactor({
            source: false,
            minHeight: 400,
            removeDataAttr: true,
        });
    }
    function getTime() {
        var currentdate = new Date(),
            h = currentdate.getHours(),
            m = currentdate.getMinutes(),
            s = currentdate.getSeconds(),
            tod = 'AM';
        
        if (h > 12) {
            h = h - 12;
            tod = 'PM'
        }
        
        if (String(h).length < 2) {
            h = '0' + h;
        }
        
        if (String(m).length < 2)
        {
            m = '0' + m;
        }
        
        if (String(s).length < 2)
        {
            s = '0' + s
        }
        
        return h + ':' + 'm' + ':' + s + ' ' + tod;
    }
    
    function showAutoSaveSuccessMsg() {
        $('autosave-success').fadeIn();
        $('autosave-time').html(getTime());
        setTimeout(function() { $('autosave-success').fadeOut(); }, 5000);
    }
    
    function previewNote() {
        var html = $('#redactor').redactor('code.get');
        $('#redactor').redactor('core.destory');
        $('#redactor').hide();
        
        $('#btn-preview').hide();
        $('#btn-save').show();
        
        $('#phtml').html(html);
        $('#preview').show();
    }
    
    function editNote() {
        var html = $('#phtml').html();
        redactorStart();
        $('#redactor').redactor('code.set', html);
        
        $('#btn-save').hide();
        $('#btn-preview').show();
        
        $('#phtml').html('');
        $('#preview').hide()
    }
    
    $(function() {
        redactorStart();
        $('#buttons').buttons({
            target: '#is-private-target'
        });
    });
</script>
@endsection
