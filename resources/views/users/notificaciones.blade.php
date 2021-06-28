@extends('layouts.app')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Nombre del usuario</th>
            <th scope="col">Fecha de notificaion</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($notificaciones as $Notificaciones)
                <tr>
                    <th scope="row">{{$Notificaciones->data['user']}}</th>
                    <td>{{$Notificaciones->created_at}}</td>
                </tr>
            @endforeach 
        </tbody>
    </table>   
@endsection