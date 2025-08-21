<x-layout>
    <x-slot:heading>Admin Page</x-slot:heading>

    <div class="container mt-4">

        <!-- Button to Show Create Account Form -->
        <div class="text-center mb-4">
            <button id="showCreateFormButton" class="btn btn-success">
                <i class="bi bi-person-plus"></i> Create an Account
            </button>
        </div>

        <!-- Section 1: Create Account Form -->
        <div id="createAccountForm" class="card shadow-sm mb-5 d-none">
            <div class="card-body">
                <h2 class="h5 mb-3">Create Account</h2>
                <form action="{{ route('admin.create-account') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Role</label>
                        <select name="role" class="form-select" required>
                            <option value="supervisor">Supervisor</option>
                            <option value="student">Student</option>
                        </select>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Create Account</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Manage Accounts -->
        <h2 class="h5 mb-3">Manage Accounts</h2>

        <!-- Delete Selected Button -->
        <div id="deleteSelectedContainer" class="text-end mb-3 d-none">
            <button id="deleteSelectedButton" class="btn btn-danger">
                <i class="bi bi-trash"></i> Delete Selected
            </button>
        </div>

        <!-- Admin Section -->
        @include('admin.partials.user-list', ['users' => $users->where('role', 'admin'), 'title' => 'Admins'])

        <!-- Supervisor Section -->
        @include('admin.partials.user-list', ['users' => $users->where('role', 'supervisor'), 'title' => 'Supervisors'])

        <!-- Student Section -->
        @include('admin.partials.user-list', ['users' => $users->where('role', 'student'), 'title' => 'Students'])

    </div>

    <!-- Confirmation Modal -->
    <div id="confirmationModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p id="confirmationMessage">Are you sure you want to delete this user?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button id="confirmDeleteButton" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Icons (needed for bi-person-plus, bi-trash) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Bootstrap JS (needed for modal) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Page Script -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const showCreateFormButton = document.getElementById('showCreateFormButton');
            const createAccountForm = document.getElementById('createAccountForm');
            const deleteSelectedButton = document.getElementById('deleteSelectedButton');
            const deleteSelectedContainer = document.getElementById('deleteSelectedContainer');
            const userCheckboxes = document.querySelectorAll('.user-checkbox');
            const deleteUserButtons = document.querySelectorAll('.delete-user-button');
            const confirmationModal = new bootstrap.Modal(document.getElementById('confirmationModal'));
            const confirmationMessage = document.getElementById('confirmationMessage');
            const confirmDeleteButton = document.getElementById('confirmDeleteButton');
            let userIdToDelete = null;
            let isMassDelete = false;

            // Toggle Create Account Form
            showCreateFormButton.addEventListener('click', () => {
                createAccountForm.classList.toggle('d-none');
            });

            // Show/hide "Delete Selected" button
            userCheckboxes.forEach(cb => {
                cb.addEventListener('change', () => {
                    const anyChecked = Array.from(userCheckboxes).some(cb => cb.checked);
                    deleteSelectedContainer.classList.toggle('d-none', !anyChecked);
                });
            });

            // Individual delete
            deleteUserButtons.forEach(button => {
                button.addEventListener('click', () => {
                    userIdToDelete = button.dataset.userId;
                    isMassDelete = false;
                    confirmationMessage.textContent = 'Are you sure you want to delete this user?';
                    confirmationModal.show();
                });
            });

            // Mass delete
            deleteSelectedButton.addEventListener('click', () => {
                userIdToDelete = Array.from(userCheckboxes).filter(cb => cb.checked).map(cb => cb.dataset.userId);
                isMassDelete = true;
                confirmationMessage.textContent = 'Are you sure you want to delete the selected users?';
                confirmationModal.show();
            });

            // Confirm delete
            confirmDeleteButton.addEventListener('click', () => {
                if (isMassDelete) {
                    fetch('{{ route('admin.delete-multiple-users') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                        body: JSON.stringify({ user_ids: userIdToDelete }),
                    }).then(res => res.json()).then(data => {
                        if (data.success) location.reload();
                    });
                } else {
                    fetch(`/admin/delete-user/${userIdToDelete}`, {
                        method: 'DELETE',
                        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    }).then(res => res.json()).then(data => {
                        if (data.success) location.reload();
                    });
                }
                confirmationModal.hide();
            });
        });
    </script>
</x-layout>
