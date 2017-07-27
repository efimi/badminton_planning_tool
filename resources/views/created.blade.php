@extends('layout')

@section('content')
<h1>{{ $instanceName }} wurde erstellt </h1>
<br>
<a href="/{{ strtolower($instanceName) }}/erstellen"> Noch {{ $instanceName=='Spieler'? 'einen' : 'ein'}} {{ $instanceName }} erstellen.</a>
<br>
<a href="/"> Zurück zur Startseite</a>

@endsection
