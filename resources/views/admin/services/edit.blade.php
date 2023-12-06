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
                        <h4 class="card-title">Service Category Edit
                            <a href="{{ url('service-category') }}" class="btn btn-primary float-right ">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('serviceUpdate', ['id' => $service_category->id]) }}" method="POST">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Service Cate Name</label>
                                        <input type="text" name="service_name" class="form-control"
                                            value="{{ $service_category->service_name }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> Service Description</label>
                                        <textarea name="service_description" class="form-control" id="message-text">{{ $service_category->service_description }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-info">update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
