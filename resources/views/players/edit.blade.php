@extends('layout')

@section('content')
    <h1>Spielfeld erstellen</h1>
    <form method="POST" action="/spieler/verarbeitet">
        {{csrf_field() }}
            @foreach($Pdata as $data)
                <input type="hidden" value="{{ $data->id }}" name="id">
            @endforeach
        <div class="form-group">
            <label for="firstname">Vorname:</label>
            <input type="text" class="form-control" placeholder="Vorname" id="firstname" name="firstname">
        </div>
        <div class="form-group">
            <label for="lastname">Nachname:</label>
            <input type="text" class="form-control" placeholder="Nachname" id="lastname" name="lastname">
        </div>

        <button type="submit" class="btn btn-primary">Spieler bearbeiten</button>
    </form>

    <hr>

@endsection
