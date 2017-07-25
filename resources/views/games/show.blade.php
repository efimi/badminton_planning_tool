@extends('layout')

@section('content')

  <table class="table">
      <thead>
          <tr>
              <th>Spielfelder</th>
              <th>09:00-11:00</th>
              <th>11:00-13:00</th>
              <th>13:00-15:00</th>
          </tr>
      </thead>
      <tbody>
            @foreach ($games as $game)

            @endforeach
            <tr>
                <td>Spielfeld A</td>
                <td> Firstplayer <br> Lastplayer</td>
                <td> Firstplayer <br> Lastplayer</td>
                <td> Firstplayer <br> Lastplayer</td>
            </tr>
            <tr>
                <td>Spielfeld B</td>
                <td> Firstplayer <br> Lastplayer</td>
                <td> Firstplayer <br> Lastplayer</td>
                <td> Firstplayer <br> Lastplayer</td>
            </tr>
            <tr>
                <td>Spielfeld C</td>
                <td> Firstplayer <br> Lastplayer</td>
                <td> Firstplayer <br> Lastplayer</td>
                <td> Firstplayer <br> Lastplayer</td>
            </tr>
            <tr>
                <td>Spielfeld D</td>
                <td> Firstplayer <br> Lastplayer</td>
                <td> Firstplayer <br> Lastplayer</td>
                <td> Firstplayer <br> Lastplayer</td>
            </tr>

      </tbody>
  </table>

@endsection
