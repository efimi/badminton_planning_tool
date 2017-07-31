@extends('layout')

@section('content')
    <table class="table">
        <thead>
            <th>ID</th>
            <th>Feldname</th>
            <th>Optionen </th>
        </thead>
        <tbody>
            @foreach($Fdata as $data)
                <tr>
                    <td>{{ $data->id }}</td>
                    <td>{{ $data->fieldname }}</td>
                    <td> <a href="/spielfeld/bearbeiten/{{ $data->id }}">Bearbeiten</a> | <a id="{{ $data->id }}" onClick="
                                document.getElementById('deleted').href='/spielfeld/löschen/{{ $data->id }}';" href="" data-toggle="modal" data-target="#deleteModal">Löschen</a> </td>
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
                        <h4 style="width:90%;"class="modal-title text-center">Wollen Sie das Spielfeld wirklich Löschen?</h4>
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
