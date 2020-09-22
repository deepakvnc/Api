<?php $__env->startSection('content'); ?>
<header class="mdl-layout__header">
    <div class="mdl-layout__header-row primary">
        <a id="backbutton" href="<?php echo e(url('/question/overview')); ?>" class="mdl-navigation__link spf-link" style="display: inline;"><i class="material-icons">arrow_back</i></a> <span class="mdl-layout-title"><img class="hidemobile" src="<?php echo e(URL::asset('assets/img/logo.png')); ?>">
            <span id="page-title"></span>
        </span>
        <div class="mdl-layout-spacer"></div>
        <?php echo $__env->make('inc.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</header>
<main class="mdl-layout__content allow-scroll">
    <div class="page-content">
        <div class="mdl-viewpager">
            <div class="box box-border">
                <div class="box-header" data-original-title>
                    <h2></h2>
                    <div class="box-icon">
                    </div>
                </div>
                <div class="box-content">
                    <form action="<?php echo e(url('question/save')); ?>" id="question_edit_5f1ade5c55bd0" method="post">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="csrf_token" value=""><input type="hidden" name="question_id" value="0">
                        <div class="mdl-grid">
                            <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet mdl-cell--4-col-phone">
                                <div class="mdl-grid mdl-grid--no-spacing">
                                    <div class="mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--4-col-phone type_container">
                                        <h2>Maintenance / Repair</h2><label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="type_1_enabled"><input class="mdl-checkbox__input type_enabled" id="type_1_enabled" name="type_1_enabled" value="1" type="checkbox"><span class="mdl-checkbox__label">Enabled</span></label>
                                    </div>
                                    <div class="mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--4-col-phone type_container">
                                        <h2>Warranty / Diagnosis</h2><label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="type_2_enabled"><input class="mdl-checkbox__input type_enabled" id="type_2_enabled" name="type_2_enabled" value="1" type="checkbox"><span class="mdl-checkbox__label">Enabled</span></label>
                                    </div>
                                    <div class="mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--4-col-phone type_container">
                                        <h2>Delivery</h2><label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="type_3_enabled"><input class="mdl-checkbox__input type_enabled" id="type_3_enabled" name="type_3_enabled" value="1" type="checkbox"><span class="mdl-checkbox__label">Enabled</span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet mdl-cell--4-col-phone">
                                <input type="hidden" name="level_type" value="dealerlocation">
                                <input type="hidden" name="level_type_id" value="1"></div>
                            <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet mdl-cell--4-col-phone">
                                <h2>English</h2>
                                <div class="en_available lang_available mdl-animation--default">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label fullwidth form-group ">
                                        <input type="text" name="en_question" value="" id="en_question" class="mdl-textfield__input" />
                                        <label class="mdl-textfield__label" for="en_question">Question</label>
                                    </div>
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">
                                        <input type="text" name="en_description" value="" id="en_description" class="mdl-textfield__input" />
                                        <label class="mdl-textfield__label" for="en_description">Description</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet mdl-cell--4-col-phone"></div>
                            <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet mdl-cell--4-col-phone">
                                <h2>Nederlands</h2>
                                <div class="nl_available lang_available mdl-animation--default">
                                    <div class=" mdl-textfield mdl-js-textfield mdl-textfield--floating-label fullwidth form-group">
                                        <input type="text" name="nl_question" value="" id="nl_question" class="mdl-textfield__input" />
                                        <label class="mdl-textfield__label" for="nl_question">Question</label>
                                    </div>
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">
                                        <input type="text" name="nl_description" value="" id="nl_description" class="mdl-textfield__input" />
                                        <label class="mdl-textfield__label" for="nl_description">Description</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet mdl-cell--4-col-phone"></div>
                            <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet mdl-cell--4-col-phone">
                                <h2>Deutsch</h2>
                                <div class="de_available lang_available mdl-animation--default">
                                    <div class=" mdl-textfield mdl-js-textfield mdl-textfield--floating-label fullwidth form-group">
                                        <input type="text" name="de_question" value="" id="de_question" class="mdl-textfield__input" />
                                        <label class="mdl-textfield__label" for="de_question">Question</label>
                                    </div>
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">
                                        <input type="text" name="de_description" value="" id="de_description" class="mdl-textfield__input" />
                                        <label class="mdl-textfield__label" for="de_description">Description</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet mdl-cell--4-col-phone"></div>
                            <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet mdl-cell--4-col-phone">
                                <h2>Français</h2>
                                <div class="fr_available lang_available mdl-animation--default">
                                    <div class=" mdl-textfield mdl-js-textfield mdl-textfield--floating-label fullwidth form-group">
                                        <input type="text" name="fr_question" value="" id="fr_question" class="mdl-textfield__input" />
                                        <label class="mdl-textfield__label" for="fr_question">Question</label>
                                    </div>
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">
                                        <input type="text" name="fr_description" value="" id="fr_description" class="mdl-textfield__input" />
                                        <label class="mdl-textfield__label" for="fr_description">Description</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet mdl-cell--4-col-phone"></div>
                        </div><button onclick="history.back(); return false;" class="mdl-button mdl-js-button mdl-js-ripple-effect">Cancel</button>
                        <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored">Save</button>
                    </form>
                </div>
            </div>
            <style>
                .mdl-checkbox.is-disabled .mdl-checkbox__label {
                    color: #989898;
                }

                .mdl-checkbox.is-disabled .mdl-checkbox__box-outline {
                    border-color: #989898;
                }
            </style>
        </div>
    </div>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index_layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mbdiag\CodeForIntegration\Sasikala\latest_code\Latest_code\resources\views/question/add.blade.php ENDPATH**/ ?>