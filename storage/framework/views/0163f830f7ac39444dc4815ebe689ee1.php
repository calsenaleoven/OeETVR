<?php $__env->startSection('content'); ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0">Users</h1>
                </div>
                <div class="col-sm-12 col-lg-12 col-md-12 mb-2">
                    <hr class="border-2 border-primary">
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12 col-sm-12 col-md-12 mt-2">
        <div class="container-fluid mt-2">
            <div class="card">
                <div class="card-header">
                    <h4>
                        All Users
                        <a href="<?php echo e(route('admin.create')); ?>" class="btn btn-primary float-right"><i
                                class="fas fa-user-plus"></i> Create New
                            User</a>
                    </h4>
                </div>
                <div class="card-body">
                    <?php if(session('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php echo e(session('success')); ?>

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-text="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <table id="example1" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Avatar</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Account Status</th>
                                <th>Actions</th>
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
                                        <img style="height: 50px; width: 50px; border: 1px solid black;"
                                            class="rounded-circle" src="<?php echo e(asset($row->avatar)); ?>" alt="">
                                    </td>
                                    <td><?php echo e($row->fullname); ?></td>
                                    <td><?php echo e($row->email); ?></td>
                                    <td>
                                        <?php switch($row->type):
                                            case (0): ?>
                                                <span class="bg-owner">Owner</span>
                                            <?php break; ?>

                                            <?php case (2): ?>
                                                <span class="bg-manager">Manager</span>
                                            <?php break; ?>

                                            <?php case (3): ?>
                                                <span class="bg-member">Member</span>
                                            <?php break; ?>

                                            <?php default: ?>
                                                <?php echo e($row->type); ?>

                                        <?php endswitch; ?>
                                    </td>
                                    <td>
                                        <?php
                                            $badgeClass = $row->is_deleted == 0 ? 'bg-success' : 'bg-danger';
                                            $badgeText = $row->is_deleted == 0 ? 'Active' : 'Disabled';
                                        ?>
                                        <span class="badge badge-sm <?php echo e($badgeClass); ?>"><?php echo e($badgeText); ?></span>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-secondary dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Actions
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                    href="/admin/users/view-data/<?php echo e($row->id); ?>">View</a>
                                                <a class="dropdown-item"
                                                    href="/admin/users/edit-data/<?php echo e($row->id); ?>">Edit</a>
                                                <button type="button" class="dropdown-item" data-toggle="modal"
                                                    data-target="#confirmDeleteModal">Delete</button>
                                                    <?php if($row->is_deleted == 0): ?>
                                                    <button type="button" data-toggle="modal" data-target="#confirmDisableModal_<?php echo e($row->id); ?>" class="dropdown-item">
                                                        Disable Account
                                                    </button>
                                                <?php else: ?>
                                                    <button type="button" data-toggle="modal" data-target="#confirmEnableModal_<?php echo e($row->id); ?>" class="dropdown-item">
                                                        Enable Account
                                                    </button>
                                                <?php endif; ?>
                                            </div>
                                            <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog"
                                                aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm
                                                                Delete
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete this User ?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Cancel</button>
                                                            <form method="POST"
                                                                action="<?php echo e(route('admin.delete-user', ['removeId' => $row->id])); ?>"
                                                                id="deleteForm">
                                                                <?php echo csrf_field(); ?>
                                                                <?php echo method_field('DELETE'); ?>
                                                                <button type="submit"
                                                                    class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="confirmDisableModal_<?php echo e($row->id); ?>"
                                                tabindex="-1" role="dialog" aria-labelledby="confirmDisableModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="confirmDisableModalLabel">Confirm
                                                                Disabling this Account
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to Disable this User Account ?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Cancel</button>
                                                            <form method="POST"
                                                                action="<?php echo e(route('admin.disable-user')); ?>"
                                                                id="deleteForm">
                                                                <?php echo csrf_field(); ?>
                                                                <?php echo method_field('POST'); ?>
                                                                <input type="hidden" name="userId"
                                                                    value="<?php echo e($row->id); ?>">
                                                                <button type="submit"
                                                                    class="btn btn-danger">Disable</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="confirmEnableModal_<?php echo e($row->id); ?>" tabindex="-1" role="dialog"
                                                aria-labelledby="confirmEnableModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="confirmDisableModalLabel">Confirm
                                                                Enabling this Account
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to Re-Enable this User Account ?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Cancel</button>
                                                            <form method="POST"
                                                                action="<?php echo e(route('admin.activate-user')); ?>"
                                                                id="deleteForm">
                                                                <?php echo csrf_field(); ?>
                                                                <?php echo method_field('POST'); ?>
                                                                <input type="hidden" name="userId"
                                                                    value="<?php echo e($row->id); ?>">
                                                                <button type="submit"
                                                                    class="btn btn-success">Activate</button>
                                                            </form>
                                                        </div>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\construction-management-system\resources\views/admin/users/index.blade.php ENDPATH**/ ?>