@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        პოზიციები
                        <a href="{{route('positions.create')}}" class="btn btn-sm btn-success ml-2">{{__('დამატება')}}</a>
                    </div>
                    @include('partials._messages')
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">დასახელება</th>
                                <th scope="col"><i class="fa fa-cogs" aria-hidden="true"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($positions as $position)
                                <tr>
                                    <th scope="row">{{$position->id}}</th>
                                    <td>{{$position->pos_name}}</td>
                                    <td>
                                        <div class="row">
                                            <a href="{{route('positions.edit',$position)}}" class="btn btn-warning btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <form method="post" action="{{route('positions.destroy',$position)}}">
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

