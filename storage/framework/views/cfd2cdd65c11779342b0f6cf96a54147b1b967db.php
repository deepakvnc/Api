<div class="mdl-layout__tab-panel <?php if(isset($_GET['tab']) && $_GET['tab'] === 'groups' ) echo 'is-active'?>" id="groups_panel">
    <div class="box">
        <div class="box-header" data-original-title>
            <h2></h2>
            <div class="box-icon">
            </div>
        </div>
        <div class="box-content">
            <table id="group_overview" class="datatable stripe">
                <thead>
                    <tr>
                        <th data-priority="1">Name</th>
                        <th>Dealer</th>
                        <th>Location</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td onclick="window.location='<?php echo e(url('/group/edit', $group->id)); ?>'"><?php echo e($group->name); ?></td>
                        <td onclick="window.location='<?php echo e(url('/group/edit', $group->id)); ?>'"><?php echo e($group->dlname); ?></td>
                        <td onclick="window.location='<?php echo e(url('/group/edit', $group->id)); ?>'"><?php echo e($group->dlname); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div id="group_overview_pager"></div>
        </div>
    </div>
</div><?php /**PATH C:\xampp2\htdocs\16thsept\resources\views/inc/group_panel.blade.php ENDPATH**/ ?>