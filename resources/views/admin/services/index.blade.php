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
