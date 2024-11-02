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
    <div class="content-header" style="background-color: #E9EFEC;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0" style="color: #16423C; font-weight: 600;">Create New User</h1>
                </div>
                <div class="col-sm-12 col-lg-12 col-md-12 mb-2">
                    <hr style="border: 2px solid #6A9C89;">
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" style="background-color: #C4DAD2; padding: 20px;">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" 
                 style="background-color: #6A9C89; color: #E9EFEC; border: none;">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card shadow-sm border-0" style="border-radius: 15px;">
            <div class="card-header py-3" style="background-color: #6A9C89; border-radius: 15px 15px 0 0;">
                <h4 class="mb-0 text-white">User Information</h4>
            </div>
            <div class="card-body" style="background-color: #E9EFEC;">
                <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fullname" style="color: #16423C;">Full Name</label>
                                <input type="text" name="fullname" id="fullname"
                                    class="form-control @error('fullname') is-invalid @enderror"
                                    value="{{ old('fullname') }}"
                                    style="border: 1px solid #C4DAD2; border-radius: 8px;">
                                @error('fullname')
                                    <div class="invalid-feedback" style="color: #16423C;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="usertype" style="color: #16423C;">User Role</label>
                                <select name="usertype" id="usertype"
                                    class="form-control @error('usertype') is-invalid @enderror"
                                    style="border: 1px solid #C4DAD2; border-radius: 8px;">
                                    <option value="">Select Role</option>
                                    <option value="1" {{ old('usertype') == '1' ? 'selected' : '' }}>Admin</option>
                                    <option value="2" {{ old('usertype') == '2' ? 'selected' : '' }}>Manager</option>
                                    <option value="3" {{ old('usertype') == '3' ? 'selected' : '' }}>Member</option>
                                    <option value="0" {{ old('usertype') == '0' ? 'selected' : '' }}>Owner</option>
                                </select>
                                @error('usertype')
                                    <div class="invalid-feedback" style="color: #16423C;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="avatar" style="color: #16423C;">Avatar</label>
                                <div class="custom-file">
                                    <input type="file" name="avatar" id="avatar"
                                        class="custom-file-input @error('avatar') is-invalid @enderror" accept="image/*">
                                    <label class="custom-file-label" for="avatar" 
                                           style="border: 1px solid #C4DAD2; border-radius: 8px;">Choose file</label>
                                </div>
                                @error('avatar')
                                    <div class="invalid-feedback" style="color: #16423C;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group d-flex justify-content-center align-items-center">
                                <img id="avatar-preview"
                                    src="{{ old('avatar') ? asset('path_to_uploaded_image/' . old('avatar')) : '#' }}"
                                    alt="Avatar Preview" class="img-fluid rounded-circle"
                                    style="height: 15vh; width: 15vh; border: 2px solid #6A9C89 !important">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email" style="color: #16423C;">Email Address</label>
                                <input type="email" name="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}"
                                    style="border: 1px solid #C4DAD2; border-radius: 8px;">
                                @error('email')
                                    <div class="invalid-feedback" style="color: #16423C;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password" style="color: #16423C;">Password</label>
                                <input type="password" name="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    style="border: 1px solid #C4DAD2; border-radius: 8px;">
                                @error('password')
                                    <div class="invalid-feedback" style="color: #16423C;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="passwordconfirm" style="color: #16423C;">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="passwordconfirm"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    style="border: 1px solid #C4DAD2; border-radius: 8px;">
                                @error('password_confirmation')
                                    <div class="invalid-feedback" style="color: #16423C;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer justify-content-end" style="background-color: #E9EFEC; border-radius: 0 0 15px 15px;">
                        <a class="btn text-white float-right ml-2" href="{{ route('admin.dashboard') }}"
                           style="background-color: #16423C; border-radius: 20px;">Discard</a>
                        <button type="submit" class="btn text-white float-right"
                                style="background-color: #6A9C89; border-radius: 20px;">Save</button>
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