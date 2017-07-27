<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function index(){

        $games = \DB::Select('SELECT
                             p.lastname AS firstPlayer,
                             p2.lastname AS secondPlayer,
                             f.fieldname AS field,
                             g.date,
                             g.time

                            FROM games AS g
                            JOIN players AS p on g.first_player_id=p.id
                            JOIN players AS p2 on g.second_player_id=p2.id
                            JOIN fields AS f on g.field_id=f.id
                            WHERE date=CURRENT_DATE order by field_id ASC, time ASC');


$msg="";
        foreach ($games as $game){
            if(!isset($currentField) || $currentField != $game->field ) {
                $currentField = $game->field;
        $msg .='
            <tr>
                <td>'.  $game->field .'</td>
            ';
            }
        $msg .='    
            <td>'.  $game->firstPlayer  .'<br>'.  $game->secondPlayer .'</td>
        ';
        }

        return $msg;
    }
}
