@extends('layouts.master')

@section('title')
    Services Category | Funda of web IT
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Service Category</h4>
                    <a href="{{ url('create-service') }}" class="btn btn-primary float-right ">Add</a>
                </div>
            </div>
        </div>
    </div>
@endsection
