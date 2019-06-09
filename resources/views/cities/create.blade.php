@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">პოზიციის დამატება</div>
                    <div class="card-body">
                        @include('partials._messages')
                        <form action="{{route('cities.store')}}" autocomplete="off" method="post">
                            {{ csrf_field() }}
                            <div class=" row form-group">
                                <div class="col-sm-6">
                                    <label for="">დასახელება</label>
                                    <input type="text" name="name" class="form-control" value="{{old('name')}}">
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

