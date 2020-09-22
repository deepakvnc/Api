<?php $__env->startSection('stylesheet'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<iframe src="" id="loginformiframe" name="loginformiframe" style="display:none"></iframe>
<form class="loginform" id="loginform" method="POST" action="/login/processlogin">
  <?php echo csrf_field(); ?>
  <div class="fullwidth login-input-row">
    <i class="material-icons">domain</i>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label fullwidth">
      <input class="mdl-textfield__input" type="text" id="dealercode" name="dealercode"<?= isset($_COOKIE['dealercode']) ? ' value="' . $_COOKIE['dealercode'] . '"' : '' ?>>
      <label class="mdl-textfield__label" for="dealercode">Dealercode</label>
    </div>
  </div>

  <div class="fullwidth login-input-row">
    <i class="material-icons">person</i>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label fullwidth">
      <input class="mdl-textfield__input" type="text" id="login" name="login" />
      <label class="mdl-textfield__label" for="login">D5account</label>
    </div>
  </div>

  <div class="fullwidth login-input-row">
    <i class="material-icons">vpn_key</i>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label fullwidth">
      <input class="mdl-textfield__input" type="password" id="pass" name="pass" autocomplete="off">
      <label class="mdl-textfield__label" for="pass">Password</label>
    </div>
  </div>

  <div class="spacer spacer-height-20"></div>

  <div class="fullwidth login-input-row">
    <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="rememberme">
      <input type="checkbox" id="rememberme" name="rememberme" value="1" class="mdl-checkbox__input">
      <span class="mdl-checkbox__label">Keep me signed in</span>
    </label>
  </div>

  <div class="spacer spacer-height-20"></div>

  <input type="submit" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--colored fullwidth" value="Login" />


</form>

<div id="error-toast" class="mdl-js-snackbar mdl-snackbar">
	<div class="mdl-snackbar__text" id="errordiv"></div>
	<button class="mdl-snackbar__action" type="button"></button>
</div>

<div class="loading-overlay">
	<div class="mdl-spinner mdl-spinner--single-color mdl-js-spinner is-active"></div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>   
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.login_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\13thsept\resources\views/login/login.blade.php ENDPATH**/ ?>