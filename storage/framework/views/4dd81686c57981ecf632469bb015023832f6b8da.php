<?php $__env->startSection('content'); ?>
<header class="mdl-layout__header">
    <div class="mdl-layout__header-row primary">
        <a id="backbutton" href="<?php echo e(url('/')); ?>" class="mdl-navigation__link spf-link" style="display: inline;"><i class="material-icons">arrow_back</i></a> 
		<span class="mdl-layout-title"><img class="hidemobile" src="<?php echo e(URL::asset('assets/img/logo.png')); ?>">
            <span id="page-title">Dashboard quality control</span>
        </span>
        <div class="mdl-layout-spacer"></div>
        <?php echo $__env->make('inc.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div class="mdl-layout__tab-bar mdl-js-ripple-effect">
        <a href="?tab=quality_control" class="mdl-layout__tab <?php if(isset($_GET['tab']) && $_GET['tab'] === 'quality_control') echo 'is-active'; elseif(!isset($_GET['tab'])) echo 'is-active'?>">On hand</a>
        <a href="?tab=quality_control_history" class="mdl-layout__tab <?php if(isset($_GET['tab']) && $_GET['tab'] === 'quality_control_history') echo 'is-active'?>">Completed</a>
        <a href="?tab=statistics" class="mdl-layout__tab <?php if(isset($_GET['tab']) && $_GET['tab'] === 'statistics') echo 'is-active'?>">Reporting</a>
    </div>
</header>

<main class="mdl-layout__content allow-scroll">
    <div class="page-content">
        <div class="mdl-viewpager">
            <style>
                div.status {
                    width: 100%;
                    height: 100%;
                    background-color: rgb(75, 75, 75);
                }

                div.status i {
                    position: absolute;
                    left: 50%;
                    top: 50%;
                    -ms-transform: translateX(-50%) translateY(-50%);
                    transform: translateX(-50%) translateY(-50%);
                    color: #ffffff
                }

                div.status.status_complete {
                    /*background-color: #27ae60;*/
                    background-color: #2ecc71;
                }

                div.status.status_normal {
                    background-color: #e67e22;
                }

                div.status.status_critical {
                    background-color: #e74c3c;
                }

                td[aria-describedby="quality_control_overview_status"],
                td[aria-describedby="quality_control_overview_history_status"] {
                    padding: 0 !important;
                }
            </style>
            <?php echo $__env->make('inc.QualityControl.quality_control', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('inc.QualityControl.history', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('inc.QualityControl.statistics', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



        </div>
    </div>
</main>

<script>
  
jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index_layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\6thsept\Mbdiag_demo_v4_bal\resources\views/QualityControl/OverviewPanels.blade.php ENDPATH**/ ?>