<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts DataTable</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Posts List</h4>
                        <button class="btn btn-primary float-end" data-bs-toggle="modal"
                            data-bs-target="#createPostModal">Create Post</button>

                    </div>
                    @include('post::modal.create');
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="posts-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Author</th>
                                        <th>Title</th>
                                        <th>Content</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!--create and Edit Post Modal -->

    @include('post::modal.edit');


    <!-- Bootstrap 5 JS CDN (optional) -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#posts-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('post.data') }}",
                    type: 'GET'
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'author',
                        name: 'author'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'content',
                        name: 'content'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }

                ],
                order: [
                    [0, 'desc']
                ],
                pageLength: 10,
                lengthMenu: [
                    [10, 25, 50, 100, 500],
                    [10, 25, 50, 100, 500]
                ]
            });

            $(document).on('click', '.editBtn', function() {
                const postId = $(this).data('id');

                $.get("/post/" + postId + "/edit", function(post) {
                    $('#editPostId').val(post.id);
                    $('#editTitle').val(post.title);
                    $('#editContent').val(post.content);

                    $('#editPostModal').modal('show');
                });
            });

            $('#editPostForm').submit(function(e) {
                e.preventDefault();

                const postId = $('#editPostId').val();
                const formData = {
                    title: $('#editTitle').val(),
                    content: $('#editContent').val(),
                    _token: "{{ csrf_token() }}",
                    _method: "PUT"
                };

                $.ajax({
                    url: "/post/" + postId,
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        $('#editPostModal').modal('hide');
                        $('#posts-table').DataTable().ajax.reload(null, false);
                        alert(response.message);
                    },
                    error: function(xhr) {
                        alert("Update failed");
                    }
                });
            });



            $(document).on('click', '.deleteBtn', function() {
                const postId = $(this).data('id');

                if (confirm("Are you sure you want to delete this post?")) {
                    $.ajax({
                        url: "/post/" + postId,
                        type: "DELETE",
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            $('#posts-table').DataTable().ajax.reload(null, false);
                            alert(response.message);
                        },
                        error: function() {
                            alert("Failed to delete post.");
                        }
                    });
                }
            });


            $('#createPostForm').on('submit', function(e) {
                e.preventDefault();

                let formData = {
                    user_id: $('#user_id').val(),
                    title: $('#createTitle').val(),
                    content: $('#createContent').val(),
                    _token: '{{ csrf_token() }}'
                };

                $.ajax({
                    url: '{{ route('post.store') }}',
                    type: 'POST',
                    data: formData,
                    success: function(response) {

                        alert('Post created successfully!');
                        $('#createPostForm')[0].reset();
                        $('#createPostModal').modal('hide');
                        $('#posts-table').DataTable().ajax.reload(null, false);
                    },
                    error: function(xhr) {
                        alert('Something went wrong');
                        console.log(xhr.responseText);
                    }
                });
            });

        });
    </script>
</body>

</html>
