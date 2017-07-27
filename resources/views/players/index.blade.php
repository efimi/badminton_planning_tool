@extends('layout')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th> Vorname </th>
                <th> Nachname </th>
                <th> Optionen </th>
            </tr>
        </thead>
        <tbody>
            @foreach($players as $player)
                <tr>
                    <td> {{ $player->firstname }} </td>
                    <td> {{ $player->lastname }} </td>
                    <td>  <a href="/spieler/{{ $player->id  }}"> Profil anzeigen </a>
                    @if (!Auth::guest())
                        | <a href="/spieler/bearbeiten/{{ $player->id }}">Bearbeiten</a>
                    @endif
                    @if (!Auth::guest())
                        | <a id="{{ $player->id }}" onClick="
                                   document.getElementById('deleted').href='/spieler/löschen/{{ $player->id }}';" href="" data-toggle="modal" data-target="#deleteModal">Löschen</a>
                    @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="row center-content">
        <!-- Modal -->
        <div class="modal fade" id="deleteModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 style="width:90%;"class="modal-title text-center">Wollen Sie den das Spiel wirklich Löschen?</h4>
                    </div>
                    <div class="modal-body ">
                        <a id="deleted" href="" type="button" class="btn-block btn btn-primary">Ja</a>
                        <button type="button" class="btn-block btn btn-primary" data-dismiss="modal">Nein</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
