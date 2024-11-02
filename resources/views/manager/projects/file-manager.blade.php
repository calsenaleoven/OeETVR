@extends('templates.manager.header')
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
    
    /* DataTables Column Visibility Dropdown Styling */
    .dt-button-collection {
        background-color: white !important;
    }
    
    .dt-button-collection .dt-button {
        background-color: white !important;
        color: #6A9C89 !important;
    }
    
    .dt-button-collection .dt-button:hover {
        background-color: #C4DAD2 !important;
        color: white !important;
    }
    
    .dt-button-collection .dt-button.active {
        background-color: #6A9C89 !important;
        color: white !important;
    }
</style>
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0">Project File Manager</h1>
                </div>
                <div class="col-sm-12 col-lg-12 col-md-12 mb-2">
                    <hr class="border-2 border-primary">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>

                    @endif

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4>
                    Files
                    <button type="button" id="add_btn_i" class="btn btn-primary add_btn float-right">Upload Files</button>
                </h4>
            </div>
            <div class="card-body" id="data_table">
                @if ($files->isEmpty())
                    <p>No Files have been Uploaded Yet.</p>
                @else
                <div class="card">
                    <div class="card-body">
                        <div class="card-text">
                            <h5>Project Name: {{ $details->project_name }}</h5>
                            <h5>Project Manager: {{ $details->manager->fullname }}</h5>
                            <h5>Project Owner: {{ $details->owner->fullname }}</h5>
                        </div>
                    </div>
                </div>
                    <table id="example1" class="table">
                        <thead>
                            <tr>
                                <th>File Name</th>
                                <th>File</th>
                                <th>Uploaded By</th>
                                <th>Uploaded At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($files as $file)
                            <tr>
                                <td>{{ $file->file_text }}</td>
                                <td>{{ str_replace('project-files/', '', $file->file_name) }}</td>
                                <td>{{ $file->uploader->fullname }}</td>
                                <td>{{ date('M d, Y h:i A',strtotime($file->created_at)) }}</td>
                                <td>
                                    <a href="{{ asset($file->file_name) }}" class="btn btn-primary btn-sm" download>
                                        <i class="fas fa-download"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
            <div class="card-body d-none" id="file_uploader">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h4>Please Fill Up this Form</h4>
                    </div>
                </div>
                <form action="{{ route('manager.file-upload') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="File">File Name</label>
                        <input type="text" name="file_text" id="file_text" class="form-control" placeholder="Enter File Name">
                    </div>
                    <div class="form-group">
                        <label for="File">File</label>
                        <input type="file" name="file_name" id="file_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="projectId" value="{{ $id }}">
                        <button type="submit" class="btn btn-primary btn-block">Upload File</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

<script src="{{ asset('templates/plugins/jquery/jquery.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#add_btn_i').on('click', function() {
            $('.add_btn').addClass('d-none');
            $('#data_table').addClass('d-none');
            $('#file_uploader').removeClass('d-none')
        });
    })
</script>

