<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            font-family: 'Arial', sans-serif;
        }

        .login-container {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            width: 100%;
            max-width: 450px;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }

        h3 {
            font-size: 2rem;
            font-weight: 600;
            color: #333;
            text-align: center;
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
            transition: all 0.3s ease;
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }

        .form-control {
            border-radius: 8px;
            padding: 12px;
            font-size: 1rem;
            margin-bottom: 15px;
        }

        .text-danger {
            font-size: 0.875rem;
        }

        .alert {
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
        }

        .form-label {
            font-size: 1.1rem;
            color: #555;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="card p-5 shadow-lg">
            <h3 class="mb-4">Login</h3>

            <form action="{{ route('login.auth') }}" method="POST">
                @csrf

                @if (Session::get('failed'))
                    <div class="alert alert-danger">{{ Session::get('failed') }}</div>
                @endif

                @if (Session::get('logout'))
                    <div class="alert alert-danger">{{ Session::get('logout') }}</div>
                @endif

                @if (Session::get('canAccess'))
                    <div class="alert alert-danger">{{ Session::get('canAccess') }}</div>
                @endif

                <!-- Email input -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Password input -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-success w-100">Login</button>
            </form>
        </div>
    </div>
</body>

</html>
