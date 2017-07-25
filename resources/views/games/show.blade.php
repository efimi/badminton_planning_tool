@extends('layout')

@section('content')
    <h1> {{ date("d.m.Y") }} </h1>
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
                <?php if(!isset($currentField) || $currentField != $game->field ) {
                    $currentField = $game->field;

                    ?>
                    <tr>
                        <td>{{$game->field}}</td>
                <?php } ?>
                        <td> {{ $game->firstPlayer }} <br> {{ $game->secondPlayer }}</td>

            @endforeach
      </tbody>
  </table>

@endsection
