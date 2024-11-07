<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/all.min.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12">
                <div class="card shadow-sm">
                    <div class="card-header d-flex justify-content-between">
                        <div class="heading">
                            <h4 class="mb-0">User List</h4>
                        </div>
                        <div class="addUser">
                            <a href="{{ route('user.create') }}" class="btn btn-primary">Add User</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="user_table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Age</th>
                                        <th>Email</th>
                                        <th>City</th>
                                        <th>Gender</th>
                                        <th>Skills</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($users)): ?>
                                        <?php foreach ($users as $user): ?>
                                            <tr>
                                                <td><?= $user['id'] ?></td>
                                                <td><?= $user['name'] ?></td>
                                                <td><?= $user['age'] ?></td>
                                                <td><?= $user['email'] ?></td>
                                                <td><?= $user['city'] ?></td>
                                                <td><?= $user['gender'] ?></td>
                                                <td><?= $user['skills'] ?></td>
                                                <td>
                                                    <a href="{{ route('user.create',$user['id']) }}" class="btn btn-sm btn-warning" id='edit' data-id='${val.id}'>Edit</a>
                                                    <button class="btn btn-sm btn-danger" id='delete' data-id='<?= $user['id'] ?>'>Delete</button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/all.min.js') }}"></script>
    <script>
        $(function() {
            $(document).on('click', "#delete", function() {
                let id = $(this).data('id');
                let confirmation = confirm("Are You Sure to Delete This Record");
                if (confirmation) {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('user.delete') }}",
                        data: {
                            _token: "{{ csrf_token() }}",
                            id: id
                        },
                        dataType: "json",
                        success: function(response) {
                            if (response.status) {
                                alert(response.message);
                                window.location.reload();
                            }
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>