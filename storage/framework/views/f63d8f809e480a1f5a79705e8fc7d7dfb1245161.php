<div class="mdl-layout__tab-panel <?php if (isset($_GET['tab']) && $_GET['tab'] === 'quality_control') {
    echo 'is-active';
} elseif (!isset($_GET['tab'])) {
    echo 'is-active';
} ?>" id="quality_control_panel">

    <div class="box">
        <div class="box-header" data-original-title>
            <div class="box-icon">
            </div>
        </div>
        <div class="box-content">
            <table id="quality_control_overview" class="datatable stripe">
                <thead>
                    <tr>
                        <th style="width: 25px !important;"></th>
                        <th data-priority="1">WOskdnhsk/No</th>
                        <th>Mechanic</th>
                        <th>Inspector</th>
                        <th class="hidemobile">License Plate</th>
                        <th class="hidemobile">Creation Date</th>
                        <th class="hidemobile">On hand</th>
                        <th class="text-center disable_sorting" data-priority="2"></th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th></th>
                        <th data-priority="1">WO/No</th>
                        <th>Mechanic</th>
                        <th>Inspector</th>
                        <th class="hidemobile">License Plate</th>
                        <th class="hidemobile">Creation Date</th>
                        <th class="hidemobile">On hand</th>
                        <th style="display:none;" class="text-center" data-priority="2"></th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $__currentLoopData = $quality_control; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php foreach ($users as $user) {
                        if ($item->inspector == $user->id) {
                        $inspector = $user->first_name . ' ' . $user->surname_prefix . ' ' . $user->surname;
                        } else {
                        $inspector = '';
                        }
                        if ($item->employee == $user->id) {
                        $employee = $user->first_name . ' ' . $user->surname_prefix . ' ' . $user->surname;
                        }
                        else{
                            $employee = '';
                        }
                        } ?>
                        <tr>
                            <?php if($item->completed == null): ?>
                                <td class="table-warning"><span class="colorcode">0</span></td>
                            <?php else: ?>
                                <td class="table-success"><span class="colorcode">1</span></td>
                            <?php endif; ?>
                            <td onclick="window.location='<?php echo e(url('/quality_control/edit', $item->id)); ?>'">
                                <?php echo e($item->wo_number); ?></td>
                            <td onclick="window.location='<?php echo e(url('/quality_control/edit', $item->id)); ?>'">
                                <?php echo e($inspector); ?></td>
                            
                                <td onclick="window.location='<?php echo e(url('/quality_control/edit', $item->id)); ?>'">
                                <?php echo e($employee); ?></td>


                            <td onclick="window.location='<?php echo e(url('/quality_control/edit', $item->id)); ?>'"
                                class="hidemobile"><?php echo e($item->license_plate); ?></td>
                            <td onclick="window.location='<?php echo e(url('/quality_control/edit', $item->id)); ?>'"
                                class="hidemobile"><?php echo date('d/m/Y',
                                strtotime($item->creationdate)); ?></td>
                            <td onclick="window.location='<?php echo e(url('/quality_control/edit', $item->id)); ?>'"
                                class="hidemobile"><?php echo date('d/m/Y H:i:s',
                                strtotime($item->on_hand)); ?></td>
                            <td class="text-center" style="float:right">
                                <i class="material-icons" style="font-size: 24px; color: red;cursor:pointer"
                                onclick="delete_quality('<?php echo e($item->id); ?>')">delete_forever</i>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div id="quality_control_overview_pager"></div>
            <div class="spacer spacer-height-60"></div>
        </div>
    </div>
    <a href="#modal-qualitycontrol"
        class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-button--fab fixed-action-btn">
        <i class="material-icons">add</i>
    </a>
    <div id="modal-qualitycontrol" class="modal-window">
        <div class="modal-content" style="width:400px">
            <h1>Add Quality Control</h1>
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--12-col">
                    <a style="padding:0;"
                        class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored spf-link fullwidth"
                        href="<?php echo e(url('/quality_control/new/1')); ?>">Maintenance / Repair</a> </div>
                <div class="mdl-cell mdl-cell--12-col">
                    <a style="padding:0;"
                        class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored spf-link fullwidth"
                        href="<?php echo e(url('/quality_control/new/2')); ?>">Warranty / Diagnosis</a> </div>
                <div class="mdl-cell mdl-cell--12-col">
                    <a style="padding:0;"
                        class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored spf-link fullwidth"
                        href="<?php echo e(url('/quality_control/new/3')); ?>">Delivery</a> </div>
            </div>
            <div class="modal-footer">
                <a href="#" style="float:right" class="mdl-button mdl-js-button mdl-js-ripple-effect cancel">Cancel</a>
            </div>
        </div>
    </div>
</div>
<dialog id="modal__confirm" class="mdl-dialog">
    <h4 class="mdl-dialog__title">{title}</h4>
    <div class="mdl-dialog__content"></div>
    <div class="mdl-dialog__actions"></div>
    <div class="mdl-dialog__loading">
        <div class="mdl-spinner mdl-spinner--single-color mdl-js-spinner is-active"></div>
    </div>
</dialog>
<script>
    function delete_quality(id) {

        system.confirm('Delete File', 'Are you sure you want to delete this file?',
            function() {
                //alert(id);
                location.href = 'quality_control/delete/' + id;
            }
        )
    }

</script>
<?php /**PATH D:\12thsept\resources\views/inc/QualityControl/quality_control.blade.php ENDPATH**/ ?>