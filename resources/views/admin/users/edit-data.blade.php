@extends('templates.admin.header')
<style>
    .main-header {
        background-color: #6A9C89 !important;
        border: none !important;
    }
    
    .main-header .navbar-nav .nav-link {
        color: #E9EFEC !important;
    }

    .main-header .navbar-nav .nav-link:hover {
        color: #ffffff !important;
    }

    /* Brand Logo Area */
    .brand-link {
        background-color: #6A9C89 !important;
        color: #E9EFEC !important;
        border-bottom: 1px solid #C4DAD2 !important;
    }

    /* Sidebar Styling */
    .main-sidebar {
        background-color: #6A9C89 !important;
    }

    /* Sidebar Menu Items */
    .nav-sidebar .nav-item .nav-link {
        color: #E9EFEC !important;
    }

    .nav-sidebar .nav-item .nav-link:hover {
        background-color: #C4DAD2 !important;
        color: #ffffff !important;
    }

    /* Active Menu Item */
    .nav-sidebar .nav-item.menu-open > .nav-link,
    .nav-sidebar .nav-item .nav-link.active {
        background-color: #C4DAD2 !important;
        color: #ffffff !important;
    }

    /* Sidebar User Panel */
    .user-panel {
        border-bottom: 1px solid #C4DAD2 !important;
    }

    .user-panel .info a {
        color: #E9EFEC !important;
    }

    /* Sidebar Search */
    .sidebar-search-results .list-group-item {
        background-color: #C4DAD2 !important;
        color: #E9EFEC !important;
    }

    .form-control-sidebar {
        background-color: #C4DAD2 !important;
        border: 1px solid #E9EFEC !important;
        color: #E9EFEC !important;
    }

    .form-control-sidebar:focus {
        border: 1px solid #E9EFEC !important;
    }

    .form-control-sidebar::placeholder {
        color: #E9EFEC !important;
        opacity: 0.8;
    }

    /* Sidebar Sub-menus */
    .nav-treeview > .nav-item > .nav-link {
        color: #E9EFEC !important;
        padding-left: 2rem;
    }

    .nav-treeview > .nav-item > .nav-link:hover {
        background-color: #C4DAD2 !important;
        color: #ffffff !important;
    }

    .nav-treeview > .nav-item > .nav-link.active {
        background-color: #C4DAD2 !important;
        color: #ffffff !important;
    }

    /* Main Content Background */
    .content-wrapper {
        background-color: #C4DAD2 !important;
    }

    /* Custom Scrollbar for Sidebar */
    .sidebar::-webkit-scrollbar {
        width: 6px;
    }

    .sidebar::-webkit-scrollbar-track {
        background: #6A9C89;
    }

    .sidebar::-webkit-scrollbar-thumb {
        background: #C4DAD2;
        border-radius: 3px;
    }

    .sidebar::-webkit-scrollbar-thumb:hover {
        background: #E9EFEC;
    }

    /* Dropdown Menus */
    .dropdown-menu {
        background-color: #E9EFEC !important;
    }

    .dropdown-item {
        color: #6A9C89 !important;
    }

    .dropdown-item:hover {
        background-color: #C4DAD2 !important;
        color: #ffffff !important;
    }

    /* Control Sidebar (Right Sidebar if present) */
    .control-sidebar {
        background-color: #6A9C89 !important;
    }
</style>
@section('content')
<style>
    /* Card Styling */
    .card {
        background-color: #E9EFEC;
        border: none !important;
        border-radius: 15px;
    }

    .card-header {
        background-color: #6A9C89 !important;
        color: #E9EFEC;
        border-radius: 15px 15px 0 0 !important;
    }

    /* Content Header */
    .content-header {
        background-color: #E9EFEC;
    }

    .content-header h1 {
        color: #16423C;
        font-weight: 600;
    }

    /* Form Controls */
    .form-control {
        background-color: #fff;
        border: 1px solid #C4DAD2;
    }

    .form-control:focus {
        border-color: #6A9C89;
        box-shadow: 0 0 0 0.2rem rgba(106, 156, 137, 0.25);
    }

    /* Custom File Input */
    .custom-file-label {
        background-color: #fff;
        border: 1px solid #C4DAD2;
    }

    .custom-file-input:focus ~ .custom-file-label {
        border-color: #6A9C89;
        box-shadow: 0 0 0 0.2rem rgba(106, 156, 137, 0.25);
    }

    /* Buttons */
    .btn-primary {
        background-color: #6A9C89 !important;
        border-color: #6A9C89 !important;
        color: #E9EFEC !important;
    }

    .btn-primary:hover {
        background-color: #16423C !important;
        border-color: #16423C !important;
    }

    .btn-secondary {
        background-color: #C4DAD2 !important;
        border-color: #C4DAD2 !important;
        color: #16423C !important;
    }

    .btn-secondary:hover {
        background-color: #6A9C89 !important;
        border-color: #6A9C89 !important;
        color: #E9EFEC !important;
    }

    /* Alert Styling */
    .alert-success {
        background-color: #6A9C89;
        border-color: #16423C;
        color: #E9EFEC;
    }

    /* Labels */
    label {
        color: #16423C;
        font-weight: 500;
    }

    /* Border */
    .border-primary {
        border-color: #6A9C89 !important;
    }
</style>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0">Update User's Data</h1>
                </div>
                <div class="col-sm-12 col-lg-12 col-md-12 mb-2">
                    <hr class="border-2 border-primary">
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h4>User Information</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fullname">Full Name</label>
                                <input  type="text" name="fullname" id="fullname"
                                    class="form-control @error('fullname') is-invalid @enderror"
                                    value="{{ $userdata->fullname }}">
                                @error('fullname')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="usertype">User Role</label>
                                <select  name="usertype" id="usertype"
                                    class="form-control @error('usertype') is-invalid @enderror">
                                    <option value="">Select Role</option>
                                    <option value="1" {{ $userdata->type == '1' ? 'selected' : '' }}>Admin</option>
                                    <option value="2" {{ $userdata->type == '2' ? 'selected' : '' }}>Manager</option>
                                    <option value="3" {{ $userdata->type == '3' ? 'selected' : '' }}>Member</option>
                                    <option value="0" {{ $userdata->type == '0' ? 'selected' : '' }}>Owner</option>
                                </select>
                                @error('usertype')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="avatar">New Password</label>
                                <div class="custom-file">
                                    <input  type="password" name="new_password" id="avatar" class="form-control @error('new_password') is-invalid @enderror">
                                </div>
                                @error('new_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="avatar">Confirm New Password</label>
                                <div class="custom-file">
                                    <input type="password" name="password_confirm" id="avatar" class="form-control @error('password_confirm') is-invalid @enderror">
                                </div>
                                @error('password_confirm')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input readonly type="email" name="email" id="email"
                                    class="form-control"
                                    value="{{ $userdata->email }}">
                            </div>
                            <div class="form-group">
                                <label for="avatar">Avatar</label>
                                <div class="custom-file">
                                    <input  type="file" name="new_avatar" id="avatar"
                                        class="custom-file-input @error('avatar') is-invalid @enderror" accept="image/*">
                                    <label class="custom-file-label" for="avatar">Choose file</label>
                                </div>
                                @error('avatar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group d-flex justify-content-center align-items-center">
                                <img id="avatar-preview"
                                    src="{{ asset('storage/avatars/' . basename($userdata->avatar)) }}"
                                    alt="Avatar Preview" class="img-fluid rounded-circle"
                                    style="height: 15vh; width: 15vh; border: 1px solid #C4DAD2 !important">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer justify-content-end">
                        <input type="hidden" name="userId" value="{{ $userdata->id }}">
                        <input type="hidden" name="oldImage" value="{{ $userdata->avatar }}">
                        <a class="btn btn-secondary float-right ml-2" href="{{ route('admin.dashboard') }}">Discard</a>
                        <button type="submit" class="btn btn-primary float-right">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        document.getElementById('avatar').addEventListener('change', function(event) {
            var input = event.target;
            var reader = new FileReader();
            reader.onload = function() {
                var img = document.getElementById('avatar-preview');
                img.src = reader.result;
            };

            reader.readAsDataURL(input.files[0]);
        });
    </script>
@endsection