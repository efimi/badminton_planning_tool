@extends('layout')

@section('content')
  <form>
    <div class="form-group">
      <label for="Player">Name</label>
      <input type="email" class="form-control" id="PayersName" aria-describedby="emailHelp" placeholder="Enter email">
      <small id="PayersNameHelp" class="form-text text-muted">Tragen sie hier den Namen des Spielers ein.</small>
    </div>




    <button type="submit" class="btn btn-primary">Submit</button>
  </form>


@endsection
