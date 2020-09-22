<?php
/**
* This file is part of mdiag.backend.
* (c) 2018 ECOM Development B.V.
*
* @author milan
*/

use App\Application\Models\Statistics;
use App\Ecom\Core;
use App\Ecom\Libraries\Request;
?>

<div class="mdl-layout__tab-panel <?php if (isset($_GET['tab']) && $_GET['tab'] === 'statistics') {
    echo 'is-active';
} ?>" id="statistics_panel">
    <style>
        h2.subtitle {
            margin-bottom: 0;
        }

        .subtitle {
            color: #00ADEF;
        }

        #detail table,
        #detail tr,
        #detail td {
            border: none;
        }

        #detail tr:hover {
            background-color: transparent;
        }

        #detail tr:not(.no-hover) {
            border-bottom: 3px solid #464646;
            color: white;
        }

        #detail tr:not(.no-hover):hover,
        #detail tbody tr:not(.no-hover):hover {
            background-color: #464646;
        }

        #employees tr[data-userid] {
            cursor: pointer;
        }

        .reporting--grid {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .reporting--item {
            min-width: 500px;
            margin: 0 20px;
        }

        .reporting--grow {
            flex-grow: 1;
        }

        #deviations {
            margin: 0 20px;
        }

        .chart-chevron {
            position: absolute;
            pointer-events: none;
            opacity: 0.6;
            font-size: 24px;
            color: #36a9e1;
        }

        .chatgrid {
            height: 1000px !important;
            display: inline !important;
            width: 1800px !important;
        }

    </style>
    <div class="mdl-grid center-items" style="user-select: none; -webkit-user-select: none;">
        <div
            class="mdl-cell mdl-cell--2-col mdl-cell--4-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop mdl-zebra__phone">
            <div class="mdl-selectcontainer">
                <div class="mdl-selectfield mdl-js-selectfield is-dirty" tabindex="-1">
                    <select id="year" name="year" value="2020" class="fullwidth mdl-selectfield__select">
                        <option value="2020" selected>2020</option>
                        <option value="2019">2019</option>
                        <option value="2018">2018</option>
                        <option value="2017">2017</option>
                        <option value="2016">2016</option>
                        <option value="2015">2015</option>
                    </select><label class="mdl-textfield__label" for="year">Year</label></div>
            </div>
        </div>
        <div
            class="mdl-cell mdl-cell--2-col mdl-cell--4-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop mdl-zebra__phone">
            <div class="mdl-selectcontainer">
                <div class="mdl-selectfield mdl-js-selectfield is-dirty" tabindex="-1">
                    <select class="fullwidth mdl-selectfield__select filter" id="group" name="group" value="">
                        <option value="" selected>&nbsp;</option>
                        <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($group->id); ?>"><?php echo e($group->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </select><label class="mdl-textfield__label" for="group">Groups</label></div>
            </div>
        </div>
        <div
            class="mdl-cell mdl-cell--2-col mdl-cell--4-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop mdl-zebra__phone">
            <div class="mdl-selectcontainer">
                <div class="mdl-selectfield mdl-js-selectfield is-dirty" tabindex="-1">
                    <select id="user" name="user" value="" class="fullwidth mdl-selectfield__select">
                        <option value="" selected>&nbsp;</option>
                        <?php $__currentLoopData = $users2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($user->id); ?>"><?php echo e($user->first_name . ' ' . $user->surname); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select><label class="mdl-textfield__label" for="user">Users</label></div>
            </div>
        </div>
    </div>

    <div id="container"
        style="position: relative; height: 50vh; width: 100vw; user-select: none; -webkit-user-select: none;">
        <canvas id="chartoverlay" style="pointer-events: none;"></canvas>
        <canvas id="mbdchart" style="transform: translateY(-100%)"></canvas>
        <i class="material-icons chart-chevron chart-chevron--left">keyboard_arrow_right</i>
        <i class="material-icons chart-chevron chart-chevron--right">keyboard_arrow_left</i>
    </div>
    <div class="mdl-grid mdl-grid--with-padding center-items" style="padding-left: 25px">
        <div class="mdl-cell mdl-cell--2-col mdl-cell--4-col-tablet mdl-cell--4-col-phone">
            <h2>Maintenance / Repair</h2><label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect"
                for="type_1_enabled"><input id="type_1_enabled" checked="checked" name="type_1_enabled"
                    class="mdl-checkbox__input" value="1" type="checkbox"><span
                    class="mdl-checkbox__label">Enabled</span></label>
        </div>
        <div class="mdl-cell mdl-cell--2-col mdl-cell--4-col-tablet mdl-cell--4-col-phone">
            <h2>Warranty / Diagnosis</h2><label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect"
                for="type_2_enabled"><input id="type_2_enabled" checked="checked" name="type_2_enabled"
                    class="mdl-checkbox__input" value="1" type="checkbox"><span
                    class="mdl-checkbox__label">Enabled</span></label>
        </div>
        <div class="mdl-cell mdl-cell--2-col mdl-cell--4-col-tablet mdl-cell--4-col-phone">
            <h2>Delivery</h2><label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect"
                for="type_3_enabled"><input id="type_3_enabled" checked="checked" name="type_3_enabled"
                    class="mdl-checkbox__input" value="1" type="checkbox"><span
                    class="mdl-checkbox__label">Enabled</span></label>
        </div>
        <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet mdl-cell--4-col-phone"></div>
    </div>


<div id="detail" style="">
    <div class="reporting--grid">
        <div class="reporting--item">
            <table id="questions" class="mdl-data-table">
                <tbody>
                    <tr class="no-hover">
                        <td class="mdl-data-table__cell--non-numeric" colspan="5">
                            <h2 class="subtitle">Results per question</h2>
                        </td>
                    </tr>
                    <tr class="no-hover">
                        <td class="subtitle mdl-data-table__cell--non-numeric">Question</td>
                        <td class="subtitle">Yes</td>
                        <td class="subtitle">No</td>
                        <td class="subtitle">NA</td>
                        <td class="subtitle">% No (ex. NA.)</td>
                    </tr>
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">Control accessories (navigation, telephone, etc.)
                        </td>
                        <td>0</td>
                        <td>1</td>
                        <td>0</td>
                        <td>100%</td>
                    </tr>
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">Accessories documented in Vedoc</td>
                        <td>2</td>
                        <td>0</td>
                        <td>1</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">Advertising dealer pasted</td>
                        <td>2</td>
                        <td>0</td>
                        <td>0</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">Alarm certificate available</td>
                        <td>4</td>
                        <td>0</td>
                        <td>1</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">Alarm sticker pasted</td>
                        <td>1</td>
                        <td>0</td>
                        <td>1</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">Day counter set to zero</td>
                        <td>1</td>
                        <td>0</td>
                        <td>0</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">Delivery forms completed in WIS</td>
                        <td>4</td>
                        <td>0</td>
                        <td>1</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">EVA deregistered</td>
                        <td>4</td>
                        <td>0</td>
                        <td>1</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">Extra bottle of oil present</td>
                        <td>2</td>
                        <td>0</td>
                        <td>0</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">Has the vehicle been refuelled?</td>
                        <td>1</td>
                        <td>0</td>
                        <td>0</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">If tow bar, white plate, adapter and sticker with
                            ball pressure available</td>
                        <td>2</td>
                        <td>0</td>
                        <td>0</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">Is the exterior of the vehicle well polished</td>
                        <td>4</td>
                        <td>0</td>
                        <td>1</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">Is the interior clean</td>
                        <td>2</td>
                        <td>0</td>
                        <td>0</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">KDM action performed and signed off</td>
                        <td>0</td>
                        <td>0</td>
                        <td>1</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">MB Contact OK</td>
                        <td>4</td>
                        <td>0</td>
                        <td>1</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">Oil on level</td>
                        <td>3</td>
                        <td>0</td>
                        <td>0</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">Previous navigation targets deleted</td>
                        <td>1</td>
                        <td>0</td>
                        <td>1</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">Previous phone data deleted</td>
                        <td>0</td>
                        <td>0</td>
                        <td>1</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">Radio programmed</td>
                        <td>1</td>
                        <td>0</td>
                        <td>0</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">Repair performed correctly</td>
                        <td>1</td>
                        <td>0</td>
                        <td>0</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">Subsequent options available and correctly
                            installed</td>
                        <td>3</td>
                        <td>0</td>
                        <td>0</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">Technical inspection not OK?</td>
                        <td>1</td>
                        <td>0</td>
                        <td>0</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">Test</td>
                        <td>1</td>
                        <td>0</td>
                        <td>2</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">Test1</td>
                        <td>1</td>
                        <td>0</td>
                        <td>0</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">Vehicle tracking system on and off</td>
                        <td>2</td>
                        <td>0</td>
                        <td>1</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">Yellow jackets present?</td>
                        <td>1</td>
                        <td>0</td>
                        <td>1</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">test</td>
                        <td>1</td>
                        <td>0</td>
                        <td>0</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">Total</td>
                        <td>49</td>
                        <td>1</td>
                        <td>14</td>
                        <td>2%</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="reporting--item">
            <table id="employees" class="mdl-data-table">
                <tr class="no-hover">
                    <td class="mdl-data-table__cell--non-numeric" colspan="5">
                        <h2 class="subtitle">Results per employee</h2>
                    </td>
                </tr>
                <tr class="no-hover">
                    <td class="subtitle mdl-data-table__cell--non-numeric">Mechanic</td>
                    <td class="subtitle mdl-data-table__cell--non-numeric">Quality Controls</td>
                    <td class="subtitle mdl-data-table__cell--non-numeric">Deviations</td>
                    <td class="subtitle mdl-data-table__cell--non-numeric">Errors</td>
                    <td class="subtitle mdl-data-table__cell--non-numeric">%</td>
                </tr>
                <tr data-userid="7664">
                    <td class="mdl-data-table__cell--non-numeric">Colleges Modernization</td>
                    <td class="mdl-data-table__cell--non-numeric">2</td>
                    <td class="mdl-data-table__cell--non-numeric">1</td>
                    <td class="mdl-data-table__cell--non-numeric">1</td>
                    <td class="mdl-data-table__cell--non-numeric">50%</td>
                </tr>
                <tr>
                    <td class="mdl-data-table__cell--non-numeric">Alex Jongsma</td>
                    <td class="mdl-data-table__cell--non-numeric">4</td>
                    <td class="mdl-data-table__cell--non-numeric">0</td>
                    <td class="mdl-data-table__cell--non-numeric">0</td>
                    <td class="mdl-data-table__cell--non-numeric"></td>
                </tr>
                <tr>
                    <td class="mdl-data-table__cell--non-numeric">ECOM Monteur</td>
                    <td class="mdl-data-table__cell--non-numeric">0</td>
                    <td class="mdl-data-table__cell--non-numeric">0</td>
                    <td class="mdl-data-table__cell--non-numeric">0</td>
                    <td class="mdl-data-table__cell--non-numeric"></td>
                </tr>
                <tr>
                    <td class="mdl-data-table__cell--non-numeric">ECOM Werkplaatschef</td>
                    <td class="mdl-data-table__cell--non-numeric">0</td>
                    <td class="mdl-data-table__cell--non-numeric">0</td>
                    <td class="mdl-data-table__cell--non-numeric">0</td>
                    <td class="mdl-data-table__cell--non-numeric"></td>
                </tr>
                <tr>
                    <td class="mdl-data-table__cell--non-numeric">External 1</td>
                    <td class="mdl-data-table__cell--non-numeric">0</td>
                    <td class="mdl-data-table__cell--non-numeric">0</td>
                    <td class="mdl-data-table__cell--non-numeric">0</td>
                    <td class="mdl-data-table__cell--non-numeric"></td>
                </tr>
                <tr>
                    <td class="mdl-data-table__cell--non-numeric">External 2</td>
                    <td class="mdl-data-table__cell--non-numeric">0</td>
                    <td class="mdl-data-table__cell--non-numeric">0</td>
                    <td class="mdl-data-table__cell--non-numeric">0</td>
                    <td class="mdl-data-table__cell--non-numeric"></td>
                </tr>
                <tr>
                    <td class="mdl-data-table__cell--non-numeric">External 3</td>
                    <td class="mdl-data-table__cell--non-numeric">0</td>
                    <td class="mdl-data-table__cell--non-numeric">0</td>
                    <td class="mdl-data-table__cell--non-numeric">0</td>
                    <td class="mdl-data-table__cell--non-numeric"></td>
                </tr>
                <tr>
                    <td class="mdl-data-table__cell--non-numeric">MBC Monteur Monteur</td>
                    <td class="mdl-data-table__cell--non-numeric">0</td>
                    <td class="mdl-data-table__cell--non-numeric">0</td>
                    <td class="mdl-data-table__cell--non-numeric">0</td>
                    <td class="mdl-data-table__cell--non-numeric"></td>
                </tr>
                <tr>
                    <td class="mdl-data-table__cell--non-numeric">MBC Werkplaatschef</td>
                    <td class="mdl-data-table__cell--non-numeric">0</td>
                    <td class="mdl-data-table__cell--non-numeric">0</td>
                    <td class="mdl-data-table__cell--non-numeric">0</td>
                    <td class="mdl-data-table__cell--non-numeric"></td>
                </tr>
                <tr>
                    <td class="mdl-data-table__cell--non-numeric">Ola Spain</td>
                    <td class="mdl-data-table__cell--non-numeric">0</td>
                    <td class="mdl-data-table__cell--non-numeric">0</td>
                    <td class="mdl-data-table__cell--non-numeric">0</td>
                    <td class="mdl-data-table__cell--non-numeric"></td>
                </tr>
                <tr>
                    <td class="mdl-data-table__cell--non-numeric">Rogier Schoonhoven</td>
                    <td class="mdl-data-table__cell--non-numeric">0</td>
                    <td class="mdl-data-table__cell--non-numeric">0</td>
                    <td class="mdl-data-table__cell--non-numeric">0</td>
                    <td class="mdl-data-table__cell--non-numeric"></td>
                </tr>
            </table>
        </div>
        <div class="reporting--item reporting--grow" style="padding-top: 72px; position: relative; height:70vh;">
            <canvas id="chartdetail" style="display: none;"></canvas>
        </div>
    </div>
    <table id="deviations" class="mdl-data-table">
        <tr class="no-hover">
            <td class="mdl-data-table__cell--non-numeric" colspan="7">
                <h2 class="subtitle">List of deviations</h2>
            </td>
        </tr>
        <tr class="no-hover">
            <td class="subtitle mdl-data-table__cell--non-numeric">Date</td>
            <td class="subtitle mdl-data-table__cell--non-numeric">Inspector</td>
            <td class="subtitle mdl-data-table__cell--non-numeric">Mechanic</td>
            <td class="subtitle mdl-data-table__cell--non-numeric">WO number</td>
            <td class="subtitle mdl-data-table__cell--non-numeric">License plate</td>
            <td class="subtitle mdl-data-table__cell--non-numeric">Question</td>
            <td class="subtitle mdl-data-table__cell--non-numeric">Description</td>
        </tr>
        <tr data-userid="7664">
            <td class="mdl-data-table__cell--non-numeric">09/04/2020</td>
            <td class="mdl-data-table__cell--non-numeric">Colleges Modernization</td>
            <td class="mdl-data-table__cell--non-numeric">Colleges Modernization</td>
            <td class="mdl-data-table__cell--non-numeric">16092810</td>
            <td class="mdl-data-table__cell--non-numeric">0825</td>
            <td class="mdl-data-table__cell--non-numeric">Control accessories (navigation, telephone, etc.)</td>
            <td class="mdl-data-table__cell--non-numeric">sdsdsdsd</td>
        </tr>
    </table>
    <div class="spacer spacer-height-80"></div>
</div>


<div class="loading-overlay">
    <div class="loading-positioner">
        <div class="mdl-spinner mdl-spinner--single-color mdl-js-spinner is-active is-upgraded"
            data-upgraded=",MaterialSpinner">
            <div class="mdl-spinner__layer mdl-spinner__layer-1">
                <div class="mdl-spinner__circle-clipper mdl-spinner__left">
                    <div class="mdl-spinner__circle"></div>
                </div>
                <div class="mdl-spinner__gap-patch">
                    <div class="mdl-spinner__circle"></div>
                </div>
                <div class="mdl-spinner__circle-clipper mdl-spinner__right">
                    <div class="mdl-spinner__circle"></div>
                </div>
            </div>
            <div class="mdl-spinner__layer mdl-spinner__layer-2">
                <div class="mdl-spinner__circle-clipper mdl-spinner__left">
                    <div class="mdl-spinner__circle"></div>
                </div>
                <div class="mdl-spinner__gap-patch">
                    <div class="mdl-spinner__circle"></div>
                </div>
                <div class="mdl-spinner__circle-clipper mdl-spinner__right">
                    <div class="mdl-spinner__circle"></div>
                </div>
            </div>
            <div class="mdl-spinner__layer mdl-spinner__layer-3">
                <div class="mdl-spinner__circle-clipper mdl-spinner__left">
                    <div class="mdl-spinner__circle"></div>
                </div>
                <div class="mdl-spinner__gap-patch">
                    <div class="mdl-spinner__circle"></div>
                </div>
                <div class="mdl-spinner__circle-clipper mdl-spinner__right">
                    <div class="mdl-spinner__circle"></div>
                </div>
            </div>
            <div class="mdl-spinner__layer mdl-spinner__layer-4">
                <div class="mdl-spinner__circle-clipper mdl-spinner__left">
                    <div class="mdl-spinner__circle"></div>
                </div>
                <div class="mdl-spinner__gap-patch">
                    <div class="mdl-spinner__circle"></div>
                </div>
                <div class="mdl-spinner__circle-clipper mdl-spinner__right">
                    <div class="mdl-spinner__circle"></div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>





<script>
    var start, end;

    function Statistics(canvas, canvasdetail, container, containerdetail, overlay) {
        var _token = $('meta[name="csrf-token"]').attr('content');
        var _this = this;
        var _canvas = canvas;
        var _canvasdetail = canvasdetail;
        var _overlay = overlay;
        var _chart = null;
        var _chartdetail = null;
        var _data = null;
        var _container = container;
        var _containerdetail = containerdetail;
        var _start = 12;
        var _end = 12;
        var _fetchSelection = true;
        var _allow_detail = true;
        var selectionRect = {
            w: 0,
            startX: 0,
            startY: 0
        };
        var _chevron_left = container.find('.chart-chevron--left');
        var _chevron_right = container.find('.chart-chevron--right');
        Chart.defaults.global.defaultFontColor = '#989898';

        this.setAllowDetail = function(allow) {
            _allow_detail = allow;
            if (allow) {
                _chevron_left.show();
                _chevron_right.show();
            } else {
                _chevron_left.hide();
                _chevron_right.hide();
            }
        }

        this.setStartAndEnd = function(start, end) {
            _start = start;
            _end = end;
        }


        this.getQuestionTypes = function() {
            var types = {};
            for (var i = 1; i <= 3; i++) {
                types[i] = {};
                types[i]['enabled'] = ($('#type_' + i + '_enabled').prop("checked") ? 'on' : 'off');
            }
            return types;
        }


        this.getData = function(selection) {
            console.log($('meta[name="csrf-token"]').attr('content'));

            _fetchSelection = !selection;
            if (!selection) {
                _overlay.getContext('2d').clearRect(0, 0, _canvas.width, _canvas.height);
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.get(
                'statistics/getQualityControlData', {

                    year: currentContainer.find('#year').val(),
                    start: (selection ? _start : null),
                    end: (selection ? _end : null),
                    dealer: 1,
                    dealer_location: 1,
                    group: currentContainer.find('#group').val(),
                    user: currentContainer.find('#user').val(),
                    question_types: this.getQuestionTypes()
                },
                function(response) {
                    if (response.hasOwnProperty('token')) {
                        _token = response.token;
                    }
                    if (response.hasOwnProperty('success') && response.success) {
                        _data = response.data;
                        if (response.hasOwnProperty('detail')) {
                            _containerdetail.show();
                            _this.createTableDetail(response.detail);
                            _this.createChartDetail(_data);
                        } else {
                            _containerdetail.hide();
                            _this.createChart(_data);
                        }
                    } else {
                        console.log(response);
                    }
                }
            );
        }

        this.drawSelection = function(chart) {
            var __chart = chart ? chart : _chart;

            var selectionContext = _overlay.getContext('2d');
            selectionContext.clearRect(0, 0, _canvas.width, _canvas.height);
            _overlay.width = (_canvas.width / __chart.currentDevicePixelRatio);
            _overlay.height = (_canvas.height / __chart.currentDevicePixelRatio);
            var scale = __chart.scales['x-axis-0'];
            var barwidth = scale.width / scale.ticks.length;

            selectionRect.startX = __chart.chartArea.left + ((_start - 1) * barwidth);
            selectionRect.startY = __chart.chartArea.top;
            selectionRect.w = ((_end - _start + 1) * barwidth);

            selectionContext.globalAlpha = 0.3;
            selectionContext.fillStyle = '#36a9e1';
            selectionContext.fillRect(selectionRect.startX,
                selectionRect.startY,
                selectionRect.w,
                __chart.chartArea.bottom - __chart.chartArea.top);
        }

        this.createChart = function(data) {
            if (_chart) {
                _chart.data.labels = data.labels;
                _chart.data.datasets = data.datasets;
                _chart.options.title.text = data.title;
                _chart.update();
            } else {
                _chart = new Chart(_canvas, {
                    type: 'bar',
                    data: {
                        labels: data.labels,
                        datasets: data.datasets
                    },
                    options: {
                        animation: false,
                        tooltips: {
                            displayColors: false,
                            callbacks: {
                                title: function(t, c) {
                                    if (t.length) {
                                        return [
                                            c.datasets[t[0].datasetIndex].label,
                                            t[0].xLabel
                                        ];
                                    }
                                    return '';
                                },
                                label: function(l, c) {
                                    var id = c.datasets[l.datasetIndex].id;
                                    var d1 = c.datasets[l.datasetIndex];
                                    var d2 = c.datasets[c.datasets.findIndex(function(e, i) {
                                        return e.id === id && i !== l.datasetIndex;
                                    })];
                                    if (d1.hasOwnProperty('faulty')) {
                                        var d3 = d1;
                                        d1 = d2;
                                        d2 = d3;
                                    }
                                    return [
                                        '"Total:' + (parseInt(d1.data[l.index]) + parseInt(d2.data[l
                                            .index])),
                                        '"Deviations:' + d2.data[l.index]
                                    ];
                                }
                            }
                        },
                        legend: {
                            onClick: function(t, e) {
                                var a = this.chart.getDatasetMeta(e.datasetIndex);
                                var b = this.chart.getDatasetMeta(e.datasetIndex + 1);
                                a.hidden = b.hidden = (a.hidden === null ? !this.chart.data.datasets[e
                                    .datasetIndex].hidden : null);
                                this.chart.update();
                            },
                            position: 'right',
                            labels: {
                                filter: function(item) {
                                    return [
                                        '#36A9E1', '#148f77',
                                        '#BF1760', '#1E8FC6',
                                        '#27AE60', '#DD9E0B',
                                        '#ff7314', '#984DCE',
                                        '#FF9147', '#1ABC9C',
                                        '#2ECC71', '#E52478',
                                        '#F4B727', '#AF75D9'
                                    ].indexOf(item.fillStyle) > -1;
                                },
                                boxWidth: 30,
                                fontSize: 12,
                                padding: 10
                            }
                        },
                        title: {
                            display: true,
                            text: data.title
                        },
                        maintainAspectRatio: false,
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                    callback: function(tick) {
                                        return tick % 1 ? undefined : tick;
                                    }
                                },
                                gridLines: {
                                    display: false
                                }
                            }],
                            xAxes: [{
                                gridLines: {
                                    display: true,
                                    color: "#464646"
                                }
                            }]
                        }
                    },
                    plugins: [{
                        beforeUpdate: function(chart) {
                            var target = 0;
                            for (var i = 0; i < chart.config.data.datasets.length; i++) {
                                target = Math.max(target, chart.config.data.datasets[i].target);
                            }
                            chart.config.options.scales.yAxes[0].ticks.suggestedMax = target +
                            1;
                        },
                        afterDatasetDraw: function(chart, set) {
                            var top = ((chart.chartArea.bottom - chart.chartArea.top) / 2) +
                                chart.chartArea.top - 12;
                            _chevron_left.css('top', top);
                            _chevron_left.css('left', chart.chartArea.left - 6);
                            _chevron_right.css('top', top);
                            _chevron_right.css('left', chart.chartArea.right - 18);

                            for (var i = 0; i < set.meta.data.length; i++) {
                                var target = chart.data.datasets[set.meta.data[i]._datasetIndex]
                                    .target;
                                if (target && target > 0) {
                                    var x = set.meta.data[i]._model.x;
                                    var y = chart.scales['y-axis-0'].getPixelForValue(target);
                                    var width = set.meta.data[i]._model.width / 2;
                                    chart.ctx.lineWidth = 1;
                                    chart.ctx.strokeStyle = '#000';
                                    chart.ctx.beginPath();
                                    chart.ctx.moveTo(x - width, y);
                                    chart.ctx.lineTo(x + width, y);
                                    chart.ctx.stroke();
                                    chart.ctx.strokeStyle = chart.data.datasets[set.meta.data[i]
                                        ._datasetIndex].backgroundColor;
                                    chart.ctx.beginPath();
                                    chart.ctx.moveTo(x - width, y);
                                    chart.ctx.lineTo(x + width, y);
                                    chart.ctx.stroke();
                                }
                            }

                            if (set.index === 0 && _allow_detail) {
                                stats.drawSelection(chart);
                                if (_fetchSelection) {
                                    stats.getData(true);
                                }
                            }
                        }
                    }]
                });

                var startIndex = 0;
                var selectionContext = _overlay.getContext('2d');
                var drag = false;
                var flipped = false;

                var dragstart = function(evt) {
                    if (drag || evt.pageY === undefined || _allow_detail === false) {
                        return;
                    }
                    var scale = _chart.scales['x-axis-0'];
                    var barwidth = scale.width / scale.ticks.length;
                    var clientX = evt.pageX - _chart.chartArea.left;
                    startIndex = Math.floor(clientX / barwidth);
                    if (startIndex >= scale.ticks.length) {
                        return;
                    }
                    var rect = _canvas.getBoundingClientRect();
                    var clientY = evt.pageY - rect.top;
                    if (clientY > _chart.chartArea.bottom || clientY < _chart.chartArea.top) {
                        return;
                    }
                    evt.preventDefault();
                    _overlay.width = (_canvas.width / _chart.currentDevicePixelRatio);
                    _overlay.height = (_canvas.height / _chart.currentDevicePixelRatio);

                    if (startIndex < 0) {
                        startIndex = 0;
                    }
                    selectionRect.startX = _chart.chartArea.left + (startIndex * barwidth);
                    selectionRect.startY = _chart.chartArea.top;
                    drag = true;
                }
                _canvas.addEventListener('pointerdown', dragstart);
                _canvas.addEventListener('touchstart', dragstart);

                var dragmove = function(evt) {
                    if (drag && _allow_detail) {
                        evt.preventDefault();
                        var rect = _canvas.getBoundingClientRect();
                        var scale, barwidth;
                        selectionRect.w = (evt.pageX - rect.left) - selectionRect.startX;
                        if (selectionRect.w < 0 && flipped === false) {
                            scale = _chart.scales['x-axis-0'];
                            barwidth = scale.width / scale.ticks.length;
                            selectionRect.startX = selectionRect.startX + barwidth;
                            flipped = true;
                        } else if (selectionRect.w > 0 && flipped === true) {
                            scale = _chart.scales['x-axis-0'];
                            barwidth = scale.width / scale.ticks.length;
                            selectionRect.startX = selectionRect.startX - barwidth;
                            flipped = false;
                        }
                        selectionContext.globalAlpha = 0.3;
                        selectionContext.fillStyle = '#36a9e1';
                        selectionContext.clearRect(0, 0, _canvas.width, _canvas.height);
                        selectionContext.fillRect(selectionRect.startX,
                            selectionRect.startY,
                            selectionRect.w,
                            _chart.chartArea.bottom - _chart.chartArea.top);
                    }
                }
                _canvas.addEventListener('pointermove', dragmove);
                _canvas.addEventListener('touchmove', dragmove);

                var dragstop = function(evt) {
                    if (drag && _allow_detail) {
                        evt.preventDefault();
                        drag = false;
                        var scale = _chart.scales['x-axis-0'];
                        var barwidth = scale.width / scale.ticks.length;
                        var clientX = evt.pageX - _chart.chartArea.left;
                        var stopIndex = Math.floor(clientX / barwidth);
                        if (stopIndex >= scale.ticks.length) {
                            stopIndex = scale.ticks.length - 1;
                        }
                        if (stopIndex < 0) {
                            stopIndex = 0;
                        }
                        selectionRect.w = ((stopIndex - startIndex + 1) * barwidth);
                        if (flipped) {
                            selectionRect.w = ((startIndex - stopIndex + 1) * barwidth) * -1;
                            stats.setStartAndEnd(stopIndex + 1, startIndex + 1);
                            flipped = false;
                        } else {
                            selectionRect.w = ((stopIndex - startIndex + 1) * barwidth);
                            stats.setStartAndEnd(startIndex + 1, stopIndex + 1);
                        }
                        _this.drawSelection();
                        stats.getData(true);
                    }
                }
                canvas.addEventListener('pointerup', dragstop);
                canvas.addEventListener('touchend', dragstop);
            }
        }

        this.createChartDetail = function(data) {
            //if(data.datasets === undefined) {
            currentContainer.find('#chartdetail').hide();
            return;
            //}
            currentContainer.find('#chartdetail').show();

            if (_chartdetail) {
                _chartdetail.data.labels = data.labels;
                _chartdetail.data.datasets = data.datasets;
                _chartdetail.options.title.text = data.title;
                _chartdetail.update();
            } else {
                _chartdetail = new Chart(_canvasdetail, {
                    type: 'bar',
                    data: {
                        labels: data.labels,
                        datasets: data.datasets
                    },
                    options: {
                        legend: {
                            position: 'bottom'
                        },
                        title: {
                            display: true,
                            text: data.title
                        },
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                    suggestedMax: 100
                                },
                                gridLines: {
                                    display: false
                                }
                            }],
                            xAxes: [{
                                gridLines: {
                                    display: true,
                                    color: "#464646"
                                }
                            }]
                        }
                    }
                });
            }
        }

        this.createTableDetail = function(data) {
            var html = [
                '<tbody><tr class="no-hover"><td class="mdl-data-table__cell--non-numeric" colspan="5"><h2 class="subtitle">Results per question</h2></td></tr>' +
                '<tr class="no-hover"><td class="subtitle mdl-data-table__cell--non-numeric">Question</td>' +
                '<td class="subtitle">Yes</td>' +
                '<td class="subtitle">No</td>' +
                '<td class="subtitle">NA</td>' +
                '<td class="subtitle">% No (ex. NA.)</td></tr>'
            ];
            for (var key in data.questions) {
                if (data.questions.hasOwnProperty(key)) {
                    html.push('<tr><td class="mdl-data-table__cell--non-numeric">' + data.questions[key][
                        'question'] + '</td>' +
                        '<td>' + data.questions[key]['1'] + '</td>' +
                        '<td>' + data.questions[key]['2'] + '</td>' +
                        '<td>' + data.questions[key]['3'] + '</td>' +
                        '<td>' + (data.questions[key]['percentage'] > 0 ? data.questions[key]['percentage'] +
                            '%' : '') + '</td></tr>');
                }
            }
            html.push('</tbody>');
            _containerdetail.find('#questions').html(html.join(''));

            html = ['<tr class="no-hover"><td class="mdl-data-table__cell--non-numeric" colspan="5"><h2 class="subtitle">Results per employee</h2></td></tr>' +
                '<tr class="no-hover"><td class="subtitle mdl-data-table__cell--non-numeric">Employee</td>' +
                '<td class="subtitle mdl-data-table__cell--non-numeric">Quality Controls</td>' +
                '<td class="subtitle mdl-data-table__cell--non-numeric">Deviations</td>' +
                '<td class="subtitle mdl-data-table__cell--non-numeric">Errors</td>' +
                '<td class="subtitle mdl-data-table__cell--non-numeric">%</td></tr>'
            ];
            var employeeCounter = 0;
            for (key in data.employees) {
                if (data.employees.hasOwnProperty(key)) {
                    employeeCounter++;
                    html.push('<tr' + (data.employees[key]['errors'] > 0 ? ' data-userid="' + data.employees[key][
                            'employee_id'
                        ] + '"' : '') + '><td class="mdl-data-table__cell--non-numeric">' + data.employees[key][
                            'name'
                        ] + '</td>' +
                        '<td class="mdl-data-table__cell--non-numeric">' + data.employees[key][
                            'quality_controls'
                        ] + '</td>' +
                        '<td class="mdl-data-table__cell--non-numeric">' + data.employees[key]['errors'] +
                        '</td>' +
                        '<td class="mdl-data-table__cell--non-numeric">' + data.employees[key]['errors_all'] +
                        '</td>' +
                        '<td class="mdl-data-table__cell--non-numeric">' + (data.employees[key]['percentage'] >
                            0 ? data.employees[key]['percentage'] + '%' : '') + '</td></tr>');
                }
            }
            if (employeeCounter > 0) {
                _containerdetail.find('#employees').html(html.join('')).show().find('tr[data-userid]').click(
                    function() {
                        var cloned = $('<div id="detail"></div>').append(_containerdetail.find('#deviations')
                            .get(0).outerHTML);
                        cloned.find('tr[data-userid]').not('tr[data-userid="' + $(this).data('userid') + '"]')
                            .remove();
                        system.alert('', cloned.get(0).outerHTML, true);
                        system.resizeDialog();
                    });
            } else {
                _containerdetail.find('#employees').hide();
            }

            html = ['<tr class="no-hover"><td class="mdl-data-table__cell--non-numeric" colspan="7"><h2 class="subtitle">"List of deviations"</h2></td></tr>' +
                '<tr class="no-hover"><td class="subtitle mdl-data-table__cell--non-numeric">"Date"</td>' +
                '<td class="subtitle mdl-data-table__cell--non-numeric">"Inspector"</td>' +
                '<td class="subtitle mdl-data-table__cell--non-numeric">"Employee"</td>' +
                '<td class="subtitle mdl-data-table__cell--non-numeric">"WO number"</td>' +
                '<td class="subtitle mdl-data-table__cell--non-numeric">"License plate"</td>' +
                '<td class="subtitle mdl-data-table__cell--non-numeric">"Question"</td>' +
                '<td class="subtitle mdl-data-table__cell--non-numeric">"Description"</td></tr>'
            ];
            var deviationCounter = 0;
            for (key in data.deviations) {
                if (data.deviations.hasOwnProperty(key)) {
                    deviationCounter++;
                    html.push('<tr data-userid="' + data.deviations[key]['employee_id'] +
                        '"><td class="mdl-data-table__cell--non-numeric">' + data.deviations[key]['date'] +
                        '</td>' +
                        '<td class="mdl-data-table__cell--non-numeric">' + data.deviations[key]['inspector'] +
                        '</td>' +
                        '<td class="mdl-data-table__cell--non-numeric">' + data.deviations[key]['employee'] +
                        '</td>' +
                        '<td class="mdl-data-table__cell--non-numeric">' + data.deviations[key]['wo'] +
                        '</td>' +
                        '<td class="mdl-data-table__cell--non-numeric">' + data.deviations[key]['license'] +
                        '</td>' +
                        '<td class="mdl-data-table__cell--non-numeric">' + data.deviations[key]['question'] +
                        '</td>' +
                        '<td class="mdl-data-table__cell--non-numeric">' + data.deviations[key]['description'] +
                        '</td></tr>');
                }
            }
            if (deviationCounter > 0) {
                _containerdetail.find('#deviations').html(html.join('')).show();
            } else {
                _containerdetail.find('#deviations').hide();
            }
        }
    }

    var stats = null;

    $('body').one('TweenAnimationDone', function() {

        stats = new Statistics(document.getElementById('mbdchart'), document.getElementById('chartdetail'), $(
            '#container'), $('#detail'), document.getElementById('chartoverlay'));

        <?php
        if (isset($_REQUEST['tab']) && $_REQUEST['tab'] === 'statistics') {
            ?>
            stats.getData();
            <?php
        } else {
            ?>
            currentContainer.find('a[href="#statistics_panel"]').one('click', function() {
                window.requestAnimationFrame(function() {
                    stats.getData();
                });
            });
            <?php
        } ?>

        currentContainer.find('#year, #dealer, #dealer_location, #group, #user').on('change', function(e) {
            var $this = $(e.target);

            if ($this.attr('id') === 'dealer') {
                stats.setAllowDetail($this.val() !== '');
            } else if ($this.val() !== '') {
                stats.setAllowDetail(true);
            } else if ($this.attr('id') === 'user' && $this.val() === '') {
                currentContainer.find('#group').trigger('change');
                return;
            }

            if ($this.hasClass('filter')) {
                if ($this.attr('id') === 'group' && $this.val() === '' && currentContainer.find(
                        '#dealer_location').length) {
                    currentContainer.find('#dealer_location').trigger('change');
                } else if ($this.attr('id') === 'dealer_location' && $this.val() === '' &&
                    currentContainer.find('#dealer').length) {
                    currentContainer.find('#dealer').trigger('change');
                } else {
                    $.get(
                        '/statistics/getFilters', {
                            '<?= Core::app()->getConfig('
                            security.csrf.name ') ?>': this.token,
                            type: $this.attr('id'),
                            id: $this.val() ? $this.val() : 0,
                            year: currentContainer.find('#year').val()
                        },
                        function(response) {
                            if (response.hasOwnProperty('token')) {
                                this.token = response.token;
                            }
                            if (response.hasOwnProperty('success') && response.success) {
                                for (var key in response.filters) {
                                    if (response.filters.hasOwnProperty(key)) {
                                        var element = currentContainer.find('#' + key);
                                        var html = '';
                                        for (var i = 0; i < response.filters[key].length; i++) {
                                            html += '<option value="' + response.filters[key][i]
                                                .id + '"' + (response.filters[key][i].id === '' ?
                                                    ' selected' : '') + '>' + response.filters[key][
                                                    i
                                                ].text + '</option>';
                                        }
                                        element.html(html);
                                        var parent = element.parent();
                                        parent.attr('data-upgraded', '').removeClass('is-dirty')
                                            .find('a, .mdl-menu__container').remove();
                                        componentHandler.upgradeElement(parent.get(0));
                                    }
                                }
                                stats.getData();
                            } else {
                                console.log(response);
                            }
                        }.bind(this)
                    );
                }
            } else if ($this.attr('id') === 'year') {
                currentContainer.find('#group').trigger('change');
            } else {
                stats.getData();
            }
        }.bind({
            token: '<?= Request::generateCsrfToken(' / json / statistics /
                getFilters ') ?>'
        }));
    })

</script>


<script type="text/javascript">
    var currentContainer = $('.sliding-page').not('#page-fragment');
    var current_field = null;

    var googleMaps = {
        map: null,
        you: null,
        path: null,
        watch: null
    };

    $(function() {
        componentHandler.upgradeDom();
        $('body').trigger('TweenAnimationDone');

        $('#add-media-to-field').click(function() {
            var form = $('#upload_file_all').find('.upload-form');
            var data = form.fileupload('option', 'formData');
            data.object_type = 'diagnosis';
            data.object_id = diagnosis_id;
            data.field = current_field;
            form.fileupload('option', 'formData', data).find('input[type=file]').click();
        });

        document.addEventListener('keydown', function(event) {
            var prevent = false;
            if (event.keyCode === 8) {
                prevent = true;
                var element = $(event.srcElement || event.target);
                if (!element.prop('readonly') && !element.prop('disabled')) {
                    if (element.get(0).isContentEditable) {
                        prevent = false;
                    } else if (element.is('input')) {
                        if (['text', 'password', 'file', 'search', 'email', 'number', 'date', 'color',
                                'datetime', 'datetime-local', 'month', 'range', 'search', 'tel', 'time',
                                'url', 'week'
                            ].indexOf(element.attr('type').toLowerCase()) > -1) {
                            prevent = false;
                        }
                    } else if (element.is('textarea')) {
                        prevent = false;
                    }
                }
            } else if (event.keyCode === 123) {
                prevent = true;
            }
            if (prevent) {
                event.preventDefault();
                return false;
            }
        });
    });

</script>

<iframe id="history-iframe" src="javascript:&quot;&quot;" style="display: none;"
    src="./MB-Diag_files/saved_resource.html"></iframe>
<?php /**PATH C:\xampp\htdocs\latest\16thsept1\resources\views/inc/QualityControl/statistics.blade.php ENDPATH**/ ?>