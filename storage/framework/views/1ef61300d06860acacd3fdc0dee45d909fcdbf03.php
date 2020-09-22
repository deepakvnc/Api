<div class="mdl-layout__tab-panel" id="findings_panel">
    <div class="box box-border">
        <div class="box-header" data-original-title>
            <div class="box-icon">
            </div>
        </div>
        <div class="box-content">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--10-col mdl-cell--6-col-tablet mdl-cell--2-col-phone field-row mdl-zebra__desktop mdl-zebra__phone"><i class="material-icons" data-for="emergency_mode">check</i><label>Emergency mode</label></div>
                <div class="mdl-cell mdl-cell--2-col mdl-textfield--align-right mdl-zebra__desktop mdl-zebra__phone"><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="emergency_mode_5f19d8776943e"><input value="1" class="mdl-radio__button saveonchange" large="1" name="emergency_mode" type="radio" id="emergency_mode1"  onchange="saveOnChange(value,'emergency_mode')" <?php if ($diagnosis &&
                                    ($diagnosis[0]->emergency_mode !== null && $diagnosis[0]->emergency_mode == 1)) {
                                echo 'checked';
                                } else {
                                echo '';
                                } ?>>
                                <span class="mdl-radio__label">Yes</span></label><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="emergency_mode_5f19d87769486"><input value="0" class="mdl-radio__button saveonchange" large="1" name="emergency_mode" type="radio"  id="emergency_mode0" onchange="saveOnChange(value,'emergency_mode')" 
                                <?php if ($diagnosis &&
                                    ($diagnosis[0]->emergency_mode !== null && $diagnosis[0]->emergency_mode == 0)) {
                                echo 'checked';
                                } else {
                                echo '';
                                }
                                ?>><span class="mdl-radio__label">No</span></label></div>
                <div class="mdl-cell mdl-cell--10-col mdl-cell--6-col-tablet mdl-cell--2-col-phone field-row"><i class="material-icons" data-for="mil_on">check</i><label>MIL on</label></div>
                <div class="mdl-cell mdl-cell--2-col mdl-textfield--align-right"><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="mil_on_5f19d877694cf"><input value="1" class="mdl-radio__button saveonchange" large="1" name="mil_on" type="radio" checked="checked" id="mil_on" onchange="saveOnChange(value,'mil_on')"><span class="mdl-radio__label">Yes</span></label><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="mil_on_5f19d87769514"><input value="0" class="mdl-radio__button saveonchange" large="1" name="mil_on" type="radio" id="mil_on_5f19d87769514"><span class="mdl-radio__label">No</span></label></div>
                <div class="mdl-cell mdl-cell--12-col field-row mdl-zebra__desktop mdl-zebra__phone">
                    <div class="icon-spacer"></div><label>Function checks</label>
                </div>
                <div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--4-col-phone field-row">
                    <div class="icon-spacer"></div>
                    <div id="function_checks_done" class="growinglist">
                        <div class="growinglist-item">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--no-floating-label form-group"><input class="mdl-textfield__input growinglist-item__input" type="text"><label class="mdl-textfield__label">Function checks</label></div>
                            <div class="growinglist-item__buttons"><i class="material-icons growinglist-item__button growinglist-item__button-check">check</i><i class="material-icons growinglist-item__button growinglist-item__button-remove">close</i></div>
                        </div>
                    </div>
                </div>
                <div class="mdl-cell mdl-cell--12-col" style="margin-top: -40px;">
                    <script type="text/javascript">
                        function addPlaceholder(event, ui) {
                            ui.placeholder.html('<td colspan="7"></td>').css('visibility', 'visible');
                        }

                        function updateOrder() {
                            var grid = $("#follow_up_overview_findings");
                            var order = [];
                            var gridData = grid.jqGrid('getRowData');
                            for (var i = 0; i < gridData.length; i++) {
                                order.push({
                                    id: gridData[i].id,
                                    type: gridData[i].type
                                });
                            }

                            $.post("/json/follow_up/updateOrder", {
                                'csrf_token': this.token,
                                order: order,
                            }).done(function(data) {
                                if (data.hasOwnProperty('token')) {
                                    this.token = data.token;
                                }
                                grid.trigger('reloadGrid');
                            }.bind(this));
                        }

                        $('body').one('TweenAnimationDone', function() {
                            window.requestAnimationFrame(function() {
                                window.requestAnimationFrame(function() {
                                    window.requestAnimationFrame(function() {
                                        // wait for rendering to finish before reloading
                                        $('#follow_up_overview_findings').trigger('reloadGrid');
                                    });
                                });
                            });
                        });
                    </script>
                    <div class="box box-border">
                        <div class="box-header" data-original-title>
                            <div class="box-icon">
                            </div>
                        </div>
                        <div class="box-content">
                            <table id="follow_up_overview_findings" style="width:100%" class="datatable2 stripe">
                              <?php
                              if($diagnosis)
                              {
                              $diagnosis_id  = $diagnosis[0]->id;
                              $testdrive = DB::select('select * from mdiag.mdiag_test_drives where diagnosis_id = ?', [$diagnosis_id]);

                              if($testdrive)
                              {
                                
                                //print_r($testdrive);
                              ?>
                                <tr>
                                    <th class="follow_up_overview_findings_name">Type</th>
                                    <th class="follow_up_overview_findings_description">Description</td>
                                    <th class="follow_up_overview_findings_time">Time (h)</td>
                                    <th>Conclusion</td>
                                    <th>Creation Date</td>
                                </tr>
                                <?php
                                 foreach($testdrive as $item)
                                 {
                                     $diff  = ($item->mileage_start)-($item->mileage_end)
                                     ?>
                                    <tr>
                                    <td >Test Drive</th>
                                    <td> Distance :<?php echo $diff?>km</td>
                                    <td ></td>
                                    <td></td>
                                    <td><?php echo date("m/d/Y", strtotime($item->creationdate))?></td>
                                </tr>
                                <?php
                                 }
                                }
                            }
                                ?>
                            </table>
                        </div>
                    </div>

                </div>
                <div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop mdl-zebra__phone"><i class="material-icons error" data-for="complaint_mechanic">fiber_manual_record</i>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">
                        <textarea class="mdl-textfield__input saveonchange add_media" type="text" name="complaint_mechanic" value="" id="complaint_mechanic" onBlur="setFieldname(this.name)"></textarea>
                        <label class="mdl-textfield__label" for="complaint_mechanic">Complaint mechanic</label>

                        <div class="pictureswipe_wrap tab_media" itemscope itemtype="http://schema.org/ImageGallery">
                            <div class="field-gallery-container complaint_mechanic" data-for="complaint_mechanic">

                            </div>
                        </div>

                    </div>
                </div>
                <div class="mdl-cell mdl-cell--10-col mdl-cell--6-col-tablet mdl-cell--2-col-phone field-row"><i class="material-icons error" data-for="product_feature">fiber_manual_record</i><label>Product feature?</label></div>
                <div class="mdl-cell mdl-cell--2-col mdl-textfield--align-right"><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="product_feature_5f19d87769715"><input value="1" class="mdl-radio__button saveonchange hascomment" large="1" name="product_feature" type="radio" id="product_feature" onchange="saveOnChange(value,'product_feature')"><span class="mdl-radio__label">Yes</span></label><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="product_feature_5f19d8776975c"><input value="0" class="mdl-radio__button saveonchange hascomment" large="1" name="product_feature" type="radio" id="product_feature" onchange="saveOnChange(value,'product_feature')"><span class="mdl-radio__label">No</span></label></div>
                <div class="mdl-cell mdl-cell--12-col field-row product_feature_comment comment-field-closed"><i class="material-icons error" data-for="follow_up">fiber_manual_record</i>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">
                        <textarea class="mdl-textfield__input saveonchange add_media" type="text" name="follow_up" value="" id="follow_up" onBlur="setFieldname(this.name)"></textarea>
                        <label class="mdl-textfield__label" for="follow_up">Follow up steps</label>
                        <div class="pictureswipe_wrap tab_media" itemscope itemtype="http://schema.org/ImageGallery">
                            <div class="field-gallery-container follow_up" data-for="follow_up">

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="spacer spacer-height-60"></div>
        </div>
    </div>
    <div class="fixed-action-btn-background"></div>
    <div class="fixed-action-btn-container">
        <div class="scrollwrapper">
<!-- Arpit: copy Line 114 to 118 -->
        

<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored fixed-action-btn" id="test"
		onclick="system.openInDialog('/json/testdrive/add/')">
			<i class="material-icons">directions_car</i>
			<label>Test drive</label>
		</button>
            <!-- <a class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored fixed-action-btn" href="#modal-testdrive">
                <i class="material-icons">directions_car</i>
                <label>Test drive</label>
            </a> -->
            <a class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored fixed-action-btn" href="#modal-visualcheck">
                <i class="material-icons">remove_red_eye</i>
                <label>Visual check</label>
            </a>
            </div>
    </div>

    <script type="application/javascript">
        $('body').one('TweenAnimationDone', function() {
            var list = currentContainer.find('.growinglist');
            list.on('input', '.growinglist-item__input', growinglist.change);
            list.on('click', '.growinglist-item__button', growinglist.buttonClick);
        });

        var growinglist = {
            token: '',
            timeout: null,
            change: function() {
                var $this = $(this);
                var hasEmpty = growinglist.hasEmpty($this);

                if ($this.val() === '' && hasEmpty) {
                    growinglist.removeRow($this);
                } else if ($this.val() !== '' && hasEmpty === false) {
                    growinglist.addRow($this.parents('.growinglist'));
                } else if ($this.val() === '') {
                    $this.parents('.growinglist-item').find('growinglist-item__button').removeClass('active').removeClass('inactive');
                }
                growinglist.serialize($this.parents('.growinglist'));
            },
            addRow: function(list) {
                list.append('<div class="growinglist-item">' +
                    '<div class="mdl-textfield mdl-js-textfield mdl-textfield--no-floating-label form-group">' +
                    '<input class="mdl-textfield__input growinglist-item__input" type="text">' +
                    '<label class="mdl-textfield__label">Function checks</label></div>' +
                    '<div class="growinglist-item__buttons"><i class="material-icons growinglist-item__button growinglist-item__button-check">check</i>' +
                    '<i class="material-icons growinglist-item__button growinglist-item__button-remove">close</i></div></div>');
                componentHandler.upgradeDom();
            },
            removeRow: function(row) {
                row.parents('.growinglist-item').remove();
            },
            buttonClick: function() {
                var $this = $(this);
                $this.parent().find('.growinglist-item__button').removeClass('active').addClass('inactive');
                $this.addClass('active').removeClass('inactive');

                growinglist.serialize($this.parents('.growinglist'));
            },
            hasEmpty: function(exclude) {
                return (exclude.parents('.growinglist').find('.growinglist-item__input').not(exclude).filter(function() {
                    return this.value === "";
                }).length > 0)
            },
            serialize: function(list) {
                if (growinglist.timeout !== null) {
                    clearTimeout(growinglist.timeout);
                }
                growinglist.timeout = setTimeout(function() {
                    growinglist.timeout = null;
                    var serialized = [];
                    list.find('.growinglist-item').each(function(index, element) {
                        var text = $(element).find('.growinglist-item__input').val();
                        if (text !== '') {
                            var value = ($(element).find('.growinglist-item__button.active').text() === 'check' ? 1 : 0);
                            serialized.push({
                                text: text,
                                value: value
                            });
                        }
                    });

                    $.post('/json/diagnosis/save', {
                        'csrf_token': growinglist.token,
                        diagnosis_id: diagnosis_id,
                        field: 'function_checks_done',
                        value: JSON.stringify(serialized)
                    }, function(response) {
                        if (response && response.token) {
                            growinglist.token = response.token;
                        }
                    });

                }, 1000);
            }
        };
    </script>
</div><?php /**PATH C:\xampp2\htdocs\16thsept\resources\views/Diagnosis/EditTabs/Findings.blade.php ENDPATH**/ ?>