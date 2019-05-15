@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">მთავარი გვერდი</div>
                    <div class="card-body">
                        <form action="{{route('clients.store')}}"method="post">
                            {{ @csrf_field() }}
                            {{ @method_field('POST') }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">სახელი</label>
                                <input type="text" name="firstname" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">გვარი</label>
                                <input type="text" name="lastname" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">ტელეფონი</label>
                                <input type="text" name="mobile" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">ელ-ფოსტა</label>
                                <input type="text" name="email" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">პირ. ნომერი</label>
                                <input type="text" name="idnumber" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">დაბ. თარიღი</label>
                                <input type="text" name="birthday" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">საბანკო ა/ნ</label>
                                <input type="text" name="banknumber" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">ქალაქი</label>
                                <select name="city_id" class="form-control">
                                    @foreach($clients->city as $city)
                                        <option value="">{{$city->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">მისამართი</label>
                                <input type="text" name="address" class="form-control" >
                            </div>
                            <button type="submit" class="btn btn-primary">დამატება</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

