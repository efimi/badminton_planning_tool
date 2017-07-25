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
        @foreach($game as $game)
            <tr>
                <td>  {{ $game->Date  }}  </td>
                <td>  {{ $game->Time  }}  </td>
                <td>  {{ $game->Firstname  }}  </td>
                <td>  {{ $game->Secondname  }}  </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
