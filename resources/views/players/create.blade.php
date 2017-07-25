@extends('layout')

@section('content')
  <h1>Spieler erstellen</h1>
  <form>
    <div class="form-group">
      <label for="Player">Name</label>
      <input class="form-control" id="PayersName" aria-describedby="emailHelp">
      <small id="PayersNameHelp" class="form-text text-muted">Tragen sie hier den Namen des Spielers ein.</small>
    </div>


    <button type="submit" class="btn btn-primary">Erstellen</button>
  </form>

<hr>

@endsection
