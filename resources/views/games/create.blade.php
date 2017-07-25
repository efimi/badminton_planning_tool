@extends('layout')

@section('content')
<form method="POST" action="/spiel" >

</form>
<h1>Ein Spiel hinterlegen</h1>

@endsection



{{--
GET /spiel
GET /spiel/create
POST /spiel     // erstelle eine Spielfeld
GET /spiel/{id}        // zeige an
PATCH /spiel/{id}     // edit Spielfeld mit der id
DELETE /spiel/{id}

--}}
