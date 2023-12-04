@extends('layouts.master')

@section('title')
    About Us | Funda of web IT
@endsection

@section('content')
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add About Us</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                   
                </div>
                <form action="/saveaboutus" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Title:</label>
                            <input type="text" name="title" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Sub-Title:</label>
                            <input type="text" name="subtitle" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Description:</label>
                            <textarea name="description" class="form-control" id="message-text"></textarea>
                        </div>

                    </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-plain">
                <div class="card-header">
                    <div class="card-body">
                        <h4 class="card-title"> About Us
                            <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">Add</button> @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                        </h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>id</th>
                                    <th>title</th>
                                    <th>subtitle</th>
                                    <th>description</th>
                                    <th>edit</th>
                                    <th>delete</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>rice</td>
                                        <td>rice</td>
                                        <td>rice</td>
                                        <td>rice</td>
                                        <td>
                                            <a href="#" class="btn btn-success">EDIT</a>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-danger">DELETE</a>
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
