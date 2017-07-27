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
      <tbody id="matchBody">



      </tbody>
  </table>


<script>
    $(document).ready(function(){
        // AJAX-function
        setInterval(function(){

            $.ajax({
                type:'POST',
                url:'/reload',
                data:{"_token": "<?php echo csrf_token() ?>"},
                success:function(data){
                    console.log(data)
                    $("#matchBody").html(data);
                }
            });

            // $("#matchBody").load("/layouts/tbody.blade.php");
        }, 3000);
    });
</script>
@endsection
