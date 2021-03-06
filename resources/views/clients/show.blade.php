@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-5">კონტრაგენტი: {{$client->firstname.' '.$client->lastname}}</div>
                            <div class="col-sm-5">ოპერატორი:
                                @if(!empty($client->users->name))
                                {{$client->users->name}}
                                @else
                                    {{__('ოპერატორი ვერ მოიძებნა')}}
                                @endif
                            </div>
                            <div class="col-sm-2 float-right">
                                <a href="{{route('clients.edit',$client)}}"><button class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> </button></a>
                                <a href="{{url('contract',$client)}}" onClick="window.open(this.href,'myWindow','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=900,height=400'); return false;" class="btn btn-sm btn-secondary" data-toggle="tooltip" data-placement="top" title="ხელშეკრულება"><i class="fa fa-print" aria-hidden="true"></i></a>
                                <a href="{{url('appendix',$client)}}" onClick="window.open(this.href,'myWindow','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=900,height=400'); return false;" class="btn btn-sm btn-secondary" data-toggle="tooltip" data-placement="top" title="დანართი"><i class="fa fa-print" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('partials._messages')
                        <div class="row border-bottom">
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
                            <div class="col-sm-12 pb-2"><b>ხელოსნის ბარათის #: </b>{{$client->card_id}}</div>
                            <div class="col-sm-12 pb-2 border-top"><b>დაოჯახებულია: </b>{{($client->family_status == 'yes')?'კი':'არა'}}</div>
                            @if($client->family_status == 'yes')
                                <div class="border-info">
                                    <div class="col-sm-12 pb-2 ml-3"><b>მეუღლე: </b>{{$client->clienthasfamily->wife}}</div>
                                    <div class="col-sm-12 pb-2 ml-3"><b>შვილები: </b>{{$client->clienthasfamily->childrens}}</div>
                                </div>
                            @endif
                            <div class="container border-top">
                                <label><b>ხელშეკრულების ვადები:</b></label>
                                <div class="row">
                                    <div class="col-sm-6">დასაწყისი: {{$client->agremeent_start}}</div>
                                    <div class="col-sm-6">დასასრული: {{$client->agremeent_end}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

