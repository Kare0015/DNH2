@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Transactielijst</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <p>Deze pagina geeft een transactielijst weer waarin alle transacties terug komen.</p>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Leden</h3>
                    <a href="{{ url('/transaction/create') }}" class="btn btn-primary pull-right">Handmatig toevoegen</a>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Rubriek</th>
                            <th>Transactieomschrijving</th>
                            <th>Klantnaam</th>
                            <th>Bedrag</th>
                            <th>Factuurdatum</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($transactions as $transaction)
                            <tr>
                                <td>{{$transaction->category->name}}</td>
                                <td>{{$transaction['transactionname']}}</td>
                                <td>{{$transaction['customername']}}</td>
                                <td>€ {{$transaction['amount']}}</td>
                                <td>{{$transaction['created_at']}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <br/>
                </div>
            </div>
        </div>
    </div>
@stop