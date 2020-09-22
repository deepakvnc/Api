<div class="mdl-layout__tab-panel <?php if(isset($_GET['tab']) && $_GET['tab'] === 'location' ) echo 'is-active'; elseif(!isset($_GET['tab'])) echo 'is-active'?>" id="location_panel">
    <div class="box box-border">
        <div class="box-header" data-original-title>
            <h2></h2>
            <div class="box-icon">
            </div>
        </div>
        <div class="box-content">
            <form class="ajax-validate" action="<?php echo e(url('/dealer/save')); ?>" id="dealer_location_edit_1" method="post">
                <?php echo e(csrf_field()); ?>

                <!-- Hidden -->
                <input type="hidden" name="dealerlocation_id" value="1">
                <input type="hidden" name="dealer_id" value="1">

                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">
                    <input type="text" name="name" value="<?php echo e($dealer->name); ?>" id="name" class="mdl-textfield__input" />
                    <label class="mdl-textfield__label" for="name">Name</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">
                    <input type="text" name="dealercode" value="<?php echo e($dealer->dealercode); ?>" id="dealercode" class="mdl-textfield__input" />
                    <label class="mdl-textfield__label" for="dealercode">Dealer code</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">
                    <input pattern="[A-Z,a-z,0-9,@\.\-_]*" type="email" name="email" value="<?php echo e($dealer->email); ?>" id="email" class="mdl-textfield__input" />
                    <label class="mdl-textfield__label" for="email">Email</label>
                    <span class="mdl-textfield__error">Please enter a valid email</span>
                </div>
                <fieldset>
                    <legend>The following settings can be overwritten at group level</legend>
                    <div class="mdl-grid">
                        <div class="mdl-cell mdl-cell--12-col">
                            <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="5f1a69b3e16f4">
                                <input id="errorcode_required" checked="checked" name="errorcode_required" class="mdl-checkbox__input" value="1" type="checkbox" readonly="readonly">
                                <span class="mdl-checkbox__label">Error code required</span>
                            </label>
                        </div>
                        <div class="mdl-cell mdl-cell--12-col">
                            <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="5f1a69b3e1746">
                                <input id="intake_exit_pdf_required" checked="checked" name="intake_exit_pdf_required" class="mdl-checkbox__input" value="1" type="checkbox" readonly="readonly">
                                <span class="mdl-checkbox__label">Intake/Exit-protocol pdf required</span>
                            </label>
                        </div>
                        <div class="mdl-cell mdl-cell--12-col">
                            <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="5f1a69b3e1790">
                                <input id="damage_code_required" name="damage_code_required" class="mdl-checkbox__input" value="1" type="checkbox" readonly="readonly" >
                                <span class="mdl-checkbox__label">Damage code required</span></label>
                        </div>
                        <div class="mdl-cell mdl-cell--12-col">
                            <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="5f1a69b3e17dd">
                                <input id="mileage_media_required" name="mileage_media_required" class="mdl-checkbox__input" value="1" type="checkbox" readonly="readonly" >
                                <span class="mdl-checkbox__label">Mileage picture required</span></label>
                        </div>
                        <div class="mdl-cell mdl-cell--12-col">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">
                                <input pattern="-?[0-9]*(\.[0-9]+)?" type="number" name="quality_control_target" value="<?php echo e($dealer->quality_control_target); ?>" id="5f1a69b3e1826" class="mdl-textfield__input"readonly />
                                <label class="mdl-textfield__label" for="5f1a69b3e1826">Quality Control target</label>
                            </div>
                        </div>
                        <div class="mdl-cell mdl-cell--12-col">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group" readonly="readonly">
                                <input readonly="readonly" pattern="-?[0-9]*(\.[0-9]+)?" type="number" name="5f1a69b3e1871" value="" id="5f1a69b3e1871" class="mdl-textfield__input" />
                                <label class="mdl-textfield__label" for="5f1a69b3e1871">Diagnosis timer</label>
                                <span class="mdl-textfield__error">Please enter a numeric value</span>
                                <span class="helper">Notify manager (of the location) when a diagnosis exceeds this time (in minutes)</span>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="spacer spacer-height-20"></div><button onclick="history.back(); return false;" class="mdl-button mdl-js-button mdl-js-ripple-effect">Cancel</button>
                <button type="submit" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored">Save</button>
            </form>
        </div>
    </div>
</div><?php /**PATH C:\xampp2\htdocs\16thsept\resources\views/inc/dealer_panel.blade.php ENDPATH**/ ?>