@extends('admin.partials.layout')

@section('title', 'Category Management')

@section('content')
    <div class="content-wrapper">
        <div class="page-heading">
            <h1 class="page-title">Category Management</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}"><i class="la la-home font-20"></i></a>
                </li>
            </ol>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="page-content fade-in-up">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Category List</div>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#createCategoryModal">Add New Category</button>
                </div>
                <div class="ibox-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="categories-table" width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category Name</th>
                                    <th>Service Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $index => $category)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->service->name }}</td>
                                        <td>
                                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#editCategoryModal{{ $category->id }}">
                                                <i data-feather="edit"></i> Edit
                                            </button>
                                            <button class="btn btn-danger btn-sm delete-category" data-id="{{ $category->id }}">
                                                <i data-feather="trash-2"></i> Delete
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Edit Category Modal for each category -->
                                    <div class="modal fade" id="editCategoryModal{{ $category->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Category</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('categories.update', $category->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <label for="service_id">Service Name</label>
                                                        <select id="service_id" name="service_id" class="form-control">
                                                            @foreach ($services as $service)
                                                                <option value="{{ $service->id }}" {{ $service->id == $category->service_id ? 'selected' : '' }}>
                                                                    {{ $service->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                        <label for="name">Category Name</label>
                                                        <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Edit Category Modal -->
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Category Modal -->
    <div class="modal fade" id="createCategoryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create New Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <label for="service_id">Service Name</label>
                        <select id="service_id" name="service_id" class="form-control">
                            <option value="">Select Service</option>
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                            @endforeach
                        </select>
                        <label for="name">Category Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize DataTable
            $('#categories-table').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "lengthMenu": [10, 25, 50, 100],
                "pageLength": 10
            });
    
            // Delete Category Function
            $('.delete-category').click(function() {
                let categoryId = $(this).data('id');
    
                if (confirm('Are you sure you want to delete this category?')) {
                    $.ajax({
                        url: "{{ route('categories.destroy', ':categoryId') }}".replace(':categoryId', categoryId),
                        type: "POST",
                        data: {
                            _method: "DELETE",
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            if (response.success) {
                                alert(response.message); // Show success message
                                location.reload();
                            } else {
                                alert('Something went wrong. Please try again.');
                            }
                        },
                        error: function(xhr) {
                            let errorMessage = 'Error deleting category.';
                            if (xhr.responseJSON && xhr.responseJSON.message) {
                                errorMessage = xhr.responseJSON.message;
                            }
                            alert(errorMessage);
                        }
                    });
                }
            });
        });
    </script>
    
@endsection
