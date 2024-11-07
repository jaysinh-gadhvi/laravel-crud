<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/all.min.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0"><?= $title ?></h4>
                    </div>
                    <div class="card-body">
                        <form id="user_form" class="p-3">
                            @csrf
                            <!-- Hidden ID field -->
                            <input type="hidden" id="id" name="id" value="<?= $user['id'] ?? '' ?>">

                            <div class="row">
                                <!-- Name -->
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fa-solid fa-person"></i> <!-- Add a suitable icon class here -->
                                        </span>
                                        <input type="text" id="name" name="name" value="<?= $user['name'] ?? '' ?>" class="form-control" placeholder="Enter your name">
                                    </div>
                                </div>

                                <!-- Age -->
                                <div class="col-md-6 mb-3">
                                    <label for="age" class="form-label">Age</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fa-solid fa-calendar-days"></i><!-- Add a suitable icon class here -->
                                        </span>
                                        <input type="number" id="age" name="age" value="<?= $user['age'] ?? '' ?>" class="form-control" placeholder="Enter your age">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Email -->
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fa-solid fa-envelope"></i> <!-- Add a suitable icon class here -->
                                        </span>
                                        <input type="email" id="email" name="email" value="<?= $user['email'] ?? '' ?>" class="form-control" placeholder="Enter your email">
                                    </div>
                                </div>

                                <!-- Password -->
                                <div class="col-md-6 mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fa-solid fa-lock"></i> <!-- Add a suitable icon class here -->
                                        </span>
                                        <input type="password" id="password" name="password" value="<?= $user['password'] ?? '' ?>" class="form-control" placeholder="Enter your password" <?= (!empty($user['password'])) ? 'desabled' : ''  ?>>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- City -->
                                <div class="col-md-6 mb-3">
                                    <label for="city" class="form-label">City</label>
                                    <select id="city" name="city" class="form-select">
                                        <option selected disabled>Select your city</option>
                                        <option value="New York" <?= (!empty($user['city']) && $user['city'] == 'New York') ? 'selected' : '' ?>>New York</option>
                                        <option value="Los Angeles" <?= (!empty($user['city']) && $user['city'] == 'Los Angeles') ? 'selected' : '' ?>>Los Angeles</option>
                                        <option value="Chicago" <?= (!empty($user['city']) && $user['city'] == 'Chicago') ? 'selected' : '' ?>>Chicago</option>
                                        <!-- Add more cities as needed -->
                                    </select>
                                </div>

                                <!-- Address -->
                                <div class="col-md-6 mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea id="address" name="address" class="form-control" placeholder="Enter your address">
                                        <?= $user['address'] ?? '' ?>
                                    </textarea>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Gender -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Gender</label>
                                    <div class="form-check">
                                        <input type="radio" id="male" name="gender" value="male" class="form-check-input"
                                            <?= (!empty($user['gender']) && $user['gender'] == 'male') ? 'checked' : '' ?>>
                                        <label for="male" class="form-check-label">Male</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" id="female" name="gender" value="female" class="form-check-input" <?= (!empty($user['gender']) && $user['gender'] == 'female') ? 'checked' : '' ?>>
                                        <label for="female" class="form-check-label">Female</label>
                                    </div>
                                </div>

                                <!-- Skills -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Skills</label>
                                    <div class="form-check">
                                        <input type="checkbox" id="html" name="skills[]" value="HTML" class="form-check-input" <?= (!empty($user['skills']) && in_array('HTML', $user['skills'])) ? 'checked' : '' ?>>
                                        <label for="html" class="form-check-label">HTML</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" id="css" name="skills[]" value="CSS" class="form-check-input" <?= (!empty($user['skills']) && in_array('CSS', $user['skills'])) ? 'checked' : '' ?>>
                                        <label for="css" class="form-check-label">CSS</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" id="php" name="skills[]" value="PHP" class="form-check-input" <?= (!empty($user['skills']) && in_array('PHP', $user['skills'])) ? 'checked' : '' ?>>
                                        <label for="php" class="form-check-label">PHP</label>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ ('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ ('assets/js/all.min.js') }}"></script>
    <script>
        $(function() {
            $("#user_form").submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "{{ route('user.save') }}",
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function(response) {
                        if (response.status) {
                            alert(response.message);
                            window.location.href = "{{ route('users') }}"
                        }
                    }
                });

            });
        });
    </script>
</body>

</html>