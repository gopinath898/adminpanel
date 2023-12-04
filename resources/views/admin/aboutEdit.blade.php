@extends('layouts.master')

@section('title')
    About -  Edit Page
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
                            <form action={{ route('aboutUpdate', ['id' => $aboutItem->id]) }} method="POST">
                                @csrf
                                {{ method_field('PUT') }}
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Title:</label>
                                    <input type="text" name="title" class="form-control" id="recipient-name" value="{{ $aboutItem->title }}">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Sub-Title:</label>
                                    <input type="text" name="subtitle" class="form-control" id="recipient-name" value="{{ $aboutItem->subtitle }}">
                                </div>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Description:</label>
                                    <textarea name="description" class="form-control" id="message-text">{{ $aboutItem->description }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
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
