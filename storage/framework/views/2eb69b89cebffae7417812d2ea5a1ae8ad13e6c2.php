<?php 
?>


<?php $__env->startSection('content'); ?>
<header class="mdl-layout__header">
    <div class="mdl-layout__header-row primary">
        <a id="backbutton" href="<?php echo e(url('/')); ?>" class="mdl-navigation__link spf-link" style="display: inline;"><i class="material-icons">arrow_back</i></a> <span class="mdl-layout-title"><img class="hidemobile" src="<?php echo e(URL::asset('assets/img/logo.png')); ?>">
            <span id="page-title">Dashboard  diagnosis</span>
        </span>
        <div class="mdl-layout-spacer"></div>
       <?php echo $__env->make('inc.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <?php echo $__env->make('Diagnosis.OverviewTabs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</header>


<main class="mdl-layout__content allow-scroll">
    <div class="page-content">
        <div class="mdl-viewpager">
            <style>
                div.status {
                    width: 100%;
                    height: 100%;
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
                    background-color: #2ecc71;
                }

                div.status.status_normal {
                    background-color: #e67e22;
                }

                div.status.status_critical {
                    background-color: #e74c3c;
                }

                td[aria-describedby="diagnosis_overview_status"],
                td[aria-describedby="diagnosis_overview_history_status"],
                td[aria-describedby="diagnosis_overview_quicksearch_status"] {
                    padding: 0 !important;
                }
            </style>

            <?php echo $__env->make('Diagnosis.Tabs.diagnosis', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo $__env->make('Diagnosis.Tabs.diagnosis_history', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo $__env->make('Diagnosis.Tabs.search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
            <?php echo $__env->make('Diagnosis.Tabs.reports', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div id="footer" class="modal-window">
			    <div class="modal-content">
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label fullwidth form-group"><label class="mdl-textfield__label" for="">The PDF has been generated</label></div>
					<br><br><a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect cancel">Cancel</a>
					<a class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored" href="<?php echo e(URL::asset('/assets/pdf/diagnosis.pdf')); ?>" target="_blank">View</a>
				</div>
		    </div>
            

            
        </div>
    </div>
</main>
   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index_layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\latest\16thsept1\resources\views/Diagnosis/OverviewPanels.blade.php ENDPATH**/ ?>