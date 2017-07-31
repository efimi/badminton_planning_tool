@extends('layout')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th> Spieler 1 </th>
            <th> Spieler 2 </th>
            <th> Feld </th>
            <th> Datum </th>
            <th> Zeit </th>
            <th> Optionen </th>
        </tr>
        </thead>
        <tbody>
        @foreach($Gdata as $data)
            <tr>
                <td>{{ substr($data->firstPlayerFirst, 0, 3) }}.  {{ $data->Firstname }} </td>
                <td>{{ substr($data->secondPlayerFirst, 0, 3) }}.  {{ $data->Secondname }} </td>
                <td> {{ $data->Field }} </td>
                <td> {{ $data->Date}} </td>
                <td> {{ substr($data->Time, 0, -3)  }} </td>
                <td> <a href="bearbeiten/{{ $data->id }}">Bearbeiten</a> | <a id="{{ $data->id }}" onClick="
                document.getElementById('deleted').href='/spiel/löschen/{{ $data->id }}';" href="" data-toggle="modal" data-target="#deleteModal">Löschen</a> </td>
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
                        <h4 style="width:90%;"class="modal-title text-center">Wollen Sie das Spiel wirklich Löschen?</h4>
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
