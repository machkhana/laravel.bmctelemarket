@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">მთავარი გვერდი</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <p><h4>სულ დარეგისტრირებული კონტრაგენტები</h4></p>
                            <p class="text-center btn btn-success">{{$clients}}</p>
                        </div>
                        <div class="col-md-6 text-center">
                            <p><h4>კონტრაგენტების დაბ. დღეები</h4></p>
                            <p class="text-center btn btn-success">0</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <p><h4>აქტიური კონტრაგენტი</h4></p>
                            <p class="text-center btn btn-success">0</p>
                        </div>
                        <div class="col-md-6 text-center">
                            <p><h4>პასიური კონტრაგენტი</h4></p>
                            <p class="text-center btn btn-success">0</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
