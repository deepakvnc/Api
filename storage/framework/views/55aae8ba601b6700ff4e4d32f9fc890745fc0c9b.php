
            <div class="mdl-layout__tab-panel" id="diagnosis_quicksearch_panel">

                <div class="box">
                    <div class="box-header" data-original-title>
                        <div class="box-icon">
                        </div>
                    </div>
                    <div class="box-content">
                         <div style="padding: 20px;">
                            <div style="width: calc(100% - 60px);display: inline-block;position: relative;">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label fullwidth form-group">
                                    <input style="display: inline-block" type="text" name="quicksearch" value="" id="quicksearch" class="mdl-textfield__input">
                                    <label class="mdl-textfield__label" for="quicksearch">Search</label>
                                </div><i id="reset_search" class="material-icons" >close</i>
                            </div><div style="display: inline-block; padding-left:4px;">
                                <button id="start_quicksearch" onclick="quicksearch();" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                                    <i class="material-icons">search</i>
                                </button></div>
                        </div>
                        <table id="diagnosis_overview_quicksearch">
                            <tr>
                                <td></td>
                            </tr>
                        </table>
                        <div id="diagnosis_overview_quicksearch_pager"></div>
                        <div class="spacer spacer-height-60"></div>
                    </div>
                </div>
            </div>
<?php /**PATH C:\xampp\htdocs\VNC\test\Mbdiag_demo\Mbdiag_demo_v4_bal\resources\views/Diagnosis/Tabs/search.blade.php ENDPATH**/ ?>