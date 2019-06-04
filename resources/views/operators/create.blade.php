@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">ოპერატორის დამატება</div>
                    <div class="card-body">
                        @include('partials._messages')
                        <form action="{{route('operators.store')}}" autocomplete="off" method="post">
                            {{ csrf_field() }}
                            <div class=" row form-group">
                                <div class="col-sm-6">
                                    <label for="exampleInputEmail1">სახელი</label>
                                    <input type="text" name="firstname" class="form-control" value="{{old('firstname')}}">
                                </div>
                                <div class="col-sm-6">
                                    <label for="exampleInputPassword1">გვარი</label>
                                    <input type="text" name="lastname" class="form-control" value="{{old('lastname')}}" >
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-6">
                                    <label for="exampleInputPassword1">ტელეფონი</label>
                                    <input type="text" name="mobile" class="form-control" value="{{old('mobile')}}">
                                </div>
                                <div class="col-sm-6">
                                    <label for="exampleInputPassword1">ელ-ფოსტა</label>
                                    <input type="email" name="email" class="form-control" value="{{old('email')}}">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-6">
                                    <label for="exampleInputPassword1">პირ. ნომერი</label>
                                    <input type="text" name="idnumber" class="form-control" value="{{old('idnumber')}}">
                                </div>
                                <div class="col-sm-6">
                                    <label for="exampleInputPassword1">დაბ. თარიღი</label>
                                    <input type='text' id="datetimepicker1" name="birthday" class="form-control" value="{{old('birthday')}}"/>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-4">
                                    <label for="">ქალაქი</label>
                                    <select name="city_id" class="form-control">
                                        <option value="0">.....</option>
                                        @foreach($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-8">
                                    <label for="exampleInputPassword1">მისამართი</label>
                                    <input type="text" name="address" class="form-control" value="{{old('address')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">საბანკო ა/ნ</label>
                                <input type="text" name="banknumber" class="form-control" value="{{old('banknumber')}}">
                            </div>
                            <div class="form-group">
                                <label>ინტერესები (ჰობი)</label>
                                <input type="text" name="interes" class="form-control" value="{{old('interes')}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">სამუშაო ადგილი</label>
                                <input type="text" multiple name="work_place" class="form-control" value="{{old('work_place')}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">ოჯახური მდგომარეობა (დაოჯახებული ხართ)</label>
                                <div class="form-group form-check">
                                    <input type="radio" value="yes"  name="family_status" class="form-check-input" >
                                    <label class="form-check-label" for="exampleCheck1">კი</label>
                                </div>
                                <div class="form-group form-check">
                                    <input type="radio" value="no"  name="family_status" class="form-check-input" >
                                    <label class="form-check-label" for="exampleCheck1">არა</label>
                                </div>
                                <div class="family-show border p-2 ">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">მეუღლე (სახელი, გვარი, პირადი #, დაბ. თარიღი)</label>
                                        <input type="text" multiple name="wife"  class="form-control" >
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">შვილების (სახელი, გვარი, დაბ. თარიღი)</label>
                                        <input type="text" multiple name="childrens" class="form-control" >
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-6">
                                    <label for="exampleInputPassword1">ხელოსნის ბარათი</label>
                                    <textarea name="card_id" class="form-control"></textarea>

                                </div>
                                <div class="col-sm-6">
                                    <label for="exampleInputPassword1">პოზიცია</label>
                                    <select name="position_id" class="form-control">
                                        <option value="0">......</option>
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
                                        <input type='text' id="datetimepicker2" placeholder="დაწყება" name="agremeent_start" class="form-control"/>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type='text' id="datetimepicker3" placeholder="დამთავრება" name="agremeent_end" class="form-control"/>
                                    </div>
                                </div>
                            </div>
                            <button type="reset" class="btn btn-warning">გასუფთავება</button>
                            <button type="submit" class="btn btn-primary">დამატება</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

