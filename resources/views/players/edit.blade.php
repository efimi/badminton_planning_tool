@extends('layout')

@section('content')
    <h1>Spieler bearbeiten</h1>
    <form method="POST" id="edit/delete" action="/spieler/verarbeitet">
        {{csrf_field() }}
            @foreach($Pdata as $data)
                <input type="hidden" value="{{ $data->id }}" name="id">
            @endforeach
        <div class="form-group">
            <label for="firstname">Vorname:</label>
            <input type="text" class="form-control" placeholder="{{ $Pdata->firstname }}" id="firstname" name="firstname">
        </div>
        <div class="form-group">
            <label for="lastname">Nachname:</label>
            <input type="text" class="form-control" placeholder="{{ $Pdata->lastname }}" id="lastname" name="lastname">
        </div>


    </form>
    <div class="row center-content">
        <button form="edit/delete" type="submit" class="btn btn-primary">Spieler bearbeiten</button>
        <button type="button" style="margin-left:10px;" class="btn btn-primary" data-toggle="modal" data-target="#deleteModal">Löschen</button>

        <!-- Modal -->
        <div class="modal fade" id="deleteModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 style="width:90%;"class="modal-title text-center">Wollen Sie den Spieler <br>{{ $data->firstname }} {{ $data->lastname }}<br> wirklich Löschen?</h4>
                    </div>
                    <div class="modal-body ">
                        <a href="/spieler/löschen/{{ $data->id }}" type="button" class="btn-block btn btn-primary">Ja</a>
                        <button type="button" class="btn-block btn btn-primary" data-dismiss="modal">Nein</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <br>



@endsection
