@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <div class="col-sm-1">
      <a class="btn btn-default" href="{{action('BoatController@index')}}">Terug</a>
    </div>
    <h1>Boot toevoegen</h1>
@stop

@section('content')
    {!! Form::open(['action' => ['BoatController@store'], 'method' => 'post', 'class' => 'form-horizontal']) !!}
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped table-hover">
                        <tbody>
                            <tr>
                                <div class="form-group">
                                    <div class="col-sm-6">
                                        {!! Form::label('boatname', 'Bootnaam', ['class' => 'control-label']) !!}
                                        {!! Form::text('boatname', null, ['class' => 'form-control', 'placeholder' => 'Bootnaam']) !!}
                                    </div>
                                    <div class="col-sm-6">
                                        {!! Form::label('boatlength', 'Bootlengte', ['class' => 'control-label']) !!}
                                        {!! Form::text('boatlength', null, ['class' => 'form-control', 'placeholder' => 'Bootlengte']) !!}
                                    </div>
                                    <div class="col-sm-6">
                                        {!! Form::label('member_id', 'Eigenaar', ['class' => 'control-label']) !!}
                                        {!! Form::select('member_id', $members, null, ['class' => 'form-control', 'placeholder' => 'Maak een keuze uit de lijst']) !!}
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="checkbox icheck">
                                            {!! Form::hidden('mainboat', 0) !!}
                                            {!! Form::checkbox('mainboat', 1, true) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary">
                                            Opslaan
                                        </button>
                                    </div>
                                </div>
                            </tr>
                        </tbody>
                    </table>
                    <br/>

                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@stop
