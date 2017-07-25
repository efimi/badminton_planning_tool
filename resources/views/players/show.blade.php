@extends('layout')

@section('content')
    <table class="table">
        @foreach($player as $player)
        <thead>
            <th>{{$player->firstname}}</th>
            <th>{{$player->lastname}}</th>
        </thead>
        @endforeach
        <tbody>
            <tr>
                <th>Datum</th>
                <th>Uhrzeit</th>
                <th>Spielfeld</th>
                <th>Spieler 1</th>
                <th>Spieler 2</th>
            </tr>
        @foreach($game as $game)
            <tr>
                <td>  {{ $game->Date  }}  </td>
                <td>  {{ $game->Time  }}  </td>
                <td>  {{ $game->Field  }}  </td>
                <td>  {{ $game->Firstname  }}  </td>
                <td>  {{ $game->Secondname  }}  </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
