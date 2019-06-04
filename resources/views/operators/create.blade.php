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
                                    <label for="exampleInputEmail1">სახელი/გვარი</label>
                                    <input type="text" name="username" class="form-control" value="{{old('firstname')}}">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-6">
                                    <label for="exampleInputPassword1">ელ-ფოსტა</label>
                                    <input type="email" name="email" class="form-control" value="{{old('email')}}">
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
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-6">
                                    <label for="exampleInputPassword1">პოზიცია</label>
                                    <select name="position_id" class="form-control">
                                        <option value="0">......</option>

                                    </select>
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

