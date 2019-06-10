@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8">კონტრაგენტების ჩამონათვალი</div>
                            <div class="col-md-4 text-right">
                                <a href="{{route('clients.create')}}" class="btn btn-sm btn-success ml-2">{{__('დამატება')}}</a>
                                <a href="" class="btn btn-primary ml-2 float-right" data-toggle="tooltip" data-placement="top" title="export XLSX"><i class="fa fa-file-excel-o"></i> </a>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <a href="" class="btn btn-sm btn-success ml-2 ">{{__('ყველა')}}</a>
                                <a href="" class="btn btn-sm btn-success ml-2 ">{{__('გაუქმებული')}}</a>
                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                    </div>
                    @include('partials._messages')
                    <div class="card-body">
                        <table class="table table-hover" id="example">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">სახელი</th>
                                <th scope="col">გვარი</th>
                                <th scope="col">ტელეფონი</th>
                                <th scope="col">პოზიცია</th>
                                <th scope="col">ბარათი</th>
                                <th scope="col">რეგ. თარიღი</th>
                                <th scope="col"><i class="fa fa-cogs" aria-hidden="true"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($clients as $client)
                                <tr>
                                    <th scope="row">{{$client->id}}</th>
                                    <td>{{$client->firstname}}</td>
                                    <td>{{$client->lastname}}</td>
                                    <td>{{$client->mobile}}</td>
                                    <td>@if(!empty($client->position->pos_name)){{$client->position->pos_name }}@endif</td>
                                    <td>{{$client->card_id}}</td>
                                    <td>{{substr($client->created_at,0,10)}}</td>
                                    <td class="text-right">
                                        <div class="btn-group" role="group">
                                            <a href="{{url('contract',$client)}}" onClick="window.open(this.href,'myWindow','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=900,height=400'); return false;" class="btn btn-sm btn-secondary" data-toggle="tooltip" data-placement="top" title="ხელშეკრულება"><i class="fa fa-print" aria-hidden="true"></i></a>
                                            <a href="{{url('appendix',$client)}}" onClick="window.open(this.href,'myWindow','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=900,height=400'); return false;" class="btn btn-sm btn-secondary" data-toggle="tooltip" data-placement="top" title="დანართი"><i class="fa fa-print" aria-hidden="true"></i></a>
                                            <a href="{{route('clients.show',$client)}}" class="btn btn-sm btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a href="{{route('clients.edit',$client)}}" class="btn btn-warning btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <form method="post" action="{{route('clients.destroy',$client)}}">
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

