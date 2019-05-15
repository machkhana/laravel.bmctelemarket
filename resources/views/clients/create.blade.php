@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">მთავარი გვერდი</div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="exampleInputEmail1">სახელი</label>
                                <input type="text" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">გვარი</label>
                                <input type="text" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">ტელეფონი</label>
                                <input type="text" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">ელ-ფოსტა</label>
                                <input type="text" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">პირ. ნომერი</label>
                                <input type="text" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">დაბ. თარიღი</label>
                                <input type="text" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">საბანკო ა/ნ</label>
                                <input type="text" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">ქალაქი</label>
                                <select name="city_id">
                                    @foreach($clients->city as $city)
                                    <option value="">{{$city->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">მისამართი</label>
                                <input type="text" class="form-control" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-primary">დამატება</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

