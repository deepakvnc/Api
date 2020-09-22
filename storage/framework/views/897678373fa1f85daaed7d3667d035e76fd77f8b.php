<?php
/**
 * This file is part of mdiag.backend.
 * (c) 2017 ECOM Development B.V.
 *
 * @author milan <milan@ecom.nl>
 */

// use Application\Helpers\Material;
// use Ecom\Libraries\Lang;

?>

<?php $__env->startSection('content'); ?>

<header class="mdl-layout__header">
    <div class="mdl-layout__header-row primary">
		
		<span class="mdl-layout-title"><img class="hidemobile" src="<?php echo e(URL::asset('assets/img/logo.png')); ?>">
            <span id="page-title">MB-Diag</span>
        </span>
        <div class="mdl-layout-spacer"></div>
		<?php echo $__env->make('inc.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</div>
</header>
<main class="mdl-layout__content allow-scroll">
    <div class="page-content">
        <div class="mdl-viewpager">
      <?php echo $__env->make('inc.IndexStyles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="mdl-grid mdl-height--100 center-items">
                <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-phone mdl-height--100">
                    <a class="index-container spf-link" href="<?php echo e(url('/diagnosis')); ?>">
                        <h1>Diagnosis App</h1>
                        <p>The purpose of the Diagnosis app is supporting the diagnosis process and to record these digitally so that a simple and transparent overview can be created with regard to the activities.</p>
                        <div class="spacer"></div>
                    </a>
                </div>
                <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-phone mdl-height--100">
                    <a class="index-container spf-link" href="<?php echo e(url('/quality_control')); ?>">
                        <h1>Quality control App</h1>
                        <p>The purpose of Quality control is to check and register the quality of executed activites in order to collect valuable management information to be able to adjust if desired.</p>
                        <div class="spacer"></div>
                    </a>
                </div>
            </div>
            <div class="spacer spacer-height-80"></div>

            <script type="application/javascript">
            </script>
        </div>

        <div class="loading-overlay">
            <div class="loading-positioner">
                <div class="mdl-spinner mdl-spinner--single-color mdl-js-spinner is-active"></div>
            </div>
        </div>

    </div>

    <script>
        $.get('/statistics/getDiagnosisData', function (data) {
            console.log(data);
        });
        </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index_layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\VNC\test\Mbdiag_demo\Mbdiag_demo_v4_bal\resources\views/Index/View.blade.php ENDPATH**/ ?>