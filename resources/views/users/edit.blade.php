@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">ოპერატორის რედაქტირება</div>
                    <div class="card-body">
                        @include('partials._messages')
                        <form action="{{route('users.update',$user)}}" autocomplete="off" method="post">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class=" row form-group">
                                <div class="col-sm-6">
                                    <label for="">სახელი/გვარი</label>
                                    <input type="text" name="name" class="form-control" value="{{$user->name}}">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-6">
                                    <label for="">ელ-ფოსტა</label>
                                    <input type="email" name="email" class="form-control" value="{{$user->email}}">
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
                                    <input id="tags" type="text" name="city_id" class="form-control" value="{{  $user->city_id }}">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-4">
                                    <label for="exampleInputPassword1">როლი: </label>
                                    @if(!empty($user->getRoleNames()))
                                        @foreach($user->getRoleNames() as $v)
                                            <label>{{$v}}</label>
                                        @endforeach
                                    @endif
                                    <select name="roles[]" class="form-control" multiple>
                                        @foreach($roles as $role)
                                            <option value="{{$role->name}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{--<div class="row form-group">--}}
                                {{--<div class="col-sm-4">--}}
                                    {{--<label for="exampleInputPassword1">დაშვება</label>--}}
                                    {{--<select name="permissions[]" class="form-control" multiple>--}}
                                        {{--@if(!empty($operator->getRoleNames()))--}}
                                            {{--@foreach($operator->getRoleNames() as $v)--}}
                                                {{--<option value="{{$v}}" selected>{{$v}}</option>--}}
                                            {{--@endforeach--}}
                                        {{--@endif--}}
                                        {{--@foreach($permissions as $p)--}}
                                            {{--<option value="{{$p->name}}">{{$p->name}}</option>--}}
                                        {{--@endforeach--}}
                                    {{--</select>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <button type="submit" class="btn btn-primary">ჩასწორება</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

