@extends('layout')

@section('content')
    <h1>Spielfeld erstellen</h1>
    <form method="POST" action="/spielfeld/verarbeitet">
        {{csrf_field() }}
        <div class="form-group">
            <label for="fieldname">Name:</label>
            @foreach($Fdata as $data)
                <input type="hidden" value="{{ $data->id }}" name="id">
            @endforeach
            <input type="text" class="form-control" id="fieldname" name="fieldname">
            {{-- <small class="form-text text-muted">Tragen sie hier den Namen des Spielfeldes ein.</small> --}}
        </div>

        <button type="submit" class="btn btn-primary">Spielfeld bearbeiten</button>
    </form>

    <hr>

@endsection
