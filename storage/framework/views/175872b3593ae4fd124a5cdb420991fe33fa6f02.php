<?php
/**
 * This file is part of mdiag.backend.
 * (c) 2017 ECOM Development B.V.
 *
 * @author milan <milan@ecom.nl>
 *
 */

// use Ecom\Libraries\Lang;

/* @var $dealer Application\Models\Dealer */

?>
  <div class="mdl-layout__tab-bar mdl-js-ripple-effect">
    <a href="?tab=location" class="mdl-layout__tab <?php if(isset($_GET['tab']) && $_GET['tab'] === 'location' ) echo 'is-active'; elseif(!isset($_GET['tab'])) echo 'is-active'?>">Location</a>
    <a href="?tab=groups" class="mdl-layout__tab <?php if(isset($_GET['tab']) && $_GET['tab'] === 'groups' ) echo 'is-active'?>">Groups</a>
    <a href="?tab=users" class="mdl-layout__tab <?php if(isset($_GET['tab']) && $_GET['tab'] === 'users' ) echo 'is-active'?>">Users</a>
</div>


<?php /**PATH C:\xampp2\htdocs\16thsept\resources\views/Dealer/Tabs.blade.php ENDPATH**/ ?>