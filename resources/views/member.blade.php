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
                <button type="submit" onclick="window.location.href='/new-member-field'"
                    class="btn btn-primary custom-width-10">+
                    Add Member</button>

                {{-- <input type="text" name="searchForm" class="form-control m-3" placeholder="Search"> --}}
            </div>
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($registeredMembers as $member)
                            <tr>
                                <td class="custom-width-30">{{ $member->name }}</td>
                                <td class="custom-width-30">{{ $member->phone }}</td>
                                <td class="custom-width-5"><button type="button"
                                        onclick="window.location.href='{{ route('editMember', ['id' => $member->id]) }}'"
                                        class="btn btn-primary btn-sm">Edit</button></td>
                                <td class="custom-width-5">
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $member->id }}">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @foreach ($registeredMembers as $member)
        <!-- Modal -->
        <div class="modal fade" id="exampleModal{{ $member->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirm Deletion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this item?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <form action="{{ route('deleteMember', ['id' => $member->id]) }}" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-danger">Yes, Delete</button>
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
