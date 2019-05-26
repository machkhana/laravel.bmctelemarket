@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">კონტრაგენტების ჩამონათვალი</div>
                    @include('partials._messages')
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">სახელი</th>
                                <th scope="col">გვარი</th>
                                <th scope="col">ტელეფონი</th>
                                <th scope="col">პოზიცია</th>
                                <th scope="col">ბარათი</th>
                                <th scope="col">რეგ. თარიღი</th>
                                <th scope="col"><i class="fa fa-cogs" aria-hidden="true"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($clients as $client)
                                <tr>
                                    <th scope="row">{{$client->id}}</th>
                                    <td>{{$client->firstname}}</td>
                                    <td>{{$client->lastname}}</td>
                                    <td>{{$client->mobile}}</td>
                                    <td>{{$client->position_id}}</td>
                                    <td>{{$client->lastname}}</td>
                                    <td>{{$client->lastname}}</td>
                                    <td>
                                        <a href="{{route('clients.show',$client->id)}}"><button class="btn btn-sm btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></button> </a>
                                        <a href="{{route('clients.edit',$client->id)}}"><button class="btn btn-warning btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

