<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrow Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <div class="d-flex flex-row">

        @include('sidebar')

        <div class="flex-col m-3">

            <div class="fs-3 fw-bold">
                Add New Borrow Record
            </div>
            <form action="{{ route('borrowBook', ['id' => $book->id]) }}" method="GET">

            @csrf

            <label for="nameForm" class="form-label">Librarian in Charge</label>
            <input type="text" name="nameForm" class="form-control bg-custom-lightgray"
                value="{{ session('librarian_name') }}" readonly>

            <label for="bookTitle" class="form-label">Book Title</label>
            <input type="text" class="form-control bg-custom-lightgray" id="bookTitle" value="{{ $book->title }}"
                readonly>

            <label for="bookAuthor" class="form-label">Book Author</label>
            <input type="text" class="form-control bg-custom-lightgray" id="bookAuthor" value="{{ $book->author }}"
                readonly>

            <label for="borrowDate" class="form-label">Borrow Date</label>
            <input type="text" class="form-control bg-custom-lightgray" id="borrowDate" name="borrowDate"
                value="{{ now()->toDateString() }}" readonly>

            <label for="dueDate" class="form-label">Due Date</label>
            <input type="text" class="form-control bg-custom-lightgray" id="dueDate" name="dueDate"
                value="{{ now()->addDays(7)->toDateString() }}" readonly>

            <label for="phoneForm" class="form-label">Phone</label>
            <input type="text" class="form-control bg-custom-lightgray" id="phoneForm" name="phoneForm"
                placeholder="" inputmode="numeric" pattern="[0-9]*" readonly>

            <label for="memberSelect" class="form-label">Select Member</label>
            <select class="form-control" id="memberSelect" name="member_id" required>
                <option value="" data-phone="">Select a member</option>
                @foreach ($registeredMembers as $member)
                    <option value="{{ $member->id }}" data-phone="{{ $member->phone }}">{{ $member->name }}</option>
                @endforeach
            </select>
            <br>

            <button type="submit" class="btn btn-primary">Borrow Book</button>
            </form>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        //to automatically update the phone number field based on selected user
        document.addEventListener('DOMContentLoaded', function() {
            const memberSelect = document.getElementById('memberSelect');
            const phoneForm = document.getElementById('phoneForm');

            memberSelect.addEventListener('change', function() {
                const selectedOption = memberSelect.options[memberSelect.selectedIndex];
                const phone = selectedOption.getAttribute('data-phone');
                phoneForm.value = phone || '';
            });
        });
    </script>
</body>

</html>
