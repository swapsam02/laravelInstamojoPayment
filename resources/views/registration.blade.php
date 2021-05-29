@extends('layout.index')

@section('content')
<div class="row">
    <div class="col-lg-12 mt40">
        <div class="header">
            <h2>Registration Form</h2>
        </div>
    </div>
</div>
     
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Opps!</strong> Something went wrong<br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
     
<form action="" method="POST">
    @csrf
     <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <strong>Name</strong>
                <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Email</strong>
                <input type="text" name="email" class="form-control" placeholder="Enter email" required>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Mobile Number</strong>
                <input type="text" name="mobile_number" class="form-control" placeholder="Enter Mobile Number" required>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Fees</strong>
                <input type="text" name="amount" class="form-control" placeholder="">
            </div>
        </div>
        <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
     
</form>
@endsection