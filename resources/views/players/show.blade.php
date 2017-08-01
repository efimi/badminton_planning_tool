@extends('layout')

@section('content')
    <table class="table">
        @foreach($player as $player)
        <thead>
            <th>{{ $player['firstname'] }}</th>
            <th>{{ $player['lastname'] }}</th>
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
                <td>  {{ $game['date']  }}  </td>
                <td>  {{ $game['time']  }}  </td>
                <td>  {{ $game['Field']['fieldname']  }}  </td>
                <td> {{ substr($game['Player_first']['firstname'],0,3) }}. {{ $game['Player_first']['lastname']  }}  </td>
                <td> {{ substr($game['Player_second']['firstname'],0,3) }}. {{ $game['Player_second']['lastname']  }}  </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
