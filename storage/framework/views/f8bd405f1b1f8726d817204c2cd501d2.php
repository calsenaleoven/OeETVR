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
    
    <!-- Add custom CSS for DataTables styling -->
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
<?php $__env->startSection('content'); ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0">Project Details</h1>
                </div>
                <div class="col-sm-12 col-lg-12 col-md-12 mb-2">
                    <hr class="border-2 border-primary">
                    <?php if(session('message')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php echo e(session('message')); ?>

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-text="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-12">
                <div class="callout callout-info">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <dl>
                                    <dt><b class="border-bottom border-primary">Project Name</b></dt>
                                    <dd><?php echo e($details->project_name); ?></dd>
                                    <dt><b class="border-bottom border-primary">Description</b></dt>
                                    <dd><?php echo e($details->description); ?></dd>
                                    <dt><b class="border-bottom border-primary">Project Location</b></dt>
                                    <?php
                                        $location = unserialize($details->project_location_text);
                                    ?>
                                    <dd>
                                        <?php if(is_array($location)): ?>
                                            <strong>Region:</strong> <?php echo e($location['region']); ?><br>
                                            <strong>Province:</strong> <?php echo e($location['province']); ?><br>
                                            <strong>City:</strong> <?php echo e($location['city']); ?><br>
                                            <strong>Barangay:</strong> <?php echo e($location['barangay']); ?>

                                        <?php else: ?>
                                            Not Available
                                        <?php endif; ?>
                                    </dd>
                                </dl>
                            </div>
                            <div class="col-md-6">
                                <dl>
                                    <dt><b class="border-bottom border-primary">Start Date</b></dt>
                                    <dd><?php echo e(date('F m, Y', strtotime($details->start_date))); ?></dd>
                                </dl>
                                <dl>
                                    <dt><b class="border-bottom border-primary">End Date</b></dt>
                                    <dd><?php echo e(date('F m, Y', strtotime($details->end_date))); ?></dd>
                                </dl>
                                <dl>
                                    <dt><b class="border-bottom border-primary">Status</b></dt>
                                    <dd>
                                        <?php if($details->status == 'Pending'): ?>
                                            <span class='badge badge-secondary'><?php echo e($details->status); ?></span>
                                        <?php elseif($details->status == 'Started'): ?>
                                            <span class='badge badge-primary'><?php echo e($details->status); ?></span>
                                        <?php elseif($details->status == 'On-Progress'): ?>
                                            <span class='badge badge-info'><?php echo e($details->status); ?></span>
                                        <?php elseif($details->status == 'On-Hold'): ?>
                                            <span class='badge badge-warning'><?php echo e($details->status); ?></span>
                                        <?php elseif($details->status == 'Over Due'): ?>
                                            <span class='badge badge-danger'><?php echo e($details->status); ?></span>
                                        <?php elseif($details->status == 'Done'): ?>
                                            <span class='badge badge-success'><?php echo e($details->status); ?></span>
                                        <?php endif; ?>
                                    </dd>

                                </dl>
                                <dl>
                                    <dt><b class="border-bottom border-primary">Project Manager</b></dt>
                                    <dd>

                                        <div class="d-flex align-items-center mt-1">
                                            <img class="img-circle img-thumbnail p-0 shadow-sm border-info img-sm mr-3"
                                                src="<?php echo e(asset($details->manager->avatar)); ?>" alt="Avatar">
                                            <?php if(auth()->check() && $details->manager->fullname == auth()->user()->fullname): ?>
                                                <b>You</b>
                                            <?php else: ?>
                                                <b>Mr./Mrs. <?php echo e($details->manager->fullname); ?></b>
                                            <?php endif; ?>
                                        </div>
                                    </dd>
                                    <dt><b class="border-bottom border-primary">Project Owner</b></dt>
                                    <dd>

                                        <div class="d-flex align-items-center mt-1">
                                            <img class="img-circle img-thumbnail p-0 shadow-sm border-info img-sm mr-3"
                                                src="<?php echo e(asset($details->owner->avatar)); ?>" alt="Avatar">
                                            <b>You are the Owner of this Project</b>
                                        </div>

                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <span><b>Team Member/s:</b></span>
                        <div class="card-tools">
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="users-list clearfix">
                            <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <img class="w-50" style="height: 50px;" src="<?php echo e(asset($member->members->avatar)); ?>"
                                        alt="User Image">
                                    <p class="d-flex inline-block"><?php echo e($member->members->fullname); ?></p>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <span><b>Task List:</b></span>
                        
                    </div>
                    <div class="card-body p-2">
                        <div class="table-responsive">
                            <table id="example1" class="table table-condensed m-0 table-hover">
                                <colgroup>
                                    <col width="15%">
                                    <col width="25%">
                                    <col width="30%">
                                    <col width="15%">
                                    
                                </colgroup>
                                <thead>
                                    <th>#</th>
                                    <th>Task</th>
                                    <th>Member Associated</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <?php
                                            $trans = get_html_translation_table(HTML_ENTITIES, ENT_QUOTES);
                                            unset($trans["\""], $trans['<'], $trans['>'], $trans['<h2']);
                                            $desc = strtr(html_entity_decode($task->description), $trans);
                                            $desc = str_replace(['<li>', '</li>', '&nbsp;'], ['', ', ', ' '], $desc);
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo e($task->id); ?></td>
                                            <td class=""><b><?php echo e($task->task_name); ?></b></td>
                                            <td><?php echo e($task->taskfor->fullname); ?></td>
                                            <td class="">
                                                <p class="truncate"><?php echo e(strip_tags($desc)); ?></p>
                                            </td>
                                            <td>
                                                <?php if($task->status == 'Pending'): ?>
                                                    <span class='badge badge-secondary'><?php echo e($task->status); ?></span>
                                                <?php elseif($task->status == 'Started'): ?>
                                                    <span class='badge badge-primary'><?php echo e($task->status); ?></span>
                                                <?php elseif($task->status == 'On-Progress'): ?>
                                                    <span class='badge badge-info'><?php echo e($task->status); ?></span>
                                                <?php elseif($task->status == 'On-Hold'): ?>
                                                    <span class='badge badge-warning'><?php echo e($task->status); ?></span>
                                                <?php elseif($task->status == 'Over Due'): ?>
                                                    <span class='badge badge-danger'><?php echo e($task->status); ?></span>
                                                <?php elseif($task->status == 'Done'): ?>
                                                    <span class='badge badge-success'><?php echo e($task->status); ?></span>
                                                <?php endif; ?>
                                                </dd>
                                            </td>
                                            
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="5" class="text-center">No Task Available</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.owner.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u382238056/domains/constructflow-oetvr.com/public_html/resources/views/owner/projects/view-details.blade.php ENDPATH**/ ?>