@extends('layout')

@section('content')
  <h1>Spielfeld Erstellen</h1>
  <form>
    
    <div class="form-group">
      <label for="Field">Name</label>
      <input class="form-control" id="FieldsName" >
      <small id="PayersNameHelp" class="form-text text-muted">Tragen sie hier den Namen des Spielfeldes ein.</small>
    </div>

    <button type="submit" class="btn btn-primary">Erstellen</button>
  </form>

<hr>

@endsection
