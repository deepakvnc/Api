<?php $__env->startSection('content'); ?>
    
<header class="mdl-layout__header">
    <div class="mdl-layout__header-row primary">
	<a id="backbutton" href="<?php echo e(url('/')); ?>" class="mdl-navigation__link spf-link" style="display: inline;"><i class="material-icons">arrow_back</i></a>
		<span class="mdl-layout-title"><img class="hidemobile" src="<?php echo e(URL::asset('assets/img/logo.png')); ?>">
		      <span id="page-title"><?php echo e($dealer->name); ?></span>
        </span>
        <div class="mdl-layout-spacer"></div>
        <?php echo $__env->make('inc.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <?php echo $__env->make('Dealer.Tabs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</header>

<main class="mdl-layout__content allow-scroll">
    <div class="page-content">
        <div class="mdl-viewpager">
            
            <?php echo $__env->make('inc.dealer_panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            
            <?php echo $__env->make('inc.group_panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            
            <?php echo $__env->make('inc.user_panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


        </div>
    </div>

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index_layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\16thsept\resources\views/Dealer/Overview.blade.php ENDPATH**/ ?>