<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certification Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="loginBackground z-n1 position-fixed"></div>

    <form action="{{ route('auth') }}" method="POST">
        @csrf
        <div class="formContainer z-1 position-fixed">
            {{-- Email field --}}
            <label for="emailForm" class="form-label">Email address</label>
            <input type="email" class="form-control" name="emailForm" placeholder="name@example.com">
            <br>

            {{-- Password field --}}
            <label for="passwordForm" class="form-label">Password</label>
            <input type="password" name="passwordForm" class="form-control" placeholder="Password">
            <br>

            {{-- Login button --}}
            <button type="submit" class="btn btn-primary loginButton">Login</button>
        </div>
    </form>

    {{-- @if (session('error'))
        <div class="toast align-items-center text-bg-danger border-0" role="alert" aria-live="assertive"
            aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session('error') }}
                </div>
                <button type="button" class="btn-close btn-close-white m-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    @endif --}}

    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get the toast element
            var toastElement = document.querySelector('.toast');
    
            // If session has an error message, display the toast
            if (toastElement) {
                var toast = new bootstrap.Toast(toastElement);
                toast.show();
            }
        });
    </script> --}}
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
