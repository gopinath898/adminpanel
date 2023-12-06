@extends('layouts.master')

@section('title')
    Services Category | Funda of web IT
@endsection

@section('content')
    <div class="modal fade" id="createServiceList" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('storeServiceList') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <select class="form-select w-100" name="serv_cate_id" id="serv_cate_id">
                                        <option selected disabled>Select service category</option>
                                        @foreach ($services as $item)
                                            <option value={{$item->id}}>{{$item->service_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="title"  id="title" placeholder="Please enter the service name">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="description" id="description" placeholder="Please enter the description">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="price" id="price" placeholder="Please enter the service price">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="duration" id="duration" placeholder="Please enter the service duration">
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
                    <h4 class="card-title">Service List</h4>
                    <button class="btn btn-primary float-right" type="button" class="btn btn-primary"
                        data-bs-toggle="modal" data-bs-target="#createServiceList">Add</button>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category Name </th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Duration</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($serviceList as $items)
                                    <td>{{ $items->id }}</td>
                                    <td>{{ $items->service_category->service_name}}</td>
                                    <td>{{ $items->title }}</td>
                                    <td>{{ $items->description }}</td>
                                    <td>{{ $items->price }}</td>
                                    <td>{{ $items->duration }}</td>
                                    <td>
                                        <a class="btn btn-success" href="{{ route('serviceListEditView', ['id'=>$items->id]) }}">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('serviceListDelete', ['id' => $items->id]) }}" method="POST">
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
