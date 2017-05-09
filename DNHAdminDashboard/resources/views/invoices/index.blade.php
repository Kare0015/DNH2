@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Facturen generen</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <p>Selecteer hier de gebruikers om de facturen te genereren.</p>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Leden</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Voornaam</th>
                            <th>Tussenvoegsel</th>
                            <th>Achternaam</th>
                            <th>Adres</th>
                            <th>Totaalbedrag Factuur Periode {{date("Y")-1}}</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($invoices as $invoice)
                            <tr>
                                <td>{{$invoice->member->firstname}}</td>
                                <td>{{$invoice->member->prefix}}</td>
                                <td>{{$invoice->member->surname}}</td>
                                <td>{{$invoice->member->street."  ".$invoice->member->number.", ".$invoice->member->city}}</td>
                                {{--<td>{{$invoice->member->}}</td>--}}
                                <td>€ {{$invoice->totalamount}}</td>
                                <th>
                                    <a href=" URL::to('/admin/enkelefactuur/{{ $invoice->id  }})" class="btn btn-primary">Genereer deze factuur</a>
                                </th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <br/>
                    <a class="btn btn-primary" href="{{ URL::to('/facturen/overview') }}">Genereer alle facturen ({{$totalInvoices}})</a>p
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
@stop
