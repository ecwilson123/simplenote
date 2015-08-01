@extends('layouts.default')

@section('content')
@include('flash::message')
<div class="jumbotron">
    <h1>Welcome to SimpleNote!</h1>
    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in dui auctor, semper nisl a, interdum diam. Praesent aliquam a lectus ac imperdiet. Nulla facilisi. Fusce posuere lectus erat, at aliquam tortor volutpat et. Ut quis dolor augue. Aenean dapibus, elit a efficitur dignissim, dui erat rhoncus orci, sit amet elementum orci neque a purus. Curabitur nisl eros, dignissim quis tempor ac, elementum et tellus. Curabitur erat nisl, pulvinar eu posuere sed, imperdiet eu turpis. </p>
    <p><a class="btn btn-lg btn-success" href="{{ url('/auth/register') }}" role="button"> Sign up today</a></p>
</div>
@endsection
