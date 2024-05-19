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
                            <th scope="col">Member</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Borrow Date</th>
                            <th scope="col">Due Date</th>
                            <th scope="col">Return Date</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->book->ISBN }}</td>
                            <td>{{ $item->book->title }}</td>
                            <td>{{ $item->book->author }}</td>
                            <td>{{ $item->member->name }}</td>
                            <td>{{ $item->member->phone }}</td>
                            <td>{{ $item->borrow }}</td>
                            <td>{{ $item->due }}</td>
                            <td>
                                @if ($item->return)
                                <span class="badge rounded-pill text-bg-success">{{ $item->return }}</span>
                                @else
                                <span class="badge rounded-pill text-bg-warning">Not yet returned</span>
                                @endif
                            </td>
                            <td class="custom-width-5">
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal{{ $item->id }}">
                                    Return
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>

    @foreach ($items as $item)
        <!-- Modal -->
        <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirm Return</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Retrieve the book from {{ $item->member->name }}?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <form action="{{ route('returnBook', ['id' => $item->id]) }}" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-success">Yes, Retrieve</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>
