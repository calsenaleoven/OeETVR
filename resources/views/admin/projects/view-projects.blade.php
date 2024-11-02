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
                    <h1 class="m-0" style="color: #16423C; font-weight: 600;">Project Management</h1>
                </div>
                <div class="col-sm-12 col-lg-12 col-md-12 mb-2">
                    <hr class="border-2" style="border-color: #6A9C89;">
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-2" style="background-color: #C4DAD2;">
        <div class="card shadow-sm border-0" style="border-radius: 15px; background-color: #E9EFEC;">
            <div class="card-header py-3" style="background-color: #6A9C89; border-radius: 15px 15px 0 0;">
                <h4 class="text-white">
                    All Projects
                    <a href="{{ route('admin.create-project') }}" class="btn float-right text-white" style="background-color: #16423C; border-radius: 20px;">
                        <i class="fas fa-user-plus"></i> Create New Projects
                    </a>
                </h4>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert" 
                         style="background-color: #6A9C89; color: #E9EFEC; border: none;">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-text="true">&times;</span>
                        </button>
                    </div>
                @endif
                <table id="example1" class="table table-hover">
                    <thead>
                        <tr style="color: #6A9C89;">
                            <th>PROJECT</th>
                            <th>MANAGE BY</th>
                            <th>PROJECT TYPE</th>
                            <th>PROJECT CLASIFICATION</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $row)
                            <tr>
                                <td>{{ $row->project_name }}</td>
                                <td>{{ $row->manager->fullname }}</td>
                                <td>{{ $row->project_type }}</td>
                                <td>{{ $row->category }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn dropdown-toggle text-white" 
                                                style="background-color: #6A9C89; border-radius: 20px;"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Actions
                                        </button>
                                        <div class="dropdown-menu" style="background-color: #E9EFEC;">
                                            <a class="dropdown-item" style="color: #16423C;" 
                                               href="/admin/projects/view-details/{{ $row->id }}">View</a>
                                            <a class="dropdown-item" style="color: #16423C;" 
                                               href="/admin/projects/edit-details/{{ $row->id }}">Edit</a>
                                            <button type="button" class="dropdown-item" style="color: #16423C;" 
                                                    data-toggle="modal" data-target="#confirmDeleteModal_{{ $row->id }}">Delete</button>
                                        </div>
                                        <div class="modal fade" id="confirmDeleteModal_{{ $row->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content" style="background-color: #E9EFEC;">
                                                    <div class="modal-header" style="background-color: #6A9C89;">
                                                        <h5 class="modal-title text-white" id="confirmDeleteModalLabel">Confirm Delete
                                                        </h5>
                                                        <button type="button" class="close text-white" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" style="color: #16423C;">
                                                        Are you sure you want to delete this project?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn text-white" 
                                                                style="background-color: #6A9C89; border-radius: 20px;"
                                                                data-dismiss="modal">Cancel</button>
                                                        <form method="POST"
                                                            action="{{ route('admin.delete-projects') }}"
                                                            id="deleteForm">
                                                            @csrf
                                                            <input type="hidden" name="projectId" value="{{ $row->id }}">
                                                            <button type="submit" class="btn text-white" 
                                                                    style="background-color: #16423C; border-radius: 20px;">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <style>
        .table thead th {
            border-bottom: 2px solid #C4DAD2 !important;
            color: #6A9C89;
            font-weight: 600;
        }
        .table td {
            border-bottom: 1px solid #E9EFEC !important;
            vertical-align: middle;
            color: #16423C;
        }
        .dataTables_wrapper .dataTables_length select,
        .dataTables_wrapper .dataTables_filter input {
            border: 1px solid #C4DAD2 !important;
            border-radius: 8px;
            padding: 4px 8px;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: #6A9C89 !important;
            border-color: #6A9C89 !important;
            color: white !important;
            border-radius: 8px;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: #C4DAD2 !important;
            border-color: #C4DAD2 !important;
            color: white !important;
        }
        .dropdown-item:hover {
            background-color: #C4DAD2 !important;
            color: #E9EFEC !important;
        }
    </style>
@endsection