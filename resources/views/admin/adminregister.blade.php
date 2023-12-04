@extends('layouts.master')

@section('title')
    Registered Roles| Funda of web IT
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-plain">
                <div class="card-header">
                    <div class="card-body">
                        <h4 class="card-title"> Registered Roles</h4>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>ID</th>
                                    <th>NAME</th>
                                    <th>PHONE</th>
                                    <th>EMAIL</th>
                                    <th>USERTYPE</th>
                                    <th>EDIT</th>
                                    <th>DELETE</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <!-- admin/register.blade.php -->

                                        @foreach ($users as $user)
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>{{ $user->usertype }}</td>
                                            <td>
                                                <a class="btn btn-success" href="/registeredit/{{ $user->id }}">Edit</a>
                                            </td>
                                            <td>
                                                {{-- <a class="btn btn-danger"
                                                    href="{{ route('userdelete', ['id' => $user->id]) }}">DELETE</a> --}}
                                                <form action="{{ route('userdelete', ['id' => $user->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger" type="submit">Delete</button>
                                                </form>
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
    </div>
@endsection

@section('scripts')
@endsection
