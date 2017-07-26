@extends('layout')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th> Vorname </th>
                <th> Nachname </th>
                <th> Optionen </th>
            </tr>
        </thead>
        <tbody>
            @foreach($players as $player)
                <tr>
                    <td> {{ $player->firstname }} </td>
                    <td> {{ $player->lastname }} </td>
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
