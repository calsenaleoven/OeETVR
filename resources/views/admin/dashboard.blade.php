@extends('templates.admin.header')
<style>
            .animated-title {
            background: linear-gradient(
                to right,
                #16423C 20%,
                #6A9C89 30%,
                #6A9C89 70%,
                #16423C 80%
            );
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            background-size: 200% auto;
            animation: textShine 4s ease-in-out infinite;
            position: relative;
        }

        .animated-title::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -4px;
            width: 0;
            height: 2px;
            background: #6A9C89;
        }
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
    
        .clearfix::after {
        content: "";
        clear: both;
        display: table;
    }
    
    .content {
    min-height: calc(100vh - <footer-height>); /* Adjust this value */
    padding-bottom: 2rem; /* Provide space for pagination */
}

.pagination {
    margin: 2rem 0;
    display: flex;
    justify-content: center;
}

</style>
@section('content')
    <div class="content-header" style="background-color: #E9EFEC ;">
        <div class="container-fluid py-3">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h1 class="m-0" style="color: #16423C ; font-weight: 600;">Administrator Dashboard</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid px-4 py-4" style="background-color: #C4DAD2;">
        <div class="row">
            <!-- Left Column - 8 columns -->
            <div class="col-lg-8">
                <!-- Welcome Card -->
                <div class="card shadow-sm border-0 mb-4" style="background-color: #E9EFEC ; border-radius: 15px;">
                    <div class="card-body p-4">
                        <h2 class="h4 mb-0" style="color: #16423C ;">Welcome back, {{ $user = auth()->user()->fullname }}! 👋</h2>
                    </div>
                </div>

                <!-- Stats Cards Row -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="card shadow-sm border-0" style="background-color: #6A9C89 ; border-radius: 15px;">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="text-white mb-2">Total Projects</h6>
                                        <h3 class="mb-0 text-white">{{ $totalProjects }}</h3>
                                    </div>
                                    <div class="rounded-circle p-3" style="background-color: rgba(255,255,255,0.2);">
                                        <i class="fas fa-layer-group fa-2x text-white"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card shadow-sm border-0" style="background-color: #16423C ; border-radius: 15px;">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="text-white mb-2">Total Tasks</h6>
                                        <h3 class="mb-0 text-white">{{ $allTasks }}</h3>
                                    </div>
                                    <div class="rounded-circle p-3" style="background-color: rgba(255,255,255,0.2);">
                                        <i class="fas fa-tasks fa-2x text-white"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Project Progress Table -->
                <div class="card shadow-sm border-0 mb-4" style="border-radius: 15px;">
                    <div class="card-header py-3" style="background-color: #6A9C89 ; border-radius: 15px 15px 0 0;">
                        <h5 class="mb-0 text-white">Project Progress</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-hover">
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
                                    @foreach ($projects as $row)
                                        <tr>
                                            <td>{{ $row->id }}</td>
                                            <td>{{ $row->project_name }}</td>
                                            <td style="width: 40%;">
                                                <div class="progress" style="height: 10px; border-radius: 5px;">
                                                    @if ($row->totalPercentage == 100)
                                                        <div class="progress-bar" role="progressbar"
                                                            style="width: 100%; background-color: #6A9C89 ;" 
                                                            aria-valuenow="100" aria-valuemin="0"
                                                            aria-valuemax="100">100%</div>
                                                    @else
                                                        <div class="progress-bar" role="progressbar"
                                                            style="width: {{ $row->totalPercentage }}%; 
                                                                   background-color: {{ $row->totalPercentage >= 75 ? '#16423C ' : 
                                                                   ($row->totalPercentage >= 50 ? '#6A9C89 ' : 
                                                                   ($row->totalPercentage >= 25 ? '#C4DAD2' : '#E9EFEC ')) }};"
                                                            aria-valuenow="{{ $row->totalPercentage }}" 
                                                            aria-valuemin="0"
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
                                                    <span class="badge rounded-pill" 
                                                          style="background-color: #6A9C89 ;">Finished</span>
                                                @else
                                                    <span class="badge rounded-pill" 
                                                          style="background-color: #E9EFEC ; color: #16423C ;">
                                                          In Progress</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="/admin/projects/view-details/{{ $row->id }}"
                                                   class="btn btn-sm text-white" 
                                                   style="background-color: #16423C ; border-radius: 20px;">
                                                    <i class="fas fa-folder me-1"></i> View
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Feedback List Table -->
                <div class="card shadow-sm border-0 mb-4" style="border-radius: 15px;">
                    <div class="card-header py-3" style="background-color: #6A9C89; border-radius: 15px 15px 0 0;">
                        <h5 class="mb-0 text-white">Feedback List</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Project</th>
                                        <th>Employee</th>
                                        <th>Rating</th>
                                        <th>Comment</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($feedbacks as $feedback)
                                        <tr>
                                            <td>{{ $feedback->project->project_name }}</td>
                                            <td>{{ $feedback->member->fullname }}</td>
                                            <td>{{ $feedback->rating }}</td>
                                            <td>{{ $feedback->comment }}</td>
                                            <td>{{ $feedback->created_at->format('F d, Y') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Pagination Links -->
                            {{ $feedbacks->links('vendor.pagination.bootstrap-5') }}
                    </div>
                </div>
            </div>

            <!-- Right Column - 4 columns -->
            <div class="col-lg-4">
                <!-- Best Project Manager Chart -->
                <div class="card shadow-sm border-0 mb-4" style="border-radius: 15px;">
                    <div class="card-header py-3" style="background-color: #16423C ; border-radius: 15px 15px 0 0;">
                        <h5 class="mb-0 text-white">Best Project Manager</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>

                <!-- Best Employee Chart -->
                <div class="card shadow-sm border-0" style="border-radius: 15px;">
                    <div class="card-header py-3" style="background-color: #16423C ; border-radius: 15px 15px 0 0;">
                        <h5 class="mb-0 text-white">Best Employee</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="donutChart1" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
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