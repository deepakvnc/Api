<?php
/**
 * This file is part of mdiag.backend.
 * (c) 2017 ECOM Development B.V.
 *
 * @author erwin
 */

//use Ecom\Core;
?>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<meta name="format-detection" content="telephone=no">

<link rel="apple-touch-icon" href="<?php echo e(URL::asset('assets/Images/favicon/apple-touch-icon.png')); ?>">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(URL::asset('assets/Images/favicon/apple-touch-icon.png')); ?>">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(URL::asset('assets/Images/favicon/favicon-32x32.png')); ?>">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(URL::asset('assets/Images/favicon/favicon-16x16.png')); ?>">

<link rel="mask-icon" href="<?php echo e(URL::asset('assets/Images/favicon/safari-pinned-tab.svg" color="#5bbad5')); ?>">
<link rel="apple-touch-startup-image" href="<?php echo e(URL::asset('launch.png')); ?>">
<meta name="theme-color" content="#000000">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="apple-mobile-web-app-title" content="MB-Diag">

<link href="<?php echo e(URL::asset('assets/Images/apple-touch-startup-image.png')); ?>" rel="apple-touch-startup-image">
<!-- iPad retina portrait startup image -->
<link href="<?php echo e(URL::asset('assets/Images/apple-touch-startup-image-1536x2008.png')); ?>" media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)" rel="apple-touch-startup-image">
<!-- iPad retina landscape startup image -->
<link href="<?php echo e(URL::asset('assets/Images/apple-touch-startup-image-1496x2048.png')); ?>" media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2) and (orientation: landscape)" rel="apple-touch-startup-image">
<!-- iPad non-retina portrait startup image -->
<link href="<?php echo e(URL::asset('assets/Images/apple-touch-startup-image-768x1004.png')); ?>" media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 1) and (orientation: portrait)" rel="apple-touch-startup-image">
<!-- iPad non-retina landscape startup image -->
<link href="<?php echo e(URL::asset('assets/Images/apple-touch-startup-image-748x1024.png')); ?>" media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 1) and (orientation: landscape)" rel="apple-touch-startup-image">
<!-- iPhone 6 Plus portrait startup image -->
<link href="<?php echo e(URL::asset('assets/Images/apple-touch-startup-image-1242x2148.png')); ?>" media="(device-width: 414px) and (device-height: 736px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait)" rel="apple-touch-startup-image">
<!-- iPhone 6 Plus landscape startup image -->
<link href="<?php echo e(URL::asset('assets/Images/apple-touch-startup-image-1182x2208.png')); ?>" media="(device-width: 414px) and (device-height: 736px) and (-webkit-device-pixel-ratio: 3) and (orientation: landscape)" rel="apple-touch-startup-image">
<!-- iPhone 6 startup image -->
<link href="<?php echo e(URL::asset('assets/Images/apple-touch-startup-image-750x1294.png')); ?>" media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
<!-- iPhone 5 startup image -->
<link href="<?php echo e(URL::asset('assets/Images/apple-touch-startup-image-640x1096.png')); ?>" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
<!-- iPhone < 5 retina startup image -->
<link href="<?php echo e(URL::asset('assets/Images/apple-touch-startup-image-640x920.png')); ?>" media="(device-width: 320px) and (device-height: 480px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
<!-- iPhone < 5 non-retina startup image -->
<link href="<?php echo e(URL::asset('assets/Images/apple-touch-startup-image-320x460.png')); ?>" media="(device-width: 320px) and (device-height: 480px) and (-webkit-device-pixel-ratio: 1)" rel="apple-touch-startup-image">

<title>MB-Diag</title>

<!--[if IE]>
	<script src="//cdnjs.cloudflare.com/ajax/libs/es5-shim/4.2.0/es5-shim.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/classlist/2014.01.31/classList.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/selectivizr/1.0.2/selectivizr-min.js"></script>
	<![endif]-->
    <script type="text/javascript" src="<?php echo e(URL::asset('assets/javascript/jquery-3.2.1.min.js')); ?>" name="jquery"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('assets/javascript/jquery-ui.min.js')); ?>" name="jquery-ui"></script>
    
    <script type="text/javascript" src="<?php echo e(URL::asset('assets/javascript/jquery-fileupload.js')); ?>" name="fileupload"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('assets/javascript/jqery-fileupload-process.js')); ?>" name="fileupload-process"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('assets/javascript/jquery-fileupload-ui.js')); ?>" name="fileupload-ui"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('assets/javascript/core.js')); ?>" name="ecom-core"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('assets/javascript/material-no-ripple.js')); ?>" name="mdl"></script>
    
    <script type="text/javascript" src="<?php echo e(URL::asset('assets/javascript/spf-2.3.2.js')); ?>" name="spf"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('assets/javascript/url-polyfill.js')); ?>" name="url-polyfill"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('assets/javascript/mdl-dialog-polyfill.js')); ?>" name="mdl-dialog"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('assets/javascript/draggabilly.js')); ?>" name="draggabilly"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('assets/javascript/moment.min.js')); ?>" name="moment"></script>
     <script type="text/javascript" src="<?php echo e(URL::asset('assets/javascript/mdl-datetime-picker.js')); ?>" name="mdl-datetime-picker"></script> 
    <script type="text/javascript" src="<?php echo e(URL::asset('assets/javascript/mdl-selectfield.js')); ?>" name="mdl-selectfield"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('assets/javascript/mdl-multistate-checkbox.js')); ?>" name="mdl-multistate-checkbox"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('assets/javascript/mdl-speed-dial.js')); ?>" name="mdl-speed-dial"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('assets/javascript/tweenmax.min.js')); ?>" name="tweenmax"></script>
    <!-- No Visible Effect on Load -->
    
    
   
    
    <script type="text/javascript" src="<?php echo e(URL::asset('assets/javascript/query-string.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('assets/javascript/functions.js')); ?>" name="functions"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('assets/javascript/photoswipe.min.js')); ?>" name="photoswipe"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('assets/javascript/photoswipe-ui-default.min.js')); ?>" name="photoswipe-ui"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('assets/javascript/chart.min.js')); ?>" name="chartjs"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('assets/javascript/ie_polyfill.js')); ?>" name="ie_polyfill"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('assets/javascript/jquery.ui.touch-punch.min.js?v=1.2.14')); ?>" name="touch-punch"></script>
    
   <!-- Datatable -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('assets/css/jquery-fileupload.css')); ?>" />
    <style>
        html,
        body {
            position: fixed;
            overflow: hidden;
        }
    </style>
    
    
    
        <?php /**PATH C:\xampp\htdocs\latest\16thsept1\resources\views/inc/HeadSection.blade.php ENDPATH**/ ?>