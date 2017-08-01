<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;

class AjaxController extends Controller
{
    public function index($date){
        $games = Game::where('date','=', $date)->orderBy('field_id', 'asc')->orderBy('time', 'asc')->get();
$msg="";

foreach ($games as $game) {
    if (!isset($currentField) || $currentField != $game['Field']['fieldname']) {
        $currentField = $game['Field']['fieldname'];
        $currentState = 1;
        $lastTD="";
        if (isset($currentField)) {
            $msg .= "</tr>";
        }
        $msg .= '
<tr>
    <td>' . $game['Field']['fieldname'] . '</td>';
    }
    if ($game->time == "09:00:00") {
        $msg .='<td>'.substr($game['Player_first']['firstname'], 0, 3).'. '.$game['Player_first']['lastname'].' 
        <br > '.substr($game['Player_second']['firstname'], 0, 3).'. '.$game['Player_second']['lastname'].' </td >';
    } elseif ($game->time == "11:00:00" AND $currentState == 1) {
        $lastTD = true;
        $msg .= '<td ></td >
        <td > ' . substr($game['Player_first']['firstname'], 0, 3) . '. ' . $game['Player_first']['lastname'] . ' 
        <br > ' . substr($game['Player_second']['firstname'], 0, 3) . '. ' . $game['Player_second']['lastname'] . ' </td >';
    }elseif($game->time == "13:00:00" AND $currentState == 2 AND $lastTD=="") {
        $msg.='
        <td></td>
        <td>'. substr($game['Player_first']['firstname'], 0, 3) .'.'.  $game['Player_first']['lastname'] .'
        <br>'. substr($game['Player_second']['firstname'], 0, 3) .'.'.  $game['Player_second']['lastname'] .'</td>';
    }elseif($game->time =="13:00:00" AND $currentState==1) {
        $msg .='<td ></td >
        <td ></td >
        <td >'.substr($game['Player_first']['firstname'], 0, 3).'. '.$game['Player_first']['lastname'] .'
        <br >'.substr($game['Player_second']['firstname'], 0, 3).'. '. $game['Player_second']['lastname'].' </td >';
    }else{
        $msg .= '<td > '.substr($game['Player_first']['firstname'], 0, 3).'. '.$game['Player_first']['lastname'] .'
        <br >'.substr($game['Player_second']['firstname'], 0, 3).'. '. $game['Player_second']['lastname'].' </td >';
    }
        $currentState++;
    }
        return $msg;
    }
}
