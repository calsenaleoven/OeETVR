<?php $__env->startSection('content'); ?>
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
                                        <td class="text-center">
                                            <button type="button"
                                                class="btn btn-default btn-sm btn-flat border-info wave-effect text-info dropdown-toggle"
                                                data-toggle="dropdown" aria-expanded="true" 
                                                <?php echo e($task->status == 'Done' ? 'disabled' : ''); ?>> <!-- Disable if Done -->
                                                Action
                                            </button>
                                            <div class="dropdown-menu">
                                                <div class="dropdown-divider"></div>
                                                <button type="button" class="dropdown-item update-status" data-id="<?php echo e($task->id); ?>" data-status="Started">Started</button>
                                                <div class="dropdown-divider"></div>
                                                <button type="button" class="dropdown-item update-status" data-id="<?php echo e($task->id); ?>" data-status="Done">Done</button>
                                            </div>
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
    <script>
    $(document).ready(function() {
        $('.update-status').on('click', function() {
            let taskId = $(this).data('id');
            let status = $(this).data('status');
            
            $.ajax({
                url: '<?php echo e(route("member.task-list")); ?>', // Define this route in your routes file
                type: 'POST',
                data: {
                    _token: '<?php echo e(csrf_token()); ?>',
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


<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.member.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u382238056/domains/constructflow-oetvr.com/public_html/resources/views/member/projects/task-list.blade.php ENDPATH**/ ?>