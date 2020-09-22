<!doctype html>
<html lang="en">

<head>
    <?php echo $__env->make('inc.HeadSection', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    

    
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    

    <link href="<?php echo e(URL::asset('assets/css/datatables.css')); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/css/style.css.map')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/css/datetimepicker.css')); ?>">
    <link href="<?php echo e(URL::asset('assets/css/datatables.css')); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/css/modal.css')); ?>">
    <script src="<?php echo e(URL::asset('assets/javascript/diagnosis-custom.js')); ?>"></script>
    
</head>

<body version="1.2.14" class="theme-dark">

    <div id="extra-drawer-container"></div>

    <div class="sliding-page-container">
        <div class="sliding-page">

            <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header ">

                <?php echo $__env->yieldContent('content'); ?>
                <dialog id="modal__confirm" class="mdl-dialog">
                    <h4 class="mdl-dialog__title">{title}</h4>
                    <div class="mdl-dialog__content"></div>
                    <div class="mdl-dialog__actions"></div>
                    <div class="mdl-dialog__loading">
                        <div class="mdl-spinner mdl-spinner--single-color mdl-js-spinner is-active"></div>
                    </div>
                </dialog>

                <dialog id="modal__dialog" class="mdl-dialog">
                    <h4 class="mdl-dialog__title">{title}</h4>
                    <div class="mdl-dialog__content"></div>
                    <div class="mdl-dialog__actions"></div>
                    <div class="mdl-dialog__loading">
                        <div class="mdl-spinner mdl-spinner--single-color mdl-js-spinner is-active"></div>
                    </div>
                </dialog>
               
            </div>
        </div>
        <div id="map-hangar">
		<div id="map-element"></div>
	</div>
    </div>
    <script type="text/javascript" src="<?php echo e(URL::asset('assets/javascript/site.js')); ?>" name="site"></script>
    <script>
        /* $(document).ready(function() {
      $('.datatable').DataTable({
          responsive: true
      });
  }); */
        $('.datatable tfoot th').each(function() {
            var title = $(this).text();
            $(this).html('<input type="text" class="datatable-search" />');
        });

        // DataTable
        var otable = $('.datatable').DataTable({
            "responsive": true,
            "pagingType": "full_numbers",
            "pageLength"  : 20,
            language: {
                paginate: {
                    next: '<i class="material-icons">chevron_right</i>', // or '→'
                    previous: '<i class="material-icons">chevron_left</i>', // or '←' 
                    first: '<i class="material-icons">first_page</i>', // or '←' 
                    last: '<i class="material-icons">last_page</i>' // or '←' 
                }
            }
        });

        // Apply the search
        otable.columns().every(function() {

            var that = this;
            $('input', this.footer()).on('keyup change', function() {
                if (that.search() !== this.value) {
                    that
                        .search(this.value)
                        .draw();
                }
            });
        });
    </script>

    <script>
        /* $(document).ready(function() {
      $('.datatable').DataTable({
          responsive: true
      });
  }); */
        $('.datatable2 tfoot th').each(function() {
            var title = $(this).text();
            $(this).html('<input type="text" class="datatable-search" />');
        });

        // DataTable
        var otable = $('.datatable2').DataTable({
            responsive: true,
            "pagingType": "full_numbers",
            language: {
                paginate: {
                    next: '<i class="material-icons">chevron_right</i>', // or '→'
                    previous: '<i class="material-icons">chevron_left</i>', // or '←' 
                    first: '<i class="material-icons">first_page</i>', // or '←' 
                    last: '<i class="material-icons">last_page</i>' // or '←' 
                }
            }
        });

        // Apply the search
        otable.columns().every(function() {

            var that = this;
            $('input', this.footer()).on('keyup change', function() {
                if (that.search() !== this.value) {
                    that
                        .search(this.value)
                        .draw();
                }
            });
        });
    </script>


</body>

</html><?php /**PATH C:\xampp\htdocs\latest\16thsept1\resources\views/layouts/index_layouts.blade.php ENDPATH**/ ?>