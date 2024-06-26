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

            {{-- Display error message --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            {{-- Login button --}}
            <button type="submit" class="btn btn-primary loginButton">Login</button>
        </div>
    </form>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
