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
                                    <label for="">სახელი/გვარი</label>
                                    <input type="text" name="name" class="form-control" value="{{old('name')}}">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-6">
                                    <label for="">ელ-ფოსტა</label>
                                    <input type="email" name="email" class="form-control" value="{{old('email')}}">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-6">
                                    <label for="">პაროლი</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-6">
                                    <label for="">გაიმეორეთ პაროლი</label>
                                    <input type="password" name="confirm-password" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-4">
                                    <label for="tags">რეგიონი</label>
                                    <input id="tags" type="text" name="city_id" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-4">
                                    <label for="exampleInputPassword1">როლი</label>
                                    <select name="roles[]" class="form-control" multiple>
                                        <option value="0" selected disabled>აირჩიეთ როლები</option>
                                        @foreach($roles as $role)
                                            <option value="{{$role->name}}">{{$role->name}}</option>
                                        @endforeach
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



