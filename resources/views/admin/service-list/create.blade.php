@extends('layouts.master')

@section('title')
    Services Category | Funda of web IT
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-body">
                        <h4 class="card-title">Service Category
                            <a href="{{ url('service-category') }}" class="btn btn-primary float-right ">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('service-store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Service Cate Name</label>
                                        <input type="text" name="service_name" class="form-control"
                                            placeholder="Enter Service Name">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> Service Description</label>
                                        <textarea name="service_description" class="form-control" id="message-text" placeholder="Enter Service Name"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-info">SAVE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
