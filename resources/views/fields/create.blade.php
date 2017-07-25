@extends('layout')

@section('content')
  <h1>Spielfeld erstellen</h1>
  <form method="POST" action="/spielfeld">
    {{csrf_field() }}
    <div class="form-group">

      <label for="name">Name: </label>
      <input class="form-control" id="name" >
      <small class="form-text text-muted">Tragen sie hier den Namen des Spielfeldes ein.</small>
    </div>

    <button type="submit" class="btn btn-primary">Spielfeld erstellen</button>
  </form>

<hr>

@endsection

{{--
GET /spielfeld
GET /spielfeld/create
POST /spielfeld     // erstelle eine Spielfeld
GET /spielfeld/{id}        // zeige an
PATCH /spielfeld/{id}     // edit Spielfeld mit der id
DELETE /spielfeld/{id}

--}}
