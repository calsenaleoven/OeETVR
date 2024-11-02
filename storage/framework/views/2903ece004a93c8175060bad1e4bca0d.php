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
<?php $__env->startSection('content'); ?>
    <div class="content-header" style="background-color: #E9EFEC;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0" style="color: #16423C; font-weight: 600;">Users</h1>
                </div>
                <div class="col-sm-12 col-lg-12 col-md-12 mb-2">
                    <hr class="border-2" style="border-color: #6A9C89;">
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12 col-sm-12 col-md-12 mt-2">
        <div class="container-fluid mt-2" style="background-color: #C4DAD2;">
            <div class="card shadow-sm border-0" style="border-radius: 15px;">
                <div class="card-header py-3" style="background-color: #6A9C89; border-radius: 15px 15px 0 0;">
                    <h4 class="text-white">
                        All Users
                        <a href="<?php echo e(route('admin.create')); ?>" class="btn float-right text-white" style="background-color: #16423C;">
                            <i class="fas fa-user-plus"></i> Create New User
                        </a>
                    </h4>
                </div>
                <div class="card-body">
                    <?php if(session('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert" 
                             style="background-color: #6A9C89; color: #E9EFEC; border: none;">
                            <?php echo e(session('success')); ?>

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-text="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <table id="example1" class="table table-hover">
                        <thead>
                            <tr>
                                <th style="color: #16423C;">#</th>
                                <th style="color: #16423C;">Avatar</th>
                                <th style="color: #16423C;">Name</th>
                                <th style="color: #16423C;">Email</th>
                                <th style="color: #16423C;">Role</th>
                                <th style="color: #16423C;">Account Status</th>
                                <th style="color: #16423C;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 1;
                            ?>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($i++); ?></td>
                                    <td>
                                        <img style="height: 50px; width: 50px; border: 1px solid #6A9C89;"
                                            class="rounded-circle" src="<?php echo e(asset($row->avatar)); ?>" alt="">
                                    </td>
                                    <td><?php echo e($row->fullname); ?></td>
                                    <td><?php echo e($row->email); ?></td>
                                    <td>
                                        <?php switch($row->type):
                                            case (0): ?>
                                                <span class="badge" style="background-color: #16423C; color: #E9EFEC;">Owner</span>
                                            <?php break; ?>

                                            <?php case (2): ?>
                                                <span class="badge" style="background-color: #6A9C89; color: #E9EFEC;">Manager</span>
                                            <?php break; ?>

                                            <?php case (3): ?>
                                                <span class="badge" style="background-color: #C4DAD2; color: #16423C;">Member</span>
                                            <?php break; ?>

                                            <?php default: ?>
                                                <?php echo e($row->type); ?>

                                        <?php endswitch; ?>
                                    </td>
                                    <td>
                                        <?php
                                            $badgeClass = $row->is_deleted == 0 ? 'background-color: #6A9C89;' : 'background-color: #16423C;';
                                            $badgeText = $row->is_deleted == 0 ? 'Active' : 'Disabled';
                                        ?>
                                        <span class="badge" style="<?php echo e($badgeClass); ?> color: #E9EFEC;"><?php echo e($badgeText); ?></span>
                                    </td>
                                    <td>
                                    <div class="btn-group">
                                                <button type="button" class="btn text-white font-weight-bold" style="background-color: #16423C;"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu" style="background-color: #E9EFEC; border: 1px solid #6A9C89;">
                                                    <a class="dropdown-item font-weight-bold" style="color: #16423C;" 
                                                        href="/admin/users/view-data/<?php echo e($row->id); ?>">View</a>
                                                    <a class="dropdown-item font-weight-bold" style="color: #16423C;"
                                                        href="/admin/users/edit-data/<?php echo e($row->id); ?>">Edit</a>
                                                    <button type="button" class="dropdown-item font-weight-bold" style="color: #16423C;" 
                                                        data-toggle="modal" data-target="#confirmDeleteModal">Delete</button>
                                                    <?php if($row->is_deleted == 0): ?>
                                                        <button type="button" class="dropdown-item font-weight-bold" style="color: #16423C;"
                                                            data-toggle="modal" data-target="#confirmDisableModal_<?php echo e($row->id); ?>">
                                                            Disable Account
                                                        </button>
                                                    <?php else: ?>
                                                        <button type="button" class="dropdown-item font-weight-bold" style="color: #16423C;"
                                                            data-toggle="modal" data-target="#confirmEnableModal_<?php echo e($row->id); ?>">
                                                            Enable Account
                                                        </button>
                                                    <?php endif; ?>
                                                </div>
                                            </div>


                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog"
                                            aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content" style="background-color: #E9EFEC;">
                                                    <div class="modal-header" style="background-color: #6A9C89;">
                                                        <h5 class="modal-title text-white" id="confirmDeleteModalLabel">
                                                            Confirm Delete
                                                        </h5>
                                                        <button type="button" class="close text-white" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" style="color: #16423C;">
                                                        Are you sure you want to delete this User?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn" style="background-color: #C4DAD2; color: #16423C;"
                                                            data-dismiss="modal">Cancel</button>
                                                        <form method="POST"
                                                            action="<?php echo e(route('admin.delete-user', ['removeId' => $row->id])); ?>"
                                                            id="deleteForm">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('DELETE'); ?>
                                                            <button type="submit" class="btn text-white"
                                                                style="background-color: #16423C;">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Disable Modal -->
                                        <div class="modal fade" id="confirmDisableModal_<?php echo e($row->id); ?>" tabindex="-1" 
                                            role="dialog" aria-labelledby="confirmDisableModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content" style="background-color: #E9EFEC;">
                                                    <div class="modal-header" style="background-color: #6A9C89;">
                                                        <h5 class="modal-title text-white" id="confirmDisableModalLabel">
                                                            Confirm Disabling this Account
                                                        </h5>
                                                        <button type="button" class="close text-white" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" style="color: #16423C;">
                                                        Are you sure you want to Disable this User Account?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn" style="background-color: #C4DAD2; color: #16423C;"
                                                            data-dismiss="modal">Cancel</button>
                                                        <form method="POST"
                                                            action="<?php echo e(route('admin.disable-user')); ?>"
                                                            id="deleteForm">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('POST'); ?>
                                                            <input type="hidden" name="userId"
                                                                value="<?php echo e($row->id); ?>">
                                                            <button type="submit" class="btn text-white"
                                                                style="background-color: #16423C;">Disable</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Enable Modal -->
                                        <div class="modal fade" id="confirmEnableModal_<?php echo e($row->id); ?>" tabindex="-1" 
                                            role="dialog" aria-labelledby="confirmEnableModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content" style="background-color: #E9EFEC;">
                                                    <div class="modal-header" style="background-color: #6A9C89;">
                                                        <h5 class="modal-title text-white" id="confirmDisableModalLabel">
                                                            Confirm Enabling this Account
                                                        </h5>
                                                        <button type="button" class="close text-white" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" style="color: #16423C;">
                                                        Are you sure you want to Re-Enable this User Account?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn" style="background-color: #C4DAD2; color: #16423C;"
                                                            data-dismiss="modal">Cancel</button>
                                                        <form method="POST"
                                                            action="<?php echo e(route('admin.activate-user')); ?>"
                                                            id="deleteForm">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('POST'); ?>
                                                            <input type="hidden" name="userId"
                                                                value="<?php echo e($row->id); ?>">
                                                            <button type="submit" class="btn text-white"
                                                                style="background-color: #6A9C89;">Activate</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
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

        .dropdown-item {
                font-weight: bold;
            }

            .dropdown-item:hover {
                background-color: #16423C !important;
                color: #E9EFEC !important;
            }

            .btn-group .btn:hover {
                background-color: #6A9C89 !important;
                border-color: #6A9C89 !important;
                color: #E9EFEC !important;
            }

    </style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u382238056/domains/constructflow-oetvr.com/public_html/resources/views/admin/users/index.blade.php ENDPATH**/ ?>