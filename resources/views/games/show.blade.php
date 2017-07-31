@extends('layout')

@section('content')
    <select id="date" class="form-control">
        <option  selected  value="{{ date('Y-m-d') }}">{{ date('Y-m-d') }}</option>
    @foreach($dates AS $date)
            @if(date('Y-m-d')!=$date->date)
              <option @if(date('Y-m-d')==$date->date) selected @endif value="{{ $date->date }}">{{ $date->date }}</option>
            @endif
    @endforeach
    </select>
  <table class="table">
      <thead>
          <tr>
              <th>Spielfelder</th>
              <th>09:00-11:00</th>
              <th>11:00-13:00</th>
              <th>13:00-15:00</th>
          </tr>
      </thead>
      <tbody id="matchBody">

      <?php foreach ($games as $game){
      if(!isset($currentField) || $currentField != $game->field ) {
      $currentField = $game->field;
      $currentState=1;
      if(isset($currentField)){
          echo "</tr>";
      }
  ?>
      <tr>
          <td>{{ $game->field }}</td>

          <?php } ?>
          @if($game->time =="09:00:00")
              <td>{{ substr($game->firstPlayerFirst, 0, 3) }}. {{ $game->firstPlayer }}<br>{{ substr($game->secondPlayerFirst, 0, 3) }}. {{  $game->secondPlayer }}</td>
          @elseif(($game->time =="11:00:00" AND $currentState==1) OR ($game->time =="13:00:00" AND $currentState==2))
              <td></td>
              <td>{{ substr($game->firstPlayerFirst, 0, 3) }}. {{ $game->firstPlayer }}<br>{{ substr($game->secondPlayerFirst, 0, 3) }}. {{  $game->secondPlayer }}</td>
          @elseif($game->time =="13:00:00" AND $currentState==1)
              <td></td>
              <td></td>
              <td>{{ substr($game->firstPlayerFirst, 0, 3) }}. {{ $game->firstPlayer }}<br>{{ substr($game->secondPlayerFirst, 0, 3) }}. {{ $game->secondPlayer }}</td>
          @else
              <td>{{ substr($game->firstPlayerFirst, 0, 3) }}. {{ $game->firstPlayer }}<br>{{ substr($game->secondPlayerFirst, 0, 3) }}. {{ $game->secondPlayer }}</td>
          @endif
    <?php
      $currentState++;
      } ?>

      </tbody>
  </table>


<script>
    $(document).ready(function(){
        // AJAX-function
        setInterval(function(){
            var path ="/reload/";
             path += $('#date option:selected').val();
            $.ajax({
                type:'POST',
                url: path,
                data:{"_token": "<?php echo csrf_token() ?>"},
                success:function(data){
                    $("#matchBody").html(data);
                }
            });
        }, 1000);
    });
</script>
@endsection
