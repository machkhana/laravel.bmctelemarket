@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8">დასარეკათ ჩანიშნული ზარები</div>
                            <div class="col-md-4 text-right">
                                <a href="{{route('calls.create')}}" class="btn btn-sm btn-success ml-2">{{__('დამატება')}}</a>
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
                                <th scope="col">დარეკვა</th>
                                <th scope="col"><i class="fa fa-cogs" aria-hidden="true"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($calls as $call)
                                <tr>
                                    <th scope="row">{{$call->id}}</th>
                                    <td>{{$call->clients->firstname}}</td>
                                    <td>{{$call->clients->lastname}}</td>
                                    <td>{{$call->clients->mobile}}</td>
                                    <td>@if(!empty($client->position->pos_name)){{$client->position->pos_name }}@endif</td>
                                    <td>{{$client->card_id}}</td>
                                    <td>{{substr($client->created_at,0,10)}}</td>
                                    <td class="text-right">
                                        <div class="btn-group" role="group">
                                            <a href="{{url('contract',$client)}}" onClick="window.open(this.href,'myWindow','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=900,height=400'); return false;" class="btn btn-sm btn-secondary" data-toggle="tooltip" data-placement="top" title="ხელშეკრულება"><i class="fa fa-print" aria-hidden="true"></i></a>
                                            <a href="{{url('appendix',$client)}}" onClick="window.open(this.href,'myWindow','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=900,height=400'); return false;" class="btn btn-sm btn-secondary" data-toggle="tooltip" data-placement="top" title="დანართი"><i class="fa fa-print" aria-hidden="true"></i></a>
                                            <a href="{{route('clients.show',$client)}}" class="btn btn-sm btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <button class="btn btn-info btn-sm addcall" data-toggle="modal" data-target="#mymodal-call-add" data-id="{{$client->id}}"><i class="fa fa-phone-square"></i> </button>
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
    <!-- Modal -->
    <div class="modal fade" id="mymodal-call-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">დასარეკი ზარი</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('calls.store')}}" method="post">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="client_id">
                        <div class="form-group">
                            <input type='text' id="datetimepicker1" name="calldate" class="form-control" value="{{old('calldate')}}" placeholder="აირჩიეთ დარეკვის თარიღი" required/>
                        </div>
                        <div class="form-grup">
                            <textarea name="text" class="form-control" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary">გასუფთავება</button>
                        <button type="submit" class="btn btn-primary">დამატება</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

