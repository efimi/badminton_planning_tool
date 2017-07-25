@extends('layout')

@section('content')
  <h1>Spieler erstellen</h1>
  <form method="POST" action="/spieler" >
    {{csrf_field() }}
    <div class="form-group">
      <label for="firstname">Vorname:</label>
      <input type="text" class="form-control" name="firstname" id="firstname" name="firstname" >
      <small class="form-text text-muted">Tragen sie hier den Namen des Spielers ein.</small>

      <label for="lastname">Nachname:</label>
      <input type="text" class="form-control" name="lastname" id="lastname" name="lastname" >
      <small class="form-text text-muted">Tragen sie hier den Namen des Spielers ein.</small>
    </div>

    <button type="submit" class="btn btn-primary">Spieler erstellen</button>
  </form>

<hr>

@endsection


{{--
GET /spieler
GET /spieler/create
POST /spieler     // erstelle eine Spielfeld
GET /spieler/{id}        // zeige an
PATCH /spieler/{id}     // edit Spielfeld mit der id
DELETE /spieler/{id}

--}}
