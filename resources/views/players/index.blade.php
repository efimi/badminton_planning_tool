@extends('layout')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th> Vorname </th>
                <th> Nachname </th>
            </tr>
        </thead>
        <tbody>
            @foreach($players as $player)
                <tr>
                    <td> {{ $player->firstname }} </td>
                    <td> {{ $player->lastname }} </td>
                    <td>  <a href="/spieler/{{ $player->id  }}"> Profil anzeigen </a></td>
                </tr>
            @endforeach
        </tbody>
    </table>


@endsection
