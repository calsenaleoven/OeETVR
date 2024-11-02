
<style>
    .tasks-card-body {
        max-height: 400px; /* Adjust this value as needed */
        overflow-y: auto;
    }

    /* Custom scrollbar for task list */
    .tasks-card-body::-webkit-scrollbar {
        width: 8px;
    }

    .tasks-card-body::-webkit-scrollbar-track {
        background: #E9EFEC;
    }

    .tasks-card-body::-webkit-scrollbar-thumb {
        background: #6A9C89;
        border-radius: 4px;
    }

    .tasks-card-body::-webkit-scrollbar-thumb:hover {
        background: #16423C;
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
</style>
<?php $__env->startSection('content'); ?>
    <div class="content-header" style="background-color: #E9EFEC;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0" style="color: #16423C; font-weight: 600;">Project Details</h1>
                </div>
                <div class="col-sm-12 col-lg-12 col-md-12 mb-2">
                    <hr style="border-width: 2px; border-color: #6A9C89;">
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-12">
                <div class="callout" style="background-color: #E9EFEC; border-left: 5px solid #6A9C89;">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <dl>
                                    <dt><b style="border-bottom: 2px solid #6A9C89; color: #16423C;">Project Name</b></dt>
                                    <dd><?php echo e($details->project_name); ?></dd>
                                    <dt><b style="border-bottom: 2px solid #6A9C89; color: #16423C;">Description</b></dt>
                                    <dd><?php echo e($details->description); ?></dd>
                                    <dt><b style="border-bottom: 2px solid #6A9C89; color: #16423C;">Project Location</b></dt>
                                    <?php
                                        $location = unserialize($details->project_location_text);
                                    ?>
                                    <dd>
                                        <?php if(is_array($location)): ?>
                                            <strong style="color: #16423C;">Region:</strong> <?php echo e($location['region']); ?><br>
                                            <strong style="color: #16423C;">Province:</strong> <?php echo e($location['province']); ?><br>
                                            <strong style="color: #16423C;">City:</strong> <?php echo e($location['city']); ?><br>
                                            <strong style="color: #16423C;">Barangay:</strong> <?php echo e($location['barangay']); ?>

                                        <?php else: ?>
                                            Not Available
                                        <?php endif; ?>
                                    </dd>
                                </dl>
                            </div>
                            <div class="col-md-6">
                                <dl>
                                    <dt><b style="border-bottom: 2px solid #6A9C89; color: #16423C;">Start Date</b></dt>
                                    <dd><?php echo e(\Carbon\Carbon::parse($details->start_date)->format('F d, Y')); ?></dd>
                                </dl>
                                <dl>
                                    <dt><b style="border-bottom: 2px solid #6A9C89; color: #16423C;">End Date</b></dt>
                                    <dd><?php echo e(\Carbon\Carbon::parse($details->end_date)->format('F d, Y')); ?></dd>
                                </dl>
                                <dl>
                                    <dt><b style="border-bottom: 2px solid #6A9C89; color: #16423C;">Status</b></dt>
                                    <dd>
                                        <?php if($details->status == 'Pending'): ?>
                                            <span class='badge' style='background-color: #C4DAD2; color: #16423C;'><?php echo e($details->status); ?></span>
                                        <?php elseif($details->status == 'Started'): ?>
                                            <span class='badge' style='background-color: #6A9C89; color: #E9EFEC;'><?php echo e($details->status); ?></span>
                                        <?php elseif($details->status == 'On-Progress'): ?>
                                            <span class='badge' style='background-color: #16423C; color: #E9EFEC;'><?php echo e($details->status); ?></span>
                                        <?php elseif($details->status == 'On-Hold'): ?>
                                            <span class='badge' style='background-color: #C4DAD2; color: #16423C;'><?php echo e($details->status); ?></span>
                                        <?php elseif($details->status == 'Over Due'): ?>
                                            <span class='badge' style='background-color: #16423C; color: #E9EFEC;'><?php echo e($details->status); ?></span>
                                        <?php elseif($details->status == 'Done'): ?>
                                            <span class='badge' style='background-color: #6A9C89; color: #E9EFEC;'>Finished</span>
                                        <?php endif; ?>
                                    </dd>
                                </dl>
                                <dl>
                                    <dt><b style="border-bottom: 2px solid #6A9C89; color: #16423C;">Project Manager</b></dt>
                                    <dd>
                                        <div class="d-flex align-items-center mt-1">
                                            <img class="img-circle img-thumbnail p-0 shadow-sm img-sm mr-3"
                                                style="border-color: #6A9C89;"
                                                src="<?php echo e(asset($details->manager->avatar)); ?>"
                                                alt="Avatar">
                                            <b style="color: #16423C;">Mr./Mrs. <?php echo e($details->manager->fullname); ?></b>
                                        </div>
                                    </dd>
                                    <dt><b style="border-bottom: 2px solid #6A9C89; color: #16423C;">Project Owner</b></dt>
                                    <dd>
                                        <div class="d-flex align-items-center mt-1">
                                            <img class="img-circle img-thumbnail p-0 shadow-sm img-sm mr-3"
                                                style="border-color: #6A9C89;"
                                                src="<?php echo e(asset($details->owner->avatar)); ?>"
                                                alt="Avatar">
                                            <b style="color: #16423C;">Mr./Mrs. <?php echo e($details->owner->fullname); ?></b>
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
                <div class="card" style="border: none; border-radius: 15px;">
                    <div class="card-header" style="background-color: #6A9C89; color: #E9EFEC; border-radius: 15px 15px 0 0;">
                        <span><b>Team Member/s:</b></span>
                        <div class="card-tools">
                        </div>
                    </div>
                    <div class="card-body" style="background-color: #E9EFEC;">
                        <ul class="users-list clearfix">
                            <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <img class="w-50" style="height: 50px;"
                                        src="<?php echo e(asset($member->members->avatar)); ?>"
                                        alt="User Image">
                                    <p class="d-flex inline-block" style="color: #16423C;"><?php echo e($member->members->fullname); ?></p>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card" style="border: none; border-radius: 15px;">
                    <div class="card-header" style="background-color: #6A9C89; color: #E9EFEC; border-radius: 15px 15px 0 0;">
                        <span><b>Task List:</b></span>
                    </div>
                    <div class="card-body tasks-card-body" style="background-color: #E9EFEC;">
                        <div class="table-responsive">
                            <table id="example1" class="table table-hover">
                                <thead>
                                    <th style="color: #16423C;">#</th>
                                    <th style="color: #16423C;">Task</th>
                                    <th style="color: #16423C;">Associated to</th>
                                    <th style="color: #16423C;">Description</th>
                                    <th style="color: #16423C;">Status</th>
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
                                            <td><b style="color: #16423C;"><?php echo e($task->task_name); ?></b></td>
                                            <td><?php echo e($task->taskfor->fullname); ?></td>
                                            <td>
                                                <p class="truncate"><?php echo e(strip_tags($desc)); ?></p>
                                            </td>
                                            <td>
                                                <?php if($task->status == 'Pending'): ?>
                                                    <span class='badge' style='background-color: #C4DAD2; color: #16423C;'><?php echo e($task->status); ?></span>
                                                <?php elseif($task->status == 'Started'): ?>
                                                    <span class='badge' style='background-color: #6A9C89; color: #E9EFEC;'><?php echo e($task->status); ?></span>
                                                <?php elseif($task->status == 'On-Progress'): ?>
                                                    <span class='badge' style='background-color: #16423C; color: #E9EFEC;'><?php echo e($task->status); ?></span>
                                                <?php elseif($task->status == 'On-Hold'): ?>
                                                    <span class='badge' style='background-color: #C4DAD2; color: #16423C;'><?php echo e($task->status); ?></span>
                                                <?php elseif($task->status == 'Over Due'): ?>
                                                    <span class='badge' style='background-color: #16423C; color: #E9EFEC;'><?php echo e($task->status); ?></span>
                                                <?php elseif($task->status == 'Done'): ?>
                                                    <span class='badge' style='background-color: #6A9C89; color: #E9EFEC;'><?php echo e($task->status); ?></span>
                                                <?php endif; ?>
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
    <style>
        .table thead th {
            border-bottom: 2px solid #C4DAD2 !important;
            color: #6A9C89;
            font-weight: 600;
        }
        .table td {
            border-bottom: 1px solid #E9EFEC !important;
            vertical-align: middle;
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
    </style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u382238056/domains/constructflow-oetvr.com/public_html/resources/views/admin/projects/view-details.blade.php ENDPATH**/ ?>