@extends('layout')

@section('content')
  <h1>Spielfeld erstellen</h1>
  <form>

    <div class="form-group">
      {{csrf_field() }}
      <label for="name">Name: </label>
      <input class="form-control" id="name" >
      <small class="form-text text-muted">Tragen sie hier den Namen des Spielfeldes ein.</small>
    </div>

    <button type="submit" class="btn btn-primary">Erstellen</button>
  </form>

<hr>

@endsection
