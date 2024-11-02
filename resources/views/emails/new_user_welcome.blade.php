<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to the Construction Management System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="card mt-5 shadow-sm">
            <div class="card-body">
                <h3 class="card-title text-center mb-4">Welcome to the Construction Management System</h3>
                <p class="card-text">Hello {{ $name }},</p>
                <p class="card-text">We're excited to welcome you to the Construction Management System. Your account has been successfully created, and you can now log in to access your dashboard.</p>
                <p class="card-text mb-3">Here are your login details:</p>
                <ul class="list-group mb-3">
                    <li class="list-group-item"><strong>Email:</strong> {{ $email }}</li>
                    <li class="list-group-item"><strong>Password:</strong> {{ $password }}</li>
                </ul>
                <p class="card-text">To get started, please log in using the link below:</p>
                <p><a href="{{ $loginLink }}" class="btn btn-primary">{{ $loginLink }}</a></p>
                <p class="card-text mt-4">Thank you for joining us! If you have any questions, feel free to reach out.</p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>