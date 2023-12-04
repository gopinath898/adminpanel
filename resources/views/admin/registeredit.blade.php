@extends('layouts.master')

@section('title')
    Edit-Registered Roles| Funda of web IT
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1>Edit Role for register User</h1>
                    </div>
                    <div class="card-body">
                        <div class="col-md-6">
                            <form action={{ route('registerupdateuser', ['id' => $users->id]) }} method="POST">
                                @csrf
                                {{ method_field('PUT') }}
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="username" value="{{ $users->name }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Give Role</label>
                                    <select name="usertype" class="form-control">
                                        <option value="admin">Admin</option>
                                        <option value="vendor">vendor</option>
                                        <option value="">None</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="/adminregister" class="btn btn-danger">cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
