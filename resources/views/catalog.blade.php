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
    <div class="d-flex flex-row">

        @include('sidebar')

        <div class="flex-col m-3">

            <div class="d-flex flex-row">
                <button type="submit" onclick="window.location.href='/book-field'"
                    class="btn btn-primary custom-width-10">+
                    Add Book</button>

                <input type="text" name="searchForm" class="form-control m-3" placeholder="Search">
            </div>
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ISBN</th>
                            <th scope="col">Title</th>
                            <th scope="col">Author</th>
                            <th scope="col">Stock</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($registeredBooks as $book)
                            <tr>
                                <th scope="row">{{ $book->ISBN }}</th>
                                <td class="custom-width-30">{{ $book->title }}</td>
                                <td class="custom-width-30">{{ $book->author }}</td>
                                <td class="custom-width-5">{{ $book->stock }}</td>
                                <td class="custom-width-5"><button type="button" onclick="{{ route('editBook', ['id' => $book->id]) }}" class="btn btn-primary btn-sm">Edit</button></td>
                                <td class="custom-width-5"><button type="button"
                                        class="btn btn-danger btn-sm">Delete</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>
