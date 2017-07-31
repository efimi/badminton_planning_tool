@extends('layout')

@section('content')
    <h1>Ein Spiel hinterlegen</h1>
    <hr>
<form method="POST" action="/spiel" >
    {{csrf_field()}}
    <div class="form-group">
        <h5><label for="first_player_id" class="col-sm-2 control-label">Spieler 1</label></h5>
        <select class="form-control" id="first_player_id" name="first_player_id">
            @foreach ($Pdata as $player )
                <option value="{{ $player->id }}">{{ $player->firstname }} {{ $player->lastname }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <h5><label for="second_player_id" class="col-sm-2 control-label">Spieler 2</label></h5>
        <select class="form-control" id="second_player_id" name="second_player_id">
            @foreach ($Pdata as $player )
                <option value="{{ $player->id }}">{{ $player->firstname }} {{ $player->lastname }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <h5><label for="field" class="col-sm-2 control-label">Feld</label></h5>
        <select class="form-control" id="field" name="field">
            @foreach ($Fdata as $field )
                <option value="{{ $field->id }}">{{ $field->fieldname }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <h5><label for="time" class="col-sm-2 control-label">Zeit</label></h5>
        <select class="form-control" id="time" name="time">
                <option value="09:00:00">09:00 - 11:00</option>
                <option value="11:00:00">11:00 - 13:00</option>
                <option value="13:00:00">13:00 - 15:00</option>
        </select>
    </div>

   <!-- <input type="hidden" name="date" value="{{ date('Y-m-d') }}">
-->
    <div class="form-group">
        <h5><label for="date" class="col-sm-2 control-label">Datum</label></h5>
        <input  class="form-control" type="date" name="date" value="{{ date('Y-m-d') }}">
    </div>

    <button type="submit" class="btn btn-default">Erstellen</button>

      @include('layouts.errors')
</form>
<br>

@endsection



{{--
GET /spiel
GET /spiel/create
POST /spiel     // erstelle eine Spielfeld
GET /spiel/{id}        // zeige an
PATCH /spiel/{id}     // edit Spielfeld mit der id
DELETE /spiel/{id}

--}}
