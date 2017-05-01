@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>{{$boat['boatname']}}</h1>
@stop

@section('content')
    <table class="table table-striped table-hover">
        <thead>
            Overzicht boten
        </thead>
        <tbody>
        <tr>
            Info
        </tr>
        </tbody>
    </table>


@stop
