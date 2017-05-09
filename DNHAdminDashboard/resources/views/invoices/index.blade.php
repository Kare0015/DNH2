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
                        {{--Create a new table row for each invoice with the variables --}}
                        @foreach($invoices as $invoice)
                            <tr>
                                <td>{{$invoice->member->firstname}}</td>
                                <td>{{$invoice->member->prefix}}</td>
                                <td>{{$invoice->member->surname}}</td>
                                <td>{{$invoice->member->street."  ".$invoice->member->number.", ".$invoice->member->city}}</td>
                                {{--<td>{{$invoice->member->}}</td>--}}
                                <td>€ {{$invoice->totalamount}}</td>
                                <th>
                                    {{--Link to the singe view of a invoice--}}
                                    <a href="{{ URL::to('/admin/enkelefactuur/' . $invoice->id ) }})" class="btn btn-primary">Genereer deze factuur</a>
                                </th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <br/>

                    <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#confirmAll">
                        Genereer alle facturen ({{$totalInvoices}})
                    </button>
                </div>
                <!-- /.box-body -->
            </div>
            <div class="modal fade" id="confirmAll">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                            <h4 class="modal-title">Alle facturen generen</h4>
                        </div>
                        <div class="modal-body">
                            <p>Weet u zeker dat u alle facturen wilt generen?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Annuleren</button>
                            <a class="btn btn-primary" href="{{ URL::to('/facturen/overview') }}">Ja, genereer alle facturen ({{$totalInvoices}})</a>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </div>
    </div>
@stop
