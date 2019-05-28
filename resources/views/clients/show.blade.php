@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-10">კონტრაგენტი: {{$client->firstname.' '.$client->lastname}}</div>
                            <div class="col-sm-2">
                                <a href="{{route('clients.edit',$client)}}"><button class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> </button></a>
                                <button onclick="print()" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('partials._messages')
                        <div class="row">
                            <div class="col-sm-6">{{$client->firstname.' '.$client->lastname}}</div>
                            <div class="col-sm-6"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

