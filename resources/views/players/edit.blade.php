@extends('layout')

@section('content')
    <h1>Spieler bearbeiten</h1>
    <form method="POST" id="edit/delete" action="/spieler/verarbeitet">
        {{csrf_field() }}
            @foreach($Pdata as $data)
                <input type="hidden" value="{{ $data->id }}" name="id">
            @endforeach
        <div class="form-group">
            <label for="firstname">Vorname:</label>
            <input type="text" class="form-control" placeholder="{{ $Pdata->firstname }}" id="firstname" name="firstname">
        </div>
        <div class="form-group">
            <label for="lastname">Nachname:</label>
            <input type="text" class="form-control" placeholder="{{ $Pdata->lastname }}" id="lastname" name="lastname">
        </div>

        <button type="submit" class="btn btn-primary">Spieler bearbeiten</button>
    </form>
    <br>



@endsection
