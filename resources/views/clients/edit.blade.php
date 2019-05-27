@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">კონტრაგენტის ცვლილება</div>
                    <div class="card-body">
                        @include('partials._messages')
                        <form action="{{route('clients.update', $client->id)}}" autocomplete="off" method="post">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class=" row form-group">
                                <div class="col-sm-6">
                                    <label for="exampleInputEmail1">სახელი</label>
                                    <input type="text" name="firstname" class="form-control" value="{{$client->firstname}}">
                                </div>
                                <div class="col-sm-6">
                                    <label for="exampleInputPassword1">გვარი</label>
                                    <input type="text" name="lastname" class="form-control" value="{{$client->lastname}}" >
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-6">
                                    <label for="exampleInputPassword1">ტელეფონი</label>
                                    <input type="text" name="mobile" class="form-control" value="{{$client->mobile}}">
                                </div>
                                <div class="col-sm-6">
                                    <label for="exampleInputPassword1">ელ-ფოსტა</label>
                                    <input type="email" name="email" class="form-control" value="{{$client->email}}">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-6">
                                    <label for="exampleInputPassword1">პირ. ნომერი</label>
                                    <input type="text" name="idnumber" class="form-control" value="{{$client->idnumber}}">
                                </div>
                                <div class="col-sm-6">
                                    <label for="exampleInputPassword1">დაბ. თარიღი</label>
                                    <input type='text' id="datetimepicker1" name="birthday" class="form-control" value="{{$client->birthday}}"/>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-4">
                                    <label for="">ქალაქი</label>
                                    <select name="city_id" class="form-control">
                                        <option value="{{$client->city->id}}">{{$client->city->name}}</option>
                                        <option value="0">...</option>
                                        @foreach($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-8">
                                    <label for="exampleInputPassword1">მისამართი</label>
                                    <input type="text" name="address" class="form-control" value="{{$client->address}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">საბანკო ა/ნ</label>
                                <input type="text" name="banknumber" class="form-control" value="{{$client->banknumber}}">
                            </div>
                            <div class="form-group">
                                <label>ინტერესები (ჰობი)</label>
                                <input type="text" name="interes" class="form-control" value="{{$client->interes}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">სამუშაო ადგილი</label>
                                <input type="text" multiple name="work_place" class="form-control" value="{{$client->work_place}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">ოჯახური მდგომარეობა (დაოჯახებული ხართ)</label>
                                <div class="form-group form-check">
                                    <input type="radio" value="yes"  name="family_status" class="form-check-input" {{($client->family_status == 'yes')?'checked':''}}>
                                    <label class="form-check-label" for="exampleCheck1">კი</label>
                                </div>
                                <div class="form-group form-check">
                                    <input type="radio" value="no"  name="family_status" class="form-check-input" {{($client->family_status == 'no')?'checked':''}}>
                                    <label class="form-check-label" for="exampleCheck1">არა</label>
                                </div>
                                <div class="family-show border p-2 ">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">მეუღლე (სახელი, გვარი, პირადი #, დაბ. თარიღი)</label>
                                        <input type="text" multiple name="wife"  class="form-control" value="{{($client->family_status == 'no')?'':$client->clienthasfamily->wife}}" >
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">შვილების (სახელი, გვარი, დაბ. თარიღი)</label>
                                        <input type="text" multiple name="childrens" class="form-control" value="{{($client->family_status == 'no')?'':$client->clienthasfamily->childrens}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-6">
                                    <label for="exampleInputPassword1">ხელოსნის ბარათი</label>
                                    <textarea name="card_id" class="form-control">{{$client->card_id}}</textarea>

                                </div>
                                <div class="col-sm-6">
                                    <label for="exampleInputPassword1">პოზიცია</label>
                                    <select name="position_id" class="form-control">
                                        <option value="{{$client->position_id}}">{{$client->position->pos_name}}</option>
                                        <option value="0">...</option>
                                        @foreach($positions as $position)
                                            <option value="{{$position->id}}">{{$position->pos_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group d-flex">
                                <label for="">ხელშეკრულების ვადები</label>
                                <div class="d-flex">
                                    <div class="col-sm-6">
                                        <input type='text' id="datetimepicker2" placeholder="დაწყება" name="agremeent_start" value="{{$client->agremeent_start}}" class="form-control"/>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type='text' id="datetimepicker3" placeholder="დამთავრება" name="agremeent_end" value="{{$client->agremeent_start}}" class="form-control"/>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">რედაქტირება</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

