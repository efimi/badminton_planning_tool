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
                <td> {{ $data->Firstname }} </td>
                <td> {{ $data->Secondname }} </td>
                <td> {{ $data->Field }} </td>
                <td> {{ $data->Date }} </td>
                <td> {{ $data->Time }} </td>
                <td> <a href="bearbeiten/{{ $data->id }}">Bearbeiten</a> | <a href="löschen/{{ $data->id }}">Löschen</a> </td>
            </tr>
        @endforeach
        </tbody>
    </table>


@endsection
