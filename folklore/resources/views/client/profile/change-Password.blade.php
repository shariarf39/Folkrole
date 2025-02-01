<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        .password-field {
            position: relative;
        }
        .password-field .input-group-text {
            cursor: pointer;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        form input[type="password"] {
            outline: none;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h3 class="mb-4 text-center">Change Password</h3>
    
    @if (session('status'))
        <script>
            alert("{{ session('status') }}");
        
        </script>
    @endif

    @if (session('error'))
        <script>
            alert("{{ session('error') }}");
        </script>
    @endif

    <form method="POST" action="{{ route('updatePassword') }}">
        @csrf

        <div class="mb-3">
            <label for="current_password" class="form-label">Current Password</label>
            <div class="input-group password-field">
                <input type="password" name="current_password" id="current_password" class="form-control @error('current_password') is-invalid @enderror" required>
                <span class="input-group-text" onclick="togglePassword('current_password')">
                    <i id="current_password_icon" class="bi bi-eye-slash"></i>
                </span>
            </div>
            @error('current_password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="new_password" class="form-label">New Password</label>
            <div class="input-group password-field">
                <input type="password" name="new_password" id="new_password" class="form-control @error('new_password') is-invalid @enderror" required>
                <span class="input-group-text" onclick="togglePassword('new_password')">
                    <i id="new_password_icon" class="bi bi-eye-slash"></i>
                </span>
            </div>
            @error('new_password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
            <div class="input-group password-field">
                <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control @error('new_password_confirmation') is-invalid @enderror" required>
                <span class="input-group-text" onclick="togglePassword('new_password_confirmation')">
                    <i id="new_password_confirmation_icon" class="bi bi-eye-slash"></i>
                </span>
            </div>
            @error('new_password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary w-100">Change Password</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.js"></script>
<script>
    // Function to toggle password visibility
    function togglePassword(inputId) {
        const passwordField = document.getElementById(inputId);
        const icon = document.getElementById(inputId + "_icon");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            icon.classList.remove("bi-eye-slash");
            icon.classList.add("bi-eye");
        } else {
            passwordField.type = "password";
            icon.classList.remove("bi-eye");
            icon.classList.add("bi-eye-slash");
        }
    }
</script>

</body>
</html>
