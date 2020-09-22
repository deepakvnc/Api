<div class="mdl-layout__tab-panel" id="diagnosis_history_panel">
    <div class="box">
        <div class="box-header" data-original-title>
            <div class="box-icon">
            </div>
        </div>
        <div class="box-content">
            <table id="diagnosis_overview" class="datatable2 stripe" width="100%">
                <thead>
                    <tr style="text-align:left">
                        <th style="width:25px !important;"><i class="material-icons">filter_list</i></th>
                        <th data-priority="1" style="max-width:100px;">WO/No</th>
                        <th>Customer Complaint</th>
                        <th class="hidemobile">Mechanic</th>
                        <th style="width:20px;">#</th>
                        <th class="hidemobile" style="max-width:100px;">License Plate</th>
                        <th class="hidemobile" style="width:60px;">VIN</th>
                        <th class="hidemobile" style="max-width:100px;">Creation Date</th>
                        <th class="hidemobile" style="max-width:100px;">Completed</th>
                        <th class="text-center disable_sorting" data-priority="2" style="width: 120px;"></th>
                    </tr>
                </thead>

                <tfoot>
                    <tr>
                        <td style="pointer-events:none; width:20px !important;"></th>
                        <th data-priority="1">WO/No</th>
                        <th>Customer Complaint</th>
                        <th class="hidemobile">Mechanic</th>
                        <th style="width: 20px;">#</th>
                        <th class="hidemobile" style="max-width:100px;">License Plate</th>
                        <th class="hidemobile" style="width:60px;">VIN</th>
                        <th class="hidemobile" style="max-width:100px;">Creation Date</th>
                        <th class="hidemobile" style="max-width:100px;">Completed</th>
                        <th class="text-center" data-priority="2" style="width: 120px; display:none;"></th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $__currentLoopData = $diagnoses_com; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($item->completed != null): ?>
                        <?php
                        $mydate = strtotime($item->creationdate);
                        $newformat = date('m/d/Y',$mydate);
                        $onclick= "window.location='".url('/diagnosis/view', $item->id)."'";

                        $comdate = strtotime($item->completed);
                        $comformat = date('m/d/Y h:i:s a',$comdate);
                        $onclick_com= "window.location='".url('/diagnosis/view', $item->id)."'";
                          ?>
                            <tr>
                                <td class="table-success"><span class="colorcode">0</span><i
                                        class="material-icons">check</i></td>
                                <td onclick="window.location='<?php echo e(url('/diagnosis/view', $item->id)); ?>'" title="<?php echo $item->wo_number?>"><?php echo e($item->wo_number); ?></td>
                                <td onclick="window.location='<?php echo e(url('/diagnosis/view', $item->id)); ?>'" title="<?php echo $item->complaint_number?>"><?php echo e($item->complaint_number); ?></td>
                                <td class="hidemobile" onclick="window.location='<?php echo e(url('/diagnosis/view', $item->id)); ?>'"  title="<?php echo $item->first_name?>"><?php echo e($item->first_name); ?> <?php echo e($item->surname_prefix); ?>

                                    <?php echo e($item->surname); ?></td>
                                <td onclick="window.location='<?php echo e(url('/diagnosis/view', $item->id)); ?>'" title="<?php echo $item->complaint_number?>"><?php echo e($item->complaint_number); ?></td>
                                <td class="hidemobile" onclick="window.location='<?php echo e(url('/diagnosis/view', $item->id)); ?>'" title="<?php echo $item->license_plate?>"><?php echo e($item->license_plate); ?></td>
                                <td class="hidemobile" onclick="window.location='<?php echo e(url('/diagnosis/view', $item->id)); ?>'" title="<?php echo $item->vin?>"><?php echo e($item->vin); ?></td>
                                <?php echo '  <td data-sort="'. $mydate .'" onclick="'.$onclick.'" title="'.$newformat.'">'.$newformat .'</td>';?>
                                <?php echo '  <td data-sort="'. $comdate .'" onclick="'.$onclick_com.'" title="'.$comformat.'">'.$comformat .'</td>';?>
                                <td class="text-center" style="float:right">
                                    <i class="material-icons" style="font-size: 24px; color: #00aDEF;cursor:pointer" onclick="pdf('<?php echo e($item->wo_number); ?>', <?php echo e($item->id); ?>)">picture_as_pdf</i>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div id="diagnosis_overview_history_pager"></div>
            <div class="spacer spacer-height-60"></div>
        </div>
    </div>
</div>

<script>
function pdf(wo_number, id) {  
    system.confirm('WO number:'+wo_number, 'The PDF has been generated',
        function() {
            location.href = '/diagnosis/pdf/'+id;
        }
    )
}
</script>
<?php /**PATH C:\xampp\htdocs\latest\16thsept1\resources\views/Diagnosis/Tabs/diagnosis_history.blade.php ENDPATH**/ ?>