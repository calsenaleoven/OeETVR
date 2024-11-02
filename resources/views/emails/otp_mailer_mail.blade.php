<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Update Verification - Construction Management System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="card mt-5 shadow-sm">
            <div class="card-body">
                <h3 class="card-title text-center mb-4">Password Update Verification</h3>
                <p class="card-text">Hello {{ $name }},</p>
                <p class="card-text">We noticed a recent update to your password. To ensure the security of your account, please verify this action by entering the OTP below:</p>
                <ul class="list-group mb-3">
                    <li class="list-group-item"><strong>Email:</strong> {{ $email }}</li>
                    <li class="list-group-item"><strong>One-Time Password (OTP):</strong> {{ $otp }}</li>
                </ul>
                <p class="card-text">If you did not request this password update, please disregard this message or delete it.</p>
                <p class="card-text mt-4">Thank you for helping us keep your account secure!</p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>