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

      @include('layouts.errors')
  </form>

<br>
<<<<<<< HEAD

=======
{{--  show errors --}}
@if(count($errors))
  <div class="form-group">
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li> {{ $error }}</li>

        @endforeach
      </ul>
    </div>
  </div>
@endif
>>>>>>> e8f7c84d9077adc2a4176ae1e74ea807b73d6951

@endsection

{{--
GET /spielfeld
GET /spielfeld/create
POST /spielfeld     // erstelle eine Spielfeld
GET /spielfeld/{id}        // zeige an
PATCH /spielfeld/{id}     // edit Spielfeld mit der id
DELETE /spielfeld/{id}

--}}
