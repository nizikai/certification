<div class="d-flex flex-column p-3 text-white bg-custom-gray sidebar" id="sidebar">
    <div class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <span class="fs-4 ms-3">Library</span>
    </div>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('catalog')}}" class="nav-link text-white">
                <img src="../asset/books.png" alt="" width="38" height="38" class="me-2">
                Catalog
            </a>
        </li>
        <li>
            <a href="{{ route('borrow')}}" class="nav-link text-white">
                <img src="../asset/borrow.png" alt="" width="38" height="38" class="me-2">
                Borrow
            </a>
        </li>
        <li>
            <a href="{{ route('return')}}" class="nav-link text-white">
                <img src="../asset/return.png" alt="" width="38" height="38" class="me-2">
                Return
            </a>
        </li>
        <li>
            <a href="{{ route('member')}}" class="nav-link text-white">
                <img src="../asset/member.png" alt="" width="38" height="38" class="me-2">
                Member
            </a>
        </li>
        <li>
            @if (session('librarian_admin'))
                <a href="#" class="nav-link text-white">
                    <img src="../asset/librarian.png" alt="" width="38" height="38" class="me-2">
                    Librarian
                </a>
            @endif
        </li>
    </ul>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
            id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="../asset/person.circle.fill.png" alt="" width="38" height="38" class="me-2">
            <strong>{{ session('librarian_name') }}</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
            <li>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="dropdown-item" style="background: none; border: none; padding: 8; cursor: pointer;">
                        Sign out
                    </button>
                </form>
            </li>
            
        </ul>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
    const sidebar = document.getElementById('sidebar');
    const menuItems = sidebar.querySelectorAll('.nav-link');

    // check if there is an active item stored in session
    const activeItem = sessionStorage.getItem('activeItem');

    // If there is an, add the 'active' class to it
    if (activeItem) {
        const activeMenuItem = sidebar.querySelector(`[href="${activeItem}"]`);
        if (activeMenuItem) {
            activeMenuItem.classList.add('active');
        }
    }

    // Add click event listener to side bar
    menuItems.forEach(item => {
        item.addEventListener('click', function() {
            // remove active from all menu items
            menuItems.forEach(menuItem => {
                menuItem.classList.remove('active');
            });

            // add active class to the clicked menu item
            this.classList.add('active');

            // save the href of the clicked item in sessionStorage
            sessionStorage.setItem('activeItem', this.getAttribute('href'));
        });
    });
});

</script>



