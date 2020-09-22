<div class="mdl-layout__tab-panel is-active" id="diagnosis_panel">

    <div class="box">
        <div class="box-header" data-original-title>
            <div class="box-icon">
            </div>
        </div>
        <div class="box-content">
            <table id="diagnosis_overview" class="datatable stripe" width="100%">
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
                        <th class="text-center disable_sorting" data-priority="2" style="width: 120px;"></th>
                    </tr>
                </thead>

                <tfoot>
                    <tr>
                        <th style="pointer-events:none; width:20px !important;"></th>
                        <th data-priority="1">WO/No</th>
                        <th>Customer Complaint</th>
                        <th class="hidemobile">Mechanic</th>
                        <th style="width: 20px;">#</th>
                        <th class="hidemobile" style="max-width:100px;">License Plate</th>
                        <th class="hidemobile" style="width:60px;">VIN</th>
                        <th class="hidemobile" style="max-width:100px;">Creation Date</th>
                        <th class="text-center" data-priority="2" style="width: 120px; display:none;"></th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $__currentLoopData = $diagnoses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <?php if($item->signature_manager !== null): ?>
                            <td class="table-success"><span class="colorcode">0</span><i class="material-icons">check</i></td>
                        <?php elseif($item->signature_mechanic !== null): ?>
                            <td class="table-success"><span class="colorcode">1</span></td>
                        <?php elseif($item->on_hand !== null): ?>
                            <td class="table-warning"><span class="colorcode">2</span></td>                                        
                        <?php elseif($item->on_hand == null): ?>
                            <td class="table-danger"><span class="colorcode">3</span></td>
                        <?php endif; ?>
                        <?php
                        $mydate = strtotime($item->creationdate);
                        $newformat = date('d-m-Y',$mydate);
                        $onclick= "window.location='".url('/diagnosis/edit', $item->id)."'";
                          ?>
                        <td onclick="window.location='<?php echo e(url('/diagnosis/edit', $item->id)); ?>"><?php echo e($item->wo_number); ?></td>
                        <td onclick="window.location='<?php echo e(url('/diagnosis/edit', $item->id)); ?>'"><?php echo e($item->complaint_customer); ?></td>
                        <td onclick="window.location='<?php echo e(url('/diagnosis/edit', $item->id)); ?>'" class="hidemobile"><?php echo e($item->first_name); ?> <?php echo e($item->surname_prefix); ?> <?php echo e($item->surname); ?></td>
                        <td onclick="window.location='<?php echo e(url('/diagnosis/edit', $item->id)); ?>'">0</td>
                        <td onclick="window.location='<?php echo e(url('/diagnosis/edit', $item->id)); ?>'" class="hidemobile"><?php echo e($item->license_plate); ?></td>
                        <td onclick="window.location='<?php echo e(url('/diagnosis/edit', $item->id)); ?>'" class="hidemobile"><?php echo e($item->vin); ?></td>
                        <?php echo '  <td data-sort="'. $mydate .'" onclick="'.$onclick.'">'.$newformat .'</td>';?>
                        <td class="text-center" style="float:right;">
                            <i class="material-icons" style="font-size: 24px; color: #00aDEF;cursor:pointer" onclick="pdf('<?php echo e($item->wo_number); ?>')">picture_as_pdf</i>
                            <i class="material-icons" style="font-size: 24px; color: red;cursor:pointer" onclick="delete_quality('<?php echo e($item->id); ?>')">delete_forever</i>
                      </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div id="diagnosis_overview_pager"></div>
            <div class="spacer spacer-height-60"></div>
        </div>
    </div>
    <a href="<?php echo e(url('/login/changeform', 1)); ?>" id="add_diagnosis" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-button--fab fixed-action-btn spf-link">
        <i class="material-icons">add</i>
    </a>
</div>


<dialog id="modal__confirm" class="mdl-dialog">
    <h4 class="mdl-dialog__title">{title}</h4>
    <div class="mdl-dialog__content"></div>
    <div class="mdl-dialog__actions"></div>
    <div class="mdl-dialog__loading"><div class="mdl-spinner mdl-spinner--single-color mdl-js-spinner is-active"></div></div>
</dialog>

<script>
function delete_quality(id) {
           
           system.confirm('Delete diagnosis', 'Are you sure you want to delete this diagnosis?',
               function() {
               //alert(id);
               location.href = '/diagnosis/delete/'+id;
               // location.reload();
           }
           )
       }
function pdf(id) {
          
           system.confirm('WO number:'+id, 'The PDF has been generated',
               function() {
               //alert(id);
               window.open('/assets/pdf/diagnosis.pdf', "_blank");
           }
           )
       }

</script>

<?php /**PATH D:\16thsept\16thsept\resources\views/Diagnosis/Tabs/diagnosis.blade.php ENDPATH**/ ?>