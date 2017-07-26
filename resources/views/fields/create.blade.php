@extends('layout')

@section('content')
  <h1>Spielfeld erstellen</h1>
  <form method="POST" action="/spielfeld">
    {{csrf_field() }}
    <div class="form-group">
      <label for="fieldname">Name:</label>
      <input type="text" class="form-control" id="fieldname" name="fieldname">
      {{-- <small class="form-text text-muted">Tragen sie hier den Namen des Spielfeldes ein.</small> --}}
    </div>

    <button type="submit" class="btn btn-primary">Spielfeld erstellen</button>
  </form>

<br>

{{--  show errors --}}
<div class="form-group">
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li> {{ $error }}</li>

      @endforeach
    </ul>
  </div>
</div>

@endsection

{{--
GET /spielfeld
GET /spielfeld/create
POST /spielfeld     // erstelle eine Spielfeld
GET /spielfeld/{id}        // zeige an
PATCH /spielfeld/{id}     // edit Spielfeld mit der id
DELETE /spielfeld/{id}

--}}
