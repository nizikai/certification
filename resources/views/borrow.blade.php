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

            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ISBN</th>
                            <th scope="col">Title</th>
                            <th scope="col">Author</th>
                            <th scope="col">Stock</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <th scope="row">{{ $item->ISBN }}</th>
                                <td class="custom-width-30">{{ $item->title }}</td>
                                <td class="custom-width-30">{{ $item->author }}</td>
                                <td class="custom-width-30">{{ $item->stock }}</td>
                                <td class="custom-width-5"><button type="button"
                                        onclick="window.location.href='{{ route('new-borrow-field', ['id' => $item->id]) }}'"
                                        class="btn btn-primary btn-sm">Borrow</button></td>
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
