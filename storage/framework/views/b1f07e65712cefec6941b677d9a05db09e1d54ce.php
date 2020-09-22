<div class="mdl-layout__tab-panel" id="follow_up_panel">
    <div class="box box-border">
        <div class="box-header" data-original-title>
            <div class="box-icon">
            </div>
        </div>
        <div class="box-content">
        </div>
    </div>

<script>
    function delete_steps() {
        //alert("123");
        system.confirm("Delete Step", "Are you sure ?",
            function() { 
            alert("you have Click Ok to Delete");
        }
        )
    }
</script>
    
    <style>
        #gbox_follow_up_overview>* {
            user-select: none;
        }
        .dataTables_paginate, 
        .dataTables_info {
            display: none;
        }
    </style>
    <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored next-tab" data-tab-next="analysis">Next<i class="material-icons">navigate_next</i></button>

    <div class="fixed-action-btn-background"></div>
    <div class="fixed-action-btn-container fullwidth">
        <div class="scrollwrapper">
            <a class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored fixed-action-btn" onclick="system.openInDialog('<?php echo e(url('/dealer/about')); ?>')">
                <i class="material-icons">directions_car</i>
                <label>Test drive</label>
            </a>
            <a class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored fixed-action-btn" href="#modal-shorttest">
                <i class="material-icons">assignment_turned_in</i>
                <label>Short test</label>
            </a>
            <a class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored fixed-action-btn" href="#modal-uir">
                <i class="material-icons">assessment</i>
                <label>U - I - R</label>
            </a>
            <a class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored fixed-action-btn" href="#modal-visualcheck">
                <i class="material-icons">remove_red_eye</i>
                <label>Visual check</label>
            </a>
            <a class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored fixed-action-btn" href="#modal-text">
                <i class="material-icons">call_to_action</i>
                <label>Text</label>
            </a>
            <a class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored fixed-action-btn" href="#modal-wis">
                <i class="material-icons">featured_play_list</i>
                <label>WIS</label>
            </a>
            <a class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored fixed-action-btn" href="#modal-extratips">
                <i class="material-icons">playlist_add</i>
                <label>Extra TIPS</label>
            </a>
            <a class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored fixed-action-btn" href="#modal-tipscase">
                <i class="material-icons">list</i>
                <label>TIPS CASE</label>
            </a></div>
    </div>
</div><?php /**PATH C:\xampp2\htdocs\16thsept\resources\views/Diagnosis/EditTabs/Follow_up.blade.php ENDPATH**/ ?>