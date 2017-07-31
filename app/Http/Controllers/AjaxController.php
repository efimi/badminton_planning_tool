<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function index($date){

        $games = \DB::Select('SELECT
                             p.firstname AS firstPlayerFirst, 
                             p.lastname AS firstPlayer,
                             p2.firstname AS secondPlayerFirst,
                             p2.lastname AS secondPlayer,
                             f.fieldname AS field,
                             g.date,
                             g.time

                            FROM games AS g
                            JOIN players AS p on g.first_player_id=p.id
                            JOIN players AS p2 on g.second_player_id=p2.id
                            JOIN fields AS f on g.field_id=f.id
                            WHERE date="'.$date.'" order by field_id ASC, time ASC');


$msg="";

foreach ($games as $game) {
    if (!isset($currentField) || $currentField != $game->field) {
        $currentField = $game->field;
        $currentState = 1;
        if (isset($currentField)) {
            $msg .= "</tr>";
        }
        $msg .= '
<tr>
    <td>' . $game->field . '</td>';
    }
    if ($game->time == "09:00:00") {
        $msg .='<td>'.substr($game->firstPlayerFirst, 0, 3).'. '.$game->firstPlayer.' 
        <br > '.substr($game->secondPlayerFirst, 0, 3).'. '.$game->secondPlayer.' </td >';
    } elseif (($game->time == "11:00:00" AND $currentState == 1) OR ($game->time == "13:00:00" AND $currentState == 2)){
        $msg.='<td ></td >
        <td > '.substr($game->firstPlayerFirst, 0, 3).'. '.$game->firstPlayer.' 
        <br > '.substr($game->secondPlayerFirst, 0, 3).'. '.$game->secondPlayer.' </td >';
    }elseif($game->time =="13:00:00" AND $currentState==1) {
        $msg .='<td ></td >
        <td ></td >
        <td >'.substr($game->firstPlayerFirst, 0, 3).'. '.$game->firstPlayer .'
        <br >'.substr($game->secondPlayerFirst, 0, 3).'. '. $game->secondPlayer.' </td >';
    }else{
        $msg .= '<td > '.substr($game->firstPlayerFirst, 0, 3).'. '.$game->firstPlayer .'
        <br >'.substr($game->secondPlayerFirst, 0, 3).'. '. $game->secondPlayer.' </td >';
    }
        $currentState++;
    }
        return $msg;
    }
}
