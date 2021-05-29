@extends('layout.index')

@section('content')
<div class="row">
    <div class="col-lg-12 mt40">
        <div class="header">
            <h2>Payment Done</h2>
        </div>
    </div>
</div>
<div class="container">
    <table class="table table-bordered">
        <tr>
            <th width="30%">Payment Status</th>
            <td>{{ $response->payment->status }}</td>
        </tr>
        <tr>
            <th>Name</th>
            <td>{{ $response->payment->buyer_name }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $response->payment->buyer_email }}</td>
        </tr>
        <tr>
            <th>Mobile</th>
            <td>{{ $response->payment->buyer_phone }}</td>
        </tr>
        <tr>
            <th>Amount</th>
            <td>{{ $response->payment->amount }}</td>
        </tr>
    </table>
</div>
@endsection