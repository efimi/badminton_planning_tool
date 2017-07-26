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
                    <td> <a href="/spielfeld/bearbeiten/{{ $data->id }}">Bearbeiten</a> | <a href="/spielfeld/löschen/{{ $data->id }}">Löschen</a> </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
