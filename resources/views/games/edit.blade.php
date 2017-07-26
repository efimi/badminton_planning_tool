@extends('layout')

@section('content')

    <?php
    foreach ($Gdata as $data )
        $G_id = $data->id;
        $G_first_id = $data->first_player_id;
        $G_second_id = $data->second_player_id;
        $G_time = $data->time;
    ?>

    <form method="POST" action="/spiel/anzeigen" >
        {{csrf_field()}}

        <div class="form-group">
            <h5><label for="first_player_id" class="col-sm-2 control-label">Spieler 1</label></h5>
            <select class="form-control" id="first_player_id" name="first_player_id">
                @foreach ($Pdata as $player )
                    <option value="{{ $player->id }}" @if($player->id == $G_first_id) selected @endif >{{ $player->firstname }} {{ $player->lastname }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <h5><label for="second_player_id" class="col-sm-2 control-label">Spieler 2</label></h5>
            <select class="form-control" id="second_player_id" name="second_player_id">
                @foreach ($Pdata as $player )
                    <option value="{{ $player->id }}" @if($player->id == $G_second_id) selected @endif >{{ $player->firstname }} {{ $player->lastname }}</option>
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
                <option value="09:00:00" @if($player->id == $G_time) selected @endif>09:00:00 - 11:00:00</option>
                <option value="11:00:00" @if($player->id == $G_time) selected @endif>11:00:00 - 13:00:00</option>
                <option value="13:00:00" @if($player->id == $G_time) selected @endif>13:00:00 - 15:00:00</option>
            </select>
        </div>

        <input type="hidden" name="date" value="{{ date('Y-m-d') }}">

        <button type="submit" class="btn btn-default">Bearbeiten</button>

    </form>
    <br>

@endsection
