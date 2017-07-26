@extends('layout')

@section('content')
    <h4>Das Spielfeld mit der ID {{ $data['id'] }} wurde umbenannt und heißt nun {{ $data['fieldname'] }}</h4>

@endsection
