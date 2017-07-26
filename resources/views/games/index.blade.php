@extends('layout')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th> Spieler 1 </th>
            <th> Spieler 2 </th>
            <th> Feld </th>
            <th> Datum </th>
            <th> Zeit </th>
        </tr>
        </thead>
        <tbody>
        @foreach($Gdata as $data)
            <tr>
                <td> {{ $data->firstname }} </td>
                <td> {{ $data->secondname }} </td>
                <td>  <a href="/spieler/{{ $player->id  }}"> Profil anzeigen </a>
                    @if (!Auth::guest())
                        | <a href="/spieler/bearbeiten/{{ $player->id }}">Bearbeiten</a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


@endsection
