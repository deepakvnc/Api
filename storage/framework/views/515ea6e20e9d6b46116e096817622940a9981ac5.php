<div class="mdl-layout__tab-panel" id="diagnosis_quicksearch_panel">

    <div class="box">
        <div class="box-header" data-original-title>
            <div class="box-icon">
            </div>
        </div>
        <div class="box-content">
            <div style="padding: 20px;">
                <div style="width: calc(100% - 80px);display: inline-block;position: relative;">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label fullwidth form-group">
                        <input style="display: inline-block" type="text" name="quicksearch" value="" id="quicksearch"
                            class="mdl-textfield__input">
                        <label class="mdl-textfield__label" for="quicksearch">Search</label>
                    </div><i id="reset_search" class="material-icons">close</i>
                </div>
                <div style="display: inline-block; padding-left:4px;">
                    <button id="start_quicksearch" onclick="quicksearch();"
                        class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                        <i class="material-icons">search</i>
                    </button></div>
            </div>
              
            <div id="diagnosis_overview_quicksearch_pager"></div>
            <div class="spacer spacer-height-60"></div>
        </div>


        <div class="box-content">
            <table id="diagnosis_overview" class="datatable stripe" width="100%">
                <thead>
                    <tr style="text-align:left">
                        <th style="width:25px !important;"><i class="material-icons">filter_list</i></th>
                        <th data-priority="1" style="max-width:100px;">WO/No</th>
                        <th>Customer Complaint</th>
                        <th class="hidemobile">Mechanic</th>
                        <th style="width:20px;">#</th>
                        <th class="hidemobile" style="max-width:100px;">License Plate</th>
                        <th class="hidemobile" style="width:60px;">VIN</th>
                        <th class="hidemobile" style="max-width:100px;">Creation Date</th>
                        <th class="text-center disable_sorting" data-priority="2" style="width: 120px;"></th>
                    </tr>
                </thead>

                <tfoot>
                    <tr>
                        <th style="pointer-events:none; width:20px !important;"></th>
                        <th data-priority="1">WO/No</th>
                        <th>Customer Complaint</th>
                        <th class="hidemobile">Mechanic</th>
                        <th style="width: 20px;">#</th>
                        <th class="hidemobile" style="max-width:100px;">License Plate</th>
                        <th class="hidemobile" style="width:60px;">VIN</th>
                        <th class="hidemobile" style="max-width:100px;">Creation Date</th>
                        <th class="text-center" data-priority="2" style="width: 120px; display:none;"></th>
                    </tr>
                </tfoot>
                <tbody id="searchedData">
                    
                </tbody>
            </table>
            <div id="diagnosis_overview_pager"></div>
            <div class="spacer spacer-height-60"></div>
        </div>

    </div>
</div>



<script>
    function quicksearch(){
        $('#searchedData').empty();
        var searchval = $('#quicksearch').val();
        $.get('/diagnosis/getListDataSearch', {'searchval' : searchval}, function(success){
            var len = success.length;
            var status = "";
            for(var i=0; i<=len; i++){
            
                // alert(success[i].wo_number);
                if(success[i].signature_manager !== null)
                    status = '<td class="table-success"><span class="colorcode">0</span><i class="material-icons">check</i></td>';
                else if(success[i].signature_mechanic !== null)
                    status = '<td class="table-success"><span class="colorcode">1</span></td>';
                else if (success[i].on_hand !== null)
                    status = '<td class="table-warning"><span class="colorcode">2</span></td>';                                        
                else if(success[i].on_hand == null)
                    status = '<td class="table-danger"><span class="colorcode">3</span></td>';
                

                $('#searchedData').append(`
                
                <tr>
                        ` + status + `
                        <td onclick="window.location='/diagnosis/edit/` + success[i].id + `">` + success[i].wo_number +`</td>
                        <td onclick="window.location='/diagnosis/edit/` + success[i].id + `'">` + success[i].complaint_customer + `</td>
                        <td onclick="window.location='/diagnosis/edit/` + success[i].id + `'" class="hidemobile">` + success[i].first_name + `  ` + success[i].surname_prefix + `  ` + success[i].surname + `</td>
                        <td onclick="window.location='/diagnosis/edit/` + success[i].id + `'">0</td>
                        <td onclick="window.location='/diagnosis/edit/` + success[i].id + `'" class="hidemobile">` + success[i].license_plate + `</td>
                        <td onclick="window.location='/diagnosis/edit/` + success[i].id + `'" class="hidemobile">` + success[i].vin + `</td>
                        <td onclick="window.location='/diagnosis/edit/` + success[i].id + `'" class="hidemobile"><?php echo date('d-m-Y', strtotime(` + success[i].creationdate + `))?></td>
                        <td class="text-center" style="float:right;">
                            <i class="material-icons" style="font-size: 24px; color: #00aDEF;cursor:pointer" onclick="pdf('` + success[i].wo_number + `')">picture_as_pdf</i>
                            <i class="material-icons" style="font-size: 24px; color: red;cursor:pointer" onclick="delete_quality('` + success[i].id + `')">delete_forever</i>
                      </td>
                    </tr>

                `)


            }
        });
    }

</script>
<?php /**PATH C:\xampp\htdocs\mbdiag\CodeForIntegration\Deepak\Mdiag_Demo\7thsept\resources\views/Diagnosis/Tabs/search.blade.php ENDPATH**/ ?>