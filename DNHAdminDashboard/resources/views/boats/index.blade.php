@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Boten Overzicht</h1>
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
                            <th>Naam</th>
                            <th>Lengte</th>
                            <th>Eigenaar</th>
                        </tr>
                        </thead>
                        <tbody>
                          @foreach ($boats as $boat)
  				                    <tr data-href="{{action('BoatController@show', ['id' => $boat->id]) }}">
  					                            <td class="table-text">{{ $boat->boatname }}</td>
  					                            <td class="table-text">{{ $boat->boatlength }}</td>
  					                            <td class="table-text">
  						                                  @if (isset($boat->member))
                                                        {{ $boat->member->firstname }}
                                                        {{ $boat->member->prefix }}
                                                        {{ $boat->member->surname }}
  						                                  @endif
  					                            </td>
  				                    </tr>
  				                 @endforeach
                        </tbody>
                    </table>
                    <br/>
                    <a class="btn btn-primary" href="/boat/create">Boot toevoegen</a>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
@stop
