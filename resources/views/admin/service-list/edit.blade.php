@extends('layouts.master')

@section('title')
    Services Category Edit | Funda of web IT
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-body">
                        <h4 class="card-title">Service List Edit
                            <a href="{{ url('service-category') }}" class="btn btn-primary float-right ">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('serviceListUpdate', ['id'=>$serviceList->id]) }}" method="POST">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <select class="form-select w-100" name="serv_cate_id" id="serv_cate_id">
                                            @foreach ($services as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $item->id == $serviceList->serv_cate_id? 'selected' : '' }}>
                                                    {{ $item->service_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="title" id="title"
                                            placeholder="Please enter the service name" value="{{ $serviceList->title }}">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="description" id="description"
                                            placeholder="Please enter the description"
                                            value="{{ $serviceList->description }}">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="price" id="price"
                                            placeholder="Please enter the service price" value="{{ $serviceList->price }}">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="duration" id="duration"
                                            placeholder="Please enter the service duration"
                                            value="{{ $serviceList->duration }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success">SAVE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
