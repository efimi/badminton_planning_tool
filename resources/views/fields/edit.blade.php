@extends('layout')

@section('content')
    <h1>Spielfeld bearbeiten</h1>
    <form method="POST" action="/spielfeld/verarbeitet">
        {{csrf_field() }}
        <div class="form-group">
            <label for="fieldname">Name:</label>
            <?php
            //dd($Fdata);
            ?>

            @foreach($Fdata as $data)
                <input type="hidden" value="{{ $data['id'] }}" name="id">
            @endforeach
            <input type="text" placeholder="{{ $data['fieldname'] }}" class="form-control" id="fieldname" name="fieldname">
            {{-- <small class="form-text text-muted">Tragen sie hier den Namen des Spielfeldes ein.</small> --}}
        </div>

        <button type="submit" class="btn btn-primary">Spielfeld bearbeiten</button>

    </form>
    @include('layouts.errors')
    <hr>

@endsection
