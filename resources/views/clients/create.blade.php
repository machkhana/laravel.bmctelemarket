@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">კონტრაგენტის დამატება</div>
                    <div class="card-body">
                        <form action="{{route('clients.store')}}" autocomplete="off" method="post">
                            {{ @csrf_field() }}
                            {{ @method_field('POST') }}
                            <div class=" row form-group">
                                <div class="col-sm-6">
                                    <label for="exampleInputEmail1">სახელი</label>
                                    <input type="text" name="firstname" class="form-control" >
                                </div>
                                <div class="col-sm-6">
                                    <label for="exampleInputPassword1">გვარი</label>
                                    <input type="text" name="lastname" class="form-control" >
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-6">
                                    <label for="exampleInputPassword1">ტელეფონი</label>
                                    <input type="text" name="mobile" class="form-control" >
                                </div>
                                <div class="col-sm-6">
                                    <label for="exampleInputPassword1">ელ-ფოსტა</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-6">
                                    <label for="exampleInputPassword1">პირ. ნომერი</label>
                                    <input type="text" name="idnumber" class="form-control">
                                </div>
                                <div class="col-sm-6">
                                    <label for="exampleInputPassword1">დაბ. თარიღი</label>
                                    <input type='text' id="datetimepicker1" name="birhday" class="form-control"/>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-4">
                                    <label for="exampleInputPassword1">ქალაქი</label>
                                    <select name="city_id" class="form-control">
                                        <option value="0">.....</option>
                                        @foreach($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-8">
                                    <label for="exampleInputPassword1">მისამართი</label>
                                    <input type="text" name="address" class="form-control" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">საბანკო ა/ნ</label>
                                <input type="text" name="banknumber" class="form-control" >
                            </div>

                            <div class="form-group">
                                <label>ინტერესები (ჰობი)</label>
                                <select class="form-control chosen-select" multiple tabindex="4" name="intereses[]">
                                    <option value=""></option>
                                    <option value="United States">United States</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="Afghanistan">Afghanistan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">სამუშაო ადგილი</label>
                                <input type="text" multiple name="address" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">ოჯახური მდგომარეობა (დაოჯახებული ხართ)</label>
                                <input type="radio" value="yes"  name="family_status" class="form-control" >
                                <input type="radio" value="no"  name="family_status" class="form-control" >

                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">სამუშაო ადგილი</label>
                                <input type="text"  name="address" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">სამუშაო ადგილი</label>
                                <input type="text" multiple name="address" class="form-control" >
                            </div>
                            <button type="submit" class="btn btn-primary">დამატება</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


