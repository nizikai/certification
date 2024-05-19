<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Field</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <div class="d-flex flex-row">

        @include('sidebar')

        <div class="flex-col m-3">
            {{-- Title --}}


            <div class="fs-3 fw-bold ">
                Add New Book
            </div>
            <form action="{{ route('addBook') }}" method="POST">

                @csrf
                {{-- ISBN field --}}
                <label for="isbnForm" class="form-label">ISBN</label>
                <input type="text" class="form-control" name="isbnForm" placeholder="1234567890123"
                    inputmode="numeric" pattern="[0-9]*" value="{{ $book->ISBN ?? '' }}">
                {{-- Title field --}}
                <label for="titleForm" class="form-label">Title</label>
                <input type="text" name="titleForm" class="form-control" placeholder="Enter Title Here"
                    value="{{ $book->title ?? '' }}">
                {{-- Author field --}}
                <label for="authorForm" class="form-label">Author</label>
                <input type="text" name="authorForm" class="form-control" placeholder="Enter Author Name Here"
                    value="{{ $book->author ?? '' }}">
                {{-- Stock field --}}
                <label for="StockForm" class="form-label">Stock</label>
                <input type="number" name="stockForm" class="form-control custom-width-70"
                    value="{{ $book->stock ?? '' }}">
                {{-- Add button --}}
                <br>

                <button type="submit" class="btn btn-primary">Add Book</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>
