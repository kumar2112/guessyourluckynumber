@extends('layouts.login_layout')
@section('content')
<p>Shuffled Result: {{$resultData['shuffledNumber']}}</p>
<p>{{$resultData['message']}}</p>
<p><a href="{{route('game.start')}}">Play again</a> </p>
@endsection
