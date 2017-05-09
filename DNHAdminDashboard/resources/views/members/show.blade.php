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

    <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Bootnaam</th>
            <th>Lengte</th>
            <th>Mainboat</th>
        </tr>
        </thead>
        <tbody>
        @foreach($member->boats as $boat)
            <tr>
                <td>{{$boat->boatname}}</td>
                <td>{{$boat->boatlength}}</td>
                <td>{{$boat->mainboat}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
