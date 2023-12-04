@extends('layouts.master')

@section('title')
    Dashboard | Funda of web IT
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-plain">
                <div class="card-header">
                    <div class="card-body">
                        <h4 class="card-title"> Simple table</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>name</th>
                                    <th>Country</th>
                                    <th>city</th>
                                    <th>Salary</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>rice</td>
                                        <td>rice</td>
                                        <td>rice</td>
                                        <td>rice</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
