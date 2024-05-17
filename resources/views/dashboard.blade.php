<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    {{-- <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../asset/books.png" alt="" width="24" height="24">
                Library
            </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Books</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Borrow</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Return</a>
              </li>
            </ul>
            <span class="navbar-text">
              text
            </span>
          </div>
        </div>
      </nav> --}}

    {{-- side bar --}}
    <div class="sidebar bg-body-tertiary">
        <a class="navbar-brand" href="#">
            <img src="../asset/books.png" alt="" width="24" height="24">
            Library
        </a>
        <ul class="nav flex-column mt-3">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Books</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Borrow</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Return</a>
            </li>
        </ul>
        <span class="navbar-text">text</span>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Content goes here -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
