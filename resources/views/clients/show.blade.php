@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-5">კონტრაგენტი: {{$client->firstname.' '.$client->lastname}}</div>
                            <div class="col-sm-5">ოპერატორი: {{$client->users->name}}</div>
                            <div class="col-sm-2">
                                <a href="{{route('clients.edit',$client)}}"><button class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> </button></a>
                                <button onclick="print()" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('partials._messages')
                        <div class="row">
                            <div class="col-sm-6"></div>
                            <div class="col-sm-6">რეგისტრაციის თარიღი: {{substr($client->created_at,0,10)}}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 pb-2"><b>სახელი/გვარი:</b> {{$client->firstname.' '.$client->lastname}}</div>
                            <div class="col-sm-12 pb-2"><b>დაბადები თარიღი:</b> {{$client->birthday}}</div>
                            <div class="col-sm-12 pb-2"><b>პირადი ნომერი: </b>{{$client->idnumber}}</div>
                            <div class="col-sm-12 pb-2"><b>მისამართი: </b>{{$client->city->name.', '.$client->address}}</div>
                            <div class="col-sm-12 pb-2"><b>ტელეფონი: </b>{{$client->mobile}}</div>
                            <div class="col-sm-12 pb-2"><b>ელ-ფოსტა: </b>{{$client->email}}</div>
                            <div class="col-sm-12 pb-2"><b>საბანკო ა/ნ: </b>{{$client->banknumber}}</div>
                            <div class="col-sm-12 pb-2"><b>სამუშაო ადგილი: </b>{{$client->work_place}}</div>
                            <div class="col-sm-12 pb-2"><b>პოზიცია: </b>{{$client->position->pos_name}}</div>
                            <div class="col-sm-12 pb-2"><b>ინტერესები: </b>{{$client->interes}}</div>
                            <div class="col-sm-12 pb-2"><b>დაოჯახებულია: </b>{{($client->family_status == 'yes')?'კი':'არა'}}</div>
                            @if($client->family_status == 'yes')
                                <div class="border-info">
                                    <div class="col-sm-12 pb-2 ml-3"><b>მეუღლე: </b>{{$client->clienthasfamily->wife}}</div>
                                    <div class="col-sm-12 pb-2 ml-3"><b>შვილები: </b>{{$client->clienthasfamily->childrens}}</div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

