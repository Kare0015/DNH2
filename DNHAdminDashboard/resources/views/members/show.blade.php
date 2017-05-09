@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <div class="col-sm-1">
      <a class="btn btn-default" href="{{action('MemberController@index', $member->id)}}">Terug</a>
    </div>
    <h1>{{$member['firstname']."  ".$member['prefix']." ".$member['surname']}}</h1>
@stop

@section('content')
{{$member->email}}
{{$member['street']." ".$member['number']." ".$member['city']}}
@stop
