@extends('layout')

@section('content')
<h1>Login</h1>
<form>
  <div class="form-group">
    <label for="user">Nutzer: </label>
    <input type="text" class="form-control" id="user" placeholder="Benutzername">
  </div>
  <div class="form-group">
    <label for="password">Passwort: </label>
    <input type="text" class="form-control" id="password" placeholder="Passwort">
  </div>
</form>

@endsection
