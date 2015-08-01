@extends('layouts.default')
@section('title', 'Create new Collection - ')

@section('css')
<link rel="stylesheet" href="{{ asset('css/kube-btns.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('css/bootstrap-colorpicker.min.css') }}" type="text/css" />
@endsection

@section('content')
<h2>Create new Collection</h2>
<hr/>
@include('flash::message')
@include('layouts.partial._errors')
{!! Form::open(['route' => 'collections.store']) !!}
    @include('collections.partials._form', ['name_val' => '', 'color_val' => '', 'is_public_val' => 0])
{!! Form::close() !!}
@endsection

@section('js')
<script type="text/javascript">
    $(function() {
        $('#buttons').buttons({
            target: '#is-public-target'
        });
        
        $('#color-picker input').val(get_random_color());
        
        $('#color-picker').colorpicker();
    });
    
    function get_random_color() {
        var colors = ['#A74EFF', '#FF70FE', '#337ab7', '#5bc0de', '#f0ad4e', '#d9534f'];
        
        return colors[Math.floor(Math.random() * colors.length)];
    }
</script>
@endsection
