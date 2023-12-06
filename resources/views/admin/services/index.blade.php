@extends('layouts.master')

@section('title')
    Services Category | Funda of web IT
@endsection

@section('content')
    <div class="modal fade" id="createService" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
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
                            <button type="submit" class="btn btn-success">SAVE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Service Category</h4>
                    <button class="btn btn-primary float-right" type="button" class="btn btn-primary"
                        data-bs-toggle="modal" data-bs-target="#createService">Add</button>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($services as $items)
                                    <td>{{ $items->id }}</td>
                                    <td>{{ $items->service_name }}</td>
                                    <td>{{ $items->service_description }}</td>
                                    <td>
                                        <a class="btn btn-success" href="/serviceedit/{{ $items->id }}">Edit</a>
                                    </td>
                                    <td>
                                        {{-- <a class="btn btn-danger"
                                            href="{{ route('userdelete', ['id' => $user->id]) }}">DELETE</a> --}}
                                        <form action="{{ route('servicedelete', ['id' => $items->id]) }}" method="POST">
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
@endsection
@section('scripts')
    <script>
        $(document).on('click', '.btn btn-danger', function() {
            var delete_id = $(this).data('id');

            // Set the delete_id to the modal for reference when the delete button is clicked
            $('#confirmDeleteButton').data('id', delete_id);

            // Show the Bootstrap modal
            $('#deleteConfirmationModal').modal('show');
        });

        //   Handle the delete confirmation when the modal's delete button is clicked
        $('#confirmDeleteButton').click(function() {
            var delete_id = $(this).data('id');

            var data = {
                "_token": $('input[name=_token]').val(),
                "id": delete_id
            };

            $.ajax({
                type: "DELETE",
                url: '/service-cate-delete/' + delete_id,
                data: data,
                success: function(response) {
                    // Show success message using Bootstrap alert
                    alert(response.status);

                    // Reload the page after successful deletion
                    location.reload();
                },
                error: function(xhr, status, error) {
                    // Handle errors if needed
                    console.error(xhr.responseText);
                }
            });

            // Hide the modal after processing
            $('#deleteConfirmationModal').modal('hide');
        });
    </script>
@endsection
