<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Badminton_Planer_Tool</title>

    <!-- Bootstrap core CSS -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- Custom styles for this template -->
    <link href="/css/narrow-jumbotron.css" rel="stylesheet">
</head>
<body>

<select  id="date" class="form-control hidden">
    <option  selected  value="{{ date('Y-m-d') }}">{{ date('Y-m-d') }}</option>
</select>
<div class=" col-md-10 col-md-offset-1">
    <table class="table text-center">
        <thead>
        <tr>
            <th class="text-center">Spielfelder</th>
            <th class="text-center">09:00-11:00</th>
            <th class="text-center">11:00-13:00</th>
            <th class="text-center">13:00-15:00</th>
        </tr>
        </thead>
        <tbody id="matchBody">

        <?php foreach ($games as $game){
        if(!isset($currentField) || $currentField != $game['Field']['fieldname'] ) {
        $lastTD="";
        if(isset($currentField)){
            echo "</tr>";

        }
        $currentField = $game['Field']['fieldname'];
        $currentState=1;
        ?>
        <tr>
            <td>{{ $game['Field']['fieldname'] }}</td>

            <?php } ?>
            @if($game['time'] =="09:00:00")
                <td>{{ substr($game['Player_first']['firstname'], 0, 3) }}. {{ $game['Player_first']['lastname'] }}
                <br>{{ substr($game['Player_second']['firstname'], 0, 3) }}. {{  $game['Player_second']['lastname'] }}</td>
            @elseif($game['time'] =="11:00:00" AND $currentState==1)
                <?php $lastTD=true; ?>
                <td></td>
                <td>{{ substr($game['Player_first']['firstname'], 0, 3) }}. {{ $game['Player_first']['lastname'] }}
                <br>{{ substr($game['Player_second']['firstname'], 0, 3) }}. {{  $game['Player_second']['lastname'] }}</td>
            @elseif($game['time'] =="13:00:00" AND $currentState==2 AND $lastTD=="")
                <td></td>
                <td>{{ substr($game['Player_first']['firstname'], 0, 3) }}. {{ $game['Player_first']['lastname'] }}
                <br>{{ substr($game['Player_second']['firstname'], 0, 3) }}. {{  $game['Player_second']['lastname'] }}</td>
            @elseif($game['time'] =="13:00:00" AND $currentState==1)
                <td></td>
                <td></td>
                <td>{{ substr($game['Player_first']['firstname'], 0, 3) }}. {{ $game['Player_first']['lastname'] }}
                <br>{{ substr($game['Player_second']['firstname'], 0, 3) }}. {{ $game['Player_second']['lastname'] }}</td>
            @else
                <td>{{ substr($game['Player_first']['firstname'], 0, 3) }}. {{ $game['Player_first']['lastname'] }}
                <br>{{ substr($game['Player_second']['firstname'], 0, 3) }}. {{ $game['Player_second']['lastname'] }}</td>
        @endif
        <?php
        $currentState++;
        } ?>

        </tbody>
    </table>
</div>

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
</body>

</html>
