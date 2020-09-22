<?php $__env->startSection('content'); ?>
    <header class="mdl-layout__header">
        <div class="mdl-layout__header-row primary">
            <a id="backbutton" href="<?php echo e(url('/')); ?>" class="mdl-navigation__link spf-link" style="display: inline;"><i
                    class="material-icons">arrow_back</i></a>
            <span class="mdl-layout-title"><img class="hidemobile" src="<?php echo e(URL::asset('assets/img/logo.png')); ?>">
                <span id="page-title">Switch User</span>
            </span>
            <div class="mdl-layout-spacer"></div>
            <?php echo $__env->make('inc.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </header>

    <main class="mdl-layout__content allow-scroll">
        <div class="page-content">
            <div class="mdl-viewpager">

                <div class="switch-user">
                    <div class="switch-cell">
                        <div class="flex-container">
                            <?php if(isset($diagnosis) && $diagnosis === 'diagnosis'): ?>
                                <a href="<?php echo e(url('/diagnosis/add')); ?>" style="color: white">
                                <?php else: ?>
                                    <a href="<?php echo e(url('/')); ?>" style="color: white">
                            <?php endif; ?>

                            <div class="user-container is-self" data-id="7664">
                                <div class="user-icon" style="background-color:#27AE60;">
                                    <div>C</div>
                                </div>
                                <div class="user-name">Colleges Modernization</div>
                                <div class="authorisation">Foreman</div>
                            </div></a>

                            <?php if(isset($diagnosis) && $diagnosis == 'diagnosis'): ?>
                                <a href="<?php echo e(url('/diagnosis/add')); ?>" style="color: white">
                            <?php else: ?>
                                <a href="<?php echo e(url('/')); ?>" style="color: white">
                            <?php endif; ?>
                            <div class="user-container " data-id="4121">
                                <div class="user-icon" style="background-color:#16A085;">
                                    <div>E</div>
                                </div>
                                <div class="user-name">ECOM Serviceadviseur</div>
                                <div class="authorisation">Serviceadviseur</div>
                            </div></a>

                            <?php if(isset($diagnosis) && $diagnosis === 'diagnosis'): ?>
                                <a href="<?php echo e(url('/diagnosis/add')); ?>" style="color: white">
                                <?php else: ?>
                                    <a href="<?php echo e(url('/')); ?>" style="color: white">
                            <?php endif; ?>
                            <div class="user-container " data-id="4316">
                                <div class="user-icon" style="background-color:#27AE60;">
                                    <div>S</div>
                                </div>
                                <div class="user-name">ECOM Monteur</div>
                                <div class="authorisation">Mechanic</div>
                            </div></a>

                            <?php if(isset($diagnosis) && $diagnosis === 'diagnosis'): ?>
                                <a href="<?php echo e(url('/diagnosis/add')); ?>" style="color: white">
                                <?php else: ?>
                                    <a href="<?php echo e(url('/')); ?>" style="color: white">
                            <?php endif; ?>
                            <div class="user-container " data-id="2088">
                                <div class="user-icon" style="background-color:#2980B9;">
                                    <div>E</div>
                                </div>
                                <div class="user-name">ECOM Werkplaatschef</div>
                                <div class="authorisation">Foreman</div>
                            </div></a>

                            <?php if(isset($diagnosis) && $diagnosis === 'diagnosis'): ?>
                                <a href="<?php echo e(url('/diagnosis/add')); ?>" style="color: white">
                                <?php else: ?>
                                    <a href="<?php echo e(url('/')); ?>" style="color: white">
                            <?php endif; ?>
                            <div class="user-container " data-id="4136">
                                <div class="user-icon" style="background-color:#2980B9;">
                                    <div>M</div>
                                </div>
                                <div class="user-name">External 2</div>
                                <div class="authorisation">Mechanic</div>
                            </div></a>

                            <?php if(isset($diagnosis) && $diagnosis === 'diagnosis'): ?>
                                <a href="<?php echo e(url('/diagnosis/add')); ?>" style="color: white">
                                <?php else: ?>
                                    <a href="<?php echo e(url('/')); ?>" style="color: white">
                            <?php endif; ?>
                            <div class="user-container " data-id="1720">
                                <div class="user-icon" style="background-color:#2980B9;">
                                    <div>K</div>
                                </div>
                                <div class="user-name">External 3</div>
                                <div class="authorisation">Mechanic</div>
                            </div></a>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index_layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\16thsept\resources\views/changeLoginForm/overview.blade.php ENDPATH**/ ?>