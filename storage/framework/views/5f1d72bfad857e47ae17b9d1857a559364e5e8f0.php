<?php
/**
 * This file is part of the ECOM Framework.
 * (c) 2017 ECOM Development B.V.
 *
 * @author erwin <erwin@ecom.nl>
 */

//use Ecom\Core;
?>
<!doctype html>
<html lang="en">
<head>

    <?php echo $__env->make('inc.HeadSection', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php //include('HeadSection.php');?>
  
  
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <link rel="stylesheet" href="<?php echo e(URL::asset('/assets/Stylesheets/login.css')); ?>">
  
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <script src="<?php echo e(URL::asset('/assets/javascript/login-custom.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(URL::asset('assets/javascript/material.min.js?v=1.2.14')); ?>" name="mdl"></script>

<?php
	// $this->addCoreJS(Core::COREFOLDER . "/javascript/material.min.js", 'mdl');
	// echo $this->getMeta();
	// echo $this->getJs();
	// echo $this->getCss();
  ?>
</head>
<body class="fullheight">


  <div class="mdl-grid mdl-grid--no-spacing login-container">
    <div class="mdl-cell mdl-cell--6-col mdl-cell--hide-phone mdl-cell--hide-tablet left">
    </div>
    <div class="mdl-cell mdl-cell--6-col mdl-cell--12-col-phone mdl-cell--12-col-tablet right" style="overflow: auto">

      <div class="mdl-grid mdl-grid--no-spacing fullheight">
        <div class="mdl-layout-spacer"></div>
        <div class="mdl-cell mdl-cell--8-col login-form-padding">

            <header>
            <?php //echo Core::app()->getConfig('application.name'); ?>
            </header>
            <main>
            <?php //echo $this->getContent('main'); ?>
            <?php echo $__env->yieldContent('content'); ?>
            </main>

        </div>
        <div class="mdl-layout-spacer"></div>
      </div>

    </div>
  </div>

</body>
</html><?php /**PATH C:\xampp\htdocs\mbdiag\CodeForIntegration\Sasikala\15thSept\resources\views/layouts/login_layout.blade.php ENDPATH**/ ?>