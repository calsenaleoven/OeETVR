
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
                    <h1 class="m-0">Project List</h1>
                </div>
                <div class="col-sm-12 col-lg-12 col-md-12 mb-2">
                    <hr class="border-2 border-primary">
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid ">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h5>Project Progress</h5>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Project</th>
                                    <th>Progress</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($row->id); ?></td>
                                    <td><?php echo e($row->project_name); ?></td>
                                    <td>
                                        <div class="progress">
                                            <?php if($row->totalPercentage == 100): ?>
                                                <div class="progress-bar bg-success" role="progressbar"
                                                    style="width: 100%;" aria-valuenow="100" aria-valuemin="0"
                                                    aria-valuemax="100">100%</div>
                                            <?php else: ?>
                                                <div class="progress-bar <?php echo e($row->totalPercentage >= 1 && $row->totalPercentage <= 10 ? 'bg-danger' : ($row->totalPercentage >= 11 && $row->totalPercentage <= 20 ? 'bg-warning' : ($row->totalPercentage >= 21 && $row->totalPercentage <= 40 ? 'bg-info' : 'bg-success'))); ?>"
                                                    role="progressbar" style="width: <?php echo e($row->totalPercentage); ?>%;"
                                                    aria-valuenow="<?php echo e($row->totalPercentage); ?>" aria-valuemin="0"
                                                    aria-valuemax="100"><?php echo e($row->totalPercentage); ?>%</div>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <?php
                                            $totalPercentage = $row->tasks->sum('percentage');
                                            $completedTasks = $row->tasks->where('status', 'Done')->count();
                                            $totalTasks = $row->tasks->count();
                                        ?>

                                        <?php if($completedTasks > 0 && $totalPercentage == 100): ?>
                                            <span class="badge badge-sm bg-success">Finished</span>
                                        <?php else: ?>
                                            <span class="badge badge-sm bg-danger">Incomplete</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        
                                        <a href="<?php echo e(route('owner.project-details', ['id' => $row->id])); ?>" class="btn btn-sm btn-primary"><i class="fas fa-folder"></i> View</a>
                                        <a href="<?php echo e(route('owner.project-files', ['id' => $row->id])); ?>" class="btn btn-sm btn-success"><i class="fas fa-folder"></i> Project Files</a>
                                        <a href="<?php echo e(route('owner.project-materials', ['id' => $row->id])); ?>" class="btn btn-sm btn-info"><i class="fas fa-folder"></i> Project Materials</a>
                                        <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <!-- Feedback button for each project -->
                                                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#feedbackModal-<?php echo e($row->id); ?>" data-project-id="<?php echo e($row->id); ?>">
                                                    <i class="fas fa-comment-dots"></i> Feedback
                                                </button>
                                                
                                                <!-- Feedback Modal -->
                                                <div class="modal fade" id="feedbackModal-<?php echo e($row->id); ?>" tabindex="-1" role="dialog" aria-labelledby="feedbackModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="feedbackModalLabel">Submit Feedback for Project Members</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="<?php echo e(route('owner.project-feedback')); ?>" method="POST">
                                                                    <?php echo csrf_field(); ?>
                                                                    <input type="hidden" name="project_id" value="<?php echo e($row->id); ?>">
                                                                    <?php $__currentLoopData = $row->members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <div class="form-group">
                                                                            <label class="feedback-label">Rate <?php echo e($member->user->fullname); ?></label>
                                                                            <div id="rating-<?php echo e($member->user->id); ?>" class="star-rating">
                                                                                <span onclick="rateMember(<?php echo e($member->user->id); ?>, 1)" class="star">★</span>
                                                                                <span onclick="rateMember(<?php echo e($member->user->id); ?>, 2)" class="star">★</span>
                                                                                <span onclick="rateMember(<?php echo e($member->user->id); ?>, 3)" class="star">★</span>
                                                                                <span onclick="rateMember(<?php echo e($member->user->id); ?>, 4)" class="star">★</span>
                                                                                <span onclick="rateMember(<?php echo e($member->user->id); ?>, 5)" class="star">★</span>
                                                                            </div>
                                                                            <input type="hidden" name="ratings[<?php echo e($member->user->id); ?>]" id="ratingValue-<?php echo e($member->user->id); ?>" value="">
                                                                            <label for="comment-<?php echo e($member->id); ?>" class="comment-label">Comment:</label>
                                                                            <textarea class="form-control" name="comments[<?php echo e($member->user->id); ?>]" id="comment-<?php echo e($member->user->id); ?>" rows="3"></textarea>
                                                                        </div>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    <button type="submit" class="btn btn-primary">Submit Feedback</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                    
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td class="text-center" colspan="5">No Project Available</td>
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
       function rateMember(memberId, rating) {
        // Update the hidden input with the rating value
        document.getElementById(`ratingValue-${memberId}`).value = rating;
    
        // Remove existing active classes for stars
        const stars = document.querySelectorAll(`#rating-${memberId} .star`);
        stars.forEach((star, index) => {
            star.classList.remove('active'); // Remove active class from all stars
            // Add active class to stars up to the clicked rating
            if (index < rating) {
                star.classList.add('active');
            }
        });
    }
    </script>
    
    <style>
        .star {
            cursor: pointer;
            font-size: 45px; /* Adjust size as needed */
            color: gray; /* Inactive star color */
            transition: color 0.2s; /* Add transition for smooth color change */
        }
    
        .star:hover {
            color: gold; /* Hover color */
        }
    
        .star.active {
            color: gold; /* Active star color */
        }
    
        .form-group {
            margin-bottom: 30px; /* Spacing between form groups */
        }
        
        .feedback-label {
        font-weight: bold;
        color: #333; /* Change to your desired color */
        font-size: 2em; /* Adjust font size as needed */
        margin-bottom: 5px; /* Adds space below the label */
    }
    .comment-label {
        font-weight: bold;
        color: #333; /* Change to your desired color */
        font-size: 2em; /* Adjust font size as needed */
        margin-top: 10px; /* Adds space above the comment label */
    }
    </style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.owner.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u382238056/domains/constructflow-oetvr.com/public_html/resources/views/owner/projects/project-list.blade.php ENDPATH**/ ?>