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
                                    <th>Services</th>
                                    <th colspan="9">About Us</th>
                                    <th>admin</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="5">
                                            Total Services: <b>{{ count($services) }}</b> 
                                        </td>
                                        <td colspan="5">
                                            Total About Us: <b>{{ count($abouts) }}</b> 
                                        </td>
                                        <td colspan="5">
                                            Total Users:<b>{{ count($users) }}</b> 
                                        </td>
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
