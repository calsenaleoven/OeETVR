@extends('templates.member.header')
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
                    <h1 class="m-0">Tasks List</h1>
                </div>
                <div class="col-sm-12 col-lg-12 col-md-12 mb-2">
                    <hr class="border-2 border-primary">
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h4>Present and Recent Tasks</h4>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table">
                            <colgroup>
                                <col width="5%">
                                <col width="35%">
                                <col width="35%">
                                <col width="15%">

                            </colgroup>
                            <thead>
                                <th>#</th>
                                <th>Task</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>

                            </thead>
                            <tbody>
                                @forelse ($tasks as $task)
                                    @php
                                        $trans = get_html_translation_table(HTML_ENTITIES, ENT_QUOTES);
                                        unset($trans["\""], $trans['<'], $trans['>'], $trans['<h2']);
                                        $desc = strtr(html_entity_decode($task->description), $trans);
                                        $desc = str_replace(['<li>', '</li>', '&nbsp;'], ['', ', ', ' '], $desc);
                                    @endphp
                                    <tr>
                                        <td class="text-center">{{ $task->id }}</td>
                                        <td class=""><b>{{ $task->task_name }}</b></td>
                                        <td class="">
                                            <p class="truncate">{{ strip_tags($desc) }}</p>
                                        </td>
                                        <td>
                                            @if ($task->status == 'Pending')
                                                <span class='badge badge-secondary'>{{ $task->status }}</span>
                                            @elseif($task->status == 'Started')
                                                <span class='badge badge-primary'>{{ $task->status }}</span>
                                            @elseif($task->status == 'On-Progress')
                                                <span class='badge badge-info'>{{ $task->status }}</span>
                                            @elseif($task->status == 'On-Hold')
                                                <span class='badge badge-warning'>{{ $task->status }}</span>
                                            @elseif($task->status == 'Over Due')
                                                <span class='badge badge-danger'>{{ $task->status }}</span>
                                            @elseif($task->status == 'Done')
                                                <span class='badge badge-success'>{{ $task->status }}</span>
                                            @endif
                                            </dd>
                                        </td>
                                        <td class="text-center">
                                            <button type="button"
                                                class="btn btn-default btn-sm btn-flat border-info wave-effect text-info dropdown-toggle"
                                                data-toggle="dropdown" aria-expanded="true" 
                                                {{ $task->status == 'Done' ? 'disabled' : '' }}> <!-- Disable if Done -->
                                                Action
                                            </button>
                                            <div class="dropdown-menu">
                                                <div class="dropdown-divider"></div>
                                                <button type="button" class="dropdown-item update-status" data-id="{{ $task->id }}" data-status="Started">Started</button>
                                                <div class="dropdown-divider"></div>
                                                <button type="button" class="dropdown-item update-status" data-id="{{ $task->id }}" data-status="Done">Done</button>
                                            </div>
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No Task Available</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    $(document).ready(function() {
        $('.update-status').on('click', function() {
            let taskId = $(this).data('id');
            let status = $(this).data('status');
            
            $.ajax({
                url: '{{ route("member.task-list") }}', // Define this route in your routes file
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: taskId,
                    status: status
                },
                success: function(response) {
                    if(response.success) {
                        location.reload(); // Reload to update the status display
                    } else {
                        alert('Failed to update task status');
                    }
                }
            });
        });
    });
</script>


@endsection
