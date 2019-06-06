@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        კონტრაგენტების ჩამონათვალი
                        <a href="{{route('operators.create')}}" class="btn btn-sm btn-success ml-2">{{__('დამატება')}}</a>
                    </div>
                    @include('partials._messages')
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">სახელი/გვარი</th>
                                <th scope="col">Email</th>
                                <th scope="col">რეგიონი</th>
                                <th scope="col">როლი</th>
                                <th scope="col"><i class="fa fa-cogs" aria-hidden="true"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($operators as $operator)
                                <tr>
                                    <th scope="row">{{$operator->id}}</th>
                                    <td>{{$operator->name}}</td>
                                    <td>{{$operator->email}}</td>
                                    <td>{{$operator->city}}</td>
                                    <td>
                                        {!! $operator->getRoleNames() !!}
                                    </td>
                                    <td>
                                        <div class="row">
                                            <a href="{{route('operators.show',$operator)}}" class="btn btn-sm btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a href="{{route('operators.edit',$operator)}}" class="btn btn-warning btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <form method="post" action="{{route('operators.destroy',$operator)}}">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}
                                                <button class="btn btn-sm btn-danger "><i class="fa fa-trash" aria-hidden="true"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

