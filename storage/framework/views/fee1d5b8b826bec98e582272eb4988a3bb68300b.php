<div class="mdl-layout__tab-panel <?php if(isset($_GET['tab']) && $_GET['tab'] === 'users' ) echo 'is-active'?>" id="users_panel">
    <div class="box">
        <div class="box-header" data-original-title>
            <h2></h2>
            <div class="box-icon">
            </div>
        </div>
        <div class="box-content">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--12-col"><label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="show_inactive"><input id="show_inactive" name="show_inactive" class="mdl-checkbox__input" value="1" type="checkbox"><span class="mdl-checkbox__label">Show inactive users</span></label></div>
            </div>
            <table id="user_overview" class="datatable stripe">
                <thead>
                    <tr>
                        <th data-priority="1">Name</th>
                        <th>Email</th>
                        <th>User Role</th>
                        <th>Location</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td onclick="window.location='<?php echo e(url('/user/edit', $user->id)); ?>'"><?php echo e($user->first_name); ?> <?php echo e($user->surname_prefix); ?> <?php echo e($user->surname); ?></td>
                        <td onclick="window.location='<?php echo e(url('/user/edit', $user->id)); ?>'"><?php echo e($user->email); ?></td>
                        <td onclick="window.location='<?php echo e(url('/user/edit', $user->id)); ?>'"><?php echo e($user->function); ?></td>
                        <td onclick="window.location='<?php echo e(url('/user/edit', $user->id)); ?>'"><?php echo e($user->dlname); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div id="user_overview_pager"></div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp2\htdocs\16thsept\resources\views/inc/user_panel.blade.php ENDPATH**/ ?>