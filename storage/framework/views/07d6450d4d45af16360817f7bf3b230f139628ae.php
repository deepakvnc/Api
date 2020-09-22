

            <div class="mdl-layout__tab-panel <?php if(isset($_GET['tab']) && $_GET['tab'] === 'statistics') echo 'is-active'?>" id="statistics_panel">
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
                        border-bottom: 1px solid #464646;
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
                </style>
                <div class="mdl-grid center-items" style="user-select: none; -webkit-user-select: none;">
                    <div class="mdl-cell mdl-cell--2-col mdl-cell--4-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop mdl-zebra__phone">
                        <div class="mdl-selectcontainer">
                            <div class="mdl-selectfield mdl-js-selectfield is-dirty" tabindex="-1"><select id="year" name="year" value="2020" class="fullwidth mdl-selectfield__select">
                                    <option value="2020" selected>2020</option>
                                    <option value="2019">2019</option>
                                    <option value="2018">2018</option>
                                    <option value="2017">2017</option>
                                    <option value="2016">2016</option>
                                    <option value="2015">2015</option>
                                </select><label class="mdl-textfield__label" for="year">Year</label></div>
                        </div>
                    </div>
                    <div class="mdl-cell mdl-cell--2-col mdl-cell--4-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop mdl-zebra__phone">
                        <div class="mdl-selectcontainer">
                            <div class="mdl-selectfield mdl-js-selectfield is-dirty" tabindex="-1"><select class="fullwidth mdl-selectfield__select filter" id="group" name="group" value="">
                                    <option value="" selected>&nbsp;</option>
                                    <option value="1">ECOM Werkplaats #1</option>
                                    <option value="105">Handleiding</option>
                                </select><label class="mdl-textfield__label" for="group">Groups</label></div>
                        </div>
                    </div>
                    <div class="mdl-cell mdl-cell--2-col mdl-cell--4-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop mdl-zebra__phone">
                        <div class="mdl-selectcontainer">
                            <div class="mdl-selectfield mdl-js-selectfield is-dirty" tabindex="-1"><select id="user" name="user" value="" class="fullwidth mdl-selectfield__select">
                                    <option value="" selected>&nbsp;</option>
                                    <option value="504">Alex Jongsma</option>
                                    <option value="7664">Colleges Modernization</option>
                                    <option value="501">ECOM Monteur</option>
                                    <option value="502">ECOM Werkplaatschef</option>
                                    <option value="6908">External 1</option>
                                    <option value="6909">External 2</option>
                                    <option value="6910">External 3</option>
                                    <option value="7641">MBC Monteur Monteur</option>
                                    <option value="7645">MBC Werkplaatschef </option>
                                    <option value="4269">Ola Spain</option>
                                    <option value="7612">Rogier Schoonhoven</option>
                                </select><label class="mdl-textfield__label" for="user">Users</label></div>
                        </div>
                    </div>
                </div>
                <div id="container" style="position: relative;width: 100vw; user-select: none; -webkit-user-select: none;">
                    <canvas id="mbchart" style="height:100vh;"></canvas>
                    <script>
                        var ctx = document.getElementById('mbchart').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: ['Ecom', 'Xcom', 'Not in Group'],
                                datasets: [{
                                    label: '# of Diagnosis',
                                    data: [12, 19, 3],
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(153, 102, 255, 0.2)',
                                        'rgba(255, 159, 64, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                }
                            }
                        });
                    </script>
                </div>
                <div class="mdl-grid mdl-grid--with-padding center-items" style="padding-left: 25px">
                    <div class="mdl-cell mdl-cell--2-col mdl-cell--4-col-tablet mdl-cell--4-col-phone">
                        <h2>Maintenance / Repair</h2><label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="type_1_enabled"><input id="type_1_enabled" checked="checked" name="type_1_enabled" class="mdl-checkbox__input" value="1" type="checkbox"><span class="mdl-checkbox__label">Enabled</span></label>
                    </div>
                    <div class="mdl-cell mdl-cell--2-col mdl-cell--4-col-tablet mdl-cell--4-col-phone">
                        <h2>Warranty / Diagnosis</h2><label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="type_2_enabled"><input id="type_2_enabled" checked="checked" name="type_2_enabled" class="mdl-checkbox__input" value="1" type="checkbox"><span class="mdl-checkbox__label">Enabled</span></label>
                    </div>
                    <div class="mdl-cell mdl-cell--2-col mdl-cell--4-col-tablet mdl-cell--4-col-phone">
                        <h2>Delivery</h2><label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="type_3_enabled"><input id="type_3_enabled" checked="checked" name="type_3_enabled" class="mdl-checkbox__input" value="1" type="checkbox"><span class="mdl-checkbox__label">Enabled</span></label>
                    </div>
                    <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet mdl-cell--4-col-phone"></div>
                </div>
            </div>
<?php /**PATH D:\6thsept\Mbdiag_demo_v4_bal\resources\views/inc/QualityControl/statistics.blade.php ENDPATH**/ ?>