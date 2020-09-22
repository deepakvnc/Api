<nav class="mdl-navigation top-menu">
    <a href="<?php echo e(url('/login/changeform')); ?>" class=" mdl-navigation__link spf-link" id="menu-15f19d877734bf" data-menuid="switch"><i class="material-icons">compare_arrows</i></a>
    <div class="inline-wrapper">
        <span class=" mdl-navigation__link" id="menu-25f19d87773501" data-menuid="profile">
            <i class="material-icons">person</i> <?php echo e(Auth::user()->first_name); ?> <?php echo e(Auth::user()->surname_prefix); ?> <?php echo e(Auth::user()->surname); ?></span>

        <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="menu-25f19d87773501">
            <li class="mdl-menu__item anchor  " data-menuid="profile">
                <a href="<?php echo e(url('/user')); ?>" class="spf-link"><i class="material-icons">person</i> My profile</a>
            </li>
            <li class="mdl-menu__item anchor  " data-menuid="profile">
                <a href="<?php echo e(url('/dealer/me/')); ?>" class="spf-link"><i class="material-icons">business</i> My company</a>
            </li>
            <li class="mdl-menu__item anchor  " data-menuid="profile">
                <a href="<?php echo e(url('/temporary_user_role/overview')); ?>" class="spf-link"><i class="material-icons">account_balance_wallet</i> Temporary user roles</a>
            </li>
            <li class="mdl-menu__item anchor  " data-menuid="profile">
                <a href="<?php echo e(url('/question/overview')); ?>" class="spf-link"><i class="material-icons">help</i> Questions</a>
            </li> 
            <li class="mdl-menu__item anchor  " data-menuid="profile">
                <a href="<?php echo e(url('/documents/view', 'system_documentation')); ?>" class="spf-link"><i class="material-icons">info</i> Documentation</a>
            </li>
            <li class="mdl-menu__item anchor  " data-menuid="profile">
                <a href="<?php echo e(url('/documents/view', 'updates')); ?>" class="spf-link"><i class="material-icons">info</i> Updates</a>
            </li> 
            <li class="mdl-menu__item anchor  " data-menuid="profile">
                <a href="<?php echo e(url('/reports/bug')); ?>" class="spf-link"><i class="material-icons">bug_report</i> Report bug</a>
            </li>
            <li class="mdl-menu__item anchor  " data-menuid="profile">
                <a href="#" onclick="location.reload(true); return false;" class="spf-link"><i class="material-icons">refresh</i> Refresh</a>
            </li>
            <li class="mdl-menu__item anchor  " data-menuid="profile">
                <a href="<?php echo e(url('/login/logout')); ?>"><i class="material-icons">lock_open</i> Logout</a>
            </li>
        </ul>
    </div>
</nav><?php /**PATH C:\xampp\htdocs\mbdiag\CodeForIntegration\Sasikala\latest_code\Latest_code\resources\views/inc/nav.blade.php ENDPATH**/ ?>