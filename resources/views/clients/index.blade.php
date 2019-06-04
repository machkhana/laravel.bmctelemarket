@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        კონტრაგენტების ჩამონათვალი
                        <a href="{{route('clients.create')}}" class="btn btn-sm btn-success ml-2">{{__('დამატება')}}</a>
                    </div>
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
                                    <td>{{$client->position->pos_name }}</td>
                                    <td>{{$client->card_id}}</td>
                                    <td>{{$client->created_at}}</td>
                                    <td>
                                        <div class="row">
                                            <a href="{{route('clients.show',$client)}}" class="btn btn-sm btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a href="{{route('clients.edit',$client)}}" class="btn btn-warning btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <form method="post" action="{{route('clients.destroy',$client)}}">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}
                                                <button class="btn btn-sm btn-danger "><i class="fa fa-trash" aria-hidden="true"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $clients->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

