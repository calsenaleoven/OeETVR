@extends('templates.owner.header')
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
                    <h1 class="m-0">Home</h1>
                </div>
                <div class="col-sm-12 col-lg-12 col-md-12 mb-2">
                    <hr class="border-2 border-primary">
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid ">
        <div class="card">
            <div class="card-body">
                Welcome!  {{ $user = auth()->user()->fullname  }}
            </div>
        </div>
        <div class="row mt-3 py-3">
            <div class="col-m-d-8 col-lg-8 col-sm-12">
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h5>Project Progress</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Project</th>
                                    <th>Progress</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($projects as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->project_name }}</td>
                                    <td>
                                        <div class="progress">
                                            @if ($row->totalPercentage == 100)
                                                <div class="progress-bar bg-success" role="progressbar"
                                                    style="width: 100%;" aria-valuenow="100" aria-valuemin="0"
                                                    aria-valuemax="100">100%</div>
                                            @else
                                                <div class="progress-bar {{ $row->totalPercentage >= 1 && $row->totalPercentage <= 10 ? 'bg-danger' : ($row->totalPercentage >= 11 && $row->totalPercentage <= 20 ? 'bg-warning' : ($row->totalPercentage >= 21 && $row->totalPercentage <= 40 ? 'bg-info' : 'bg-success')) }}"
                                                    role="progressbar" style="width: {{ $row->totalPercentage }}%;"
                                                    aria-valuenow="{{ $row->totalPercentage }}" aria-valuemin="0"
                                                    aria-valuemax="100">{{ $row->totalPercentage }}%</div>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        @php
                                            $totalPercentage = $row->tasks->sum('percentage');
                                            $completedTasks = $row->tasks->where('status', 'Done')->count();
                                            $totalTasks = $row->tasks->count();
                                        @endphp

                                        @if ($completedTasks > 0 && $totalPercentage == 100)
                                            <span class="badge badge-sm bg-success">Finished</span>
                                        @else
                                            <span class="badge badge-sm bg-danger">Incomplete</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('owner.project-details', ['id' => $row->id]) }}" class="btn btn-sm btn-primary"><i class="fas fa-folder"></i> View</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center" colspan="5">No Project Available</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-12">
                        <div class="small-box bg-light shadow-sm border">
                            <div class="inner">
                                <h3>{{ $totalProjects }}</h3>
                                <p>Total Projects</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-layer-group"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-12">
                        <div class="small-box bg-light shadow-sm border">
                            <div class="inner">
                                <h3>{{ $task }}</h3>
                                <p>Total Tasks</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-tasks"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Add custom CSS for DataTables styling -->
    <style>
        .table thead th {
            border-bottom: 2px solid #C4DAD2  !important;
            color: #6A9C89 ;
            font-weight: 600;
        }
        .table td {
            border-bottom: 1px solid #E9EFEC  !important;
            vertical-align: middle;
        }
        .dataTables_wrapper .dataTables_length select,
        .dataTables_wrapper .dataTables_filter input {
            border: 1px solid #C4DAD2  !important;
            border-radius: 8px;
            padding: 4px 8px;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: #6A9C89  !important;
            border-color: #6A9C89  !important;
            color: white !important;
            border-radius: 8px;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: #C4DAD2  !important;
            border-color: #C4DAD2  !important;
            color: white !important;
        }
    </style>
@endsection
