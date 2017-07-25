@extends('layout')

@section('content')
  <h1>Spieler erstellen</h1>
  <form>
    {{csrf_field() }}
    <div class="form-group">
      <label for="firstname">Vorname: </label>
      <input class="form-control" name="firstname" id="firstname" >
      <small class="form-text text-muted">Tragen sie hier den Namen des Spielers ein.</small>

      <label for="lastname">Nachname: </label>
      <input class="form-control" name="lastname" id="lastname" >
      <small class="form-text text-muted">Tragen sie hier den Namen des Spielers ein.</small>
    </div>

    <button type="submit" class="btn btn-primary">Spieler erstellen</button>
  </form>

<hr>

@endsection
