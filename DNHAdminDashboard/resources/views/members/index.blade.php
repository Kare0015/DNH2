@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Leden</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Voornaam</th>
                            <th>Tussenvoegsel</th>
                            <th>Achternaam</th>
                            <th>Email</th>
                            <th>Woonplaats</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--{{ dd(get_defined_vars()) }}--}}
                        {{--{{ dd(get_defined_vars()['__data']) }}--}}
                        @foreach($members as $member)
                            <tr>
                                <td>{{$member['voornaam']}}</td>
                                <td>{{$member['tussenvoegsel']}}</td>
                                <td>{{$member['achternaam']}}</td>
                                <td>{{$member['email']}}</td>
                                <td>{{$member['woonplaats']}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <br/>
                    <a class="btn btn-primary" href="/members/toevoegen">Lid toevoegen</a>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
@stop
