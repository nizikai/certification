<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Field</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <div class="d-flex flex-row">

        @include('sidebar')

        <div class="flex-col m-3">

            <div class="fs-3 fw-bold ">
                Add New Library Member
            </div>
            <form action="{{ route('addMember') }}" method="POST">

                @csrf
                
                <label for="nameForm" class="form-label">Name</label>
                <input type="text" name="nameForm" class="form-control" placeholder="Enter Name Here">

                <label for="phoneForm" class="form-label">Phone</label>
                <input type="text" class="form-control" name="phoneForm" placeholder="Enter Phone Number"
                    inputmode="numeric" pattern="[0-9]*">
                <br>

                <button type="submit" class="btn btn-primary">Add Member</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>
