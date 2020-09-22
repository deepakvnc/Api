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
                        display: inline!important;
                       width: 1800px !important;
                    }
                </style>
                <div class="mdl-grid center-items" style="user-select: none; -webkit-user-select: none;">
                    <div class="mdl-cell mdl-cell--2-col mdl-cell--4-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop mdl-zebra__phone">
                        <div class="mdl-selectcontainer">
                            <div class="mdl-selectfield mdl-js-selectfield is-dirty" tabindex="-1">
                            <select id="year" name="year" value="2020" onchange="yearData()" class="fullwidth mdl-selectfield__select">
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
                            <div class="mdl-selectfield mdl-js-selectfield is-dirty" tabindex="-1">
                              <select class="fullwidth mdl-selectfield__select filter" id="group" name="group" value="" onchange="datachange()">
                                    <option value="" selected>&nbsp;</option>
                                    <option value="1">ECOM Werkplaats #1</option>
                                    <option value="105">Handleiding</option>
                                </select><label class="mdl-textfield__label"  for="group">Groups</label></div>
                        </div>
                    </div>
                    <div class="mdl-cell mdl-cell--2-col mdl-cell--4-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop mdl-zebra__phone">
                        <div class="mdl-selectcontainer">
                            <div class="mdl-selectfield mdl-js-selectfield is-dirty" tabindex="-1">
                          <select id="user" name="user" value="" onchange="dataChanges()" class="fullwidth mdl-selectfield__select">
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
                    <canvas id="mbchart" style="height: 300px ! important;width: 1204px ! important ;display: block;"></canvas>
                    <script>

function yearData(){

var ctx = document.getElementById('mbchart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
                    // data: {
                            //     labels: ['October 2019','November 2019','December 2019' ,'January 2020','February 2020','March 2020','April 2020','May 2020','June 2020','July 2020','August 2020'],
                            //     datasets: [{
                            //         label: '# of Diagnosis',
                            //         data: [25, 10, 15,0,5,0,15,0,20,0,25],
                            //         backgroundColor: [
                            //             'rgba(255, 99, 132, 0.2)',
                            //             'rgba(54, 162, 235, 0.2)',
                            //             'rgba(255, 206, 86, 0.2)',
                            //             'rgba(75, 192, 192, 0.2)',
                            //             'rgba(153, 102, 255, 0.2)',
                            //             'rgba(255, 159, 64, 0.2)'
                            //         ],
                            //         borderColor: [
                            //             'rgba(255, 99, 132, 1)',
                            //             'rgba(54, 162, 235, 1)',
                            //             'rgba(255, 206, 86, 1)',
                            //             'rgba(75, 192, 192, 1)',
                            //             'rgba(153, 102, 255, 1)',
                            //             'rgba(255, 159, 64, 1)'
                            //         ],
                            //         borderWidth: 1
                            //     }]
                            // },

                            data: {
    labels: [
      "October 2019",
      "November 2019",
      "December 2019",
      "January 2020",
      "February 2020",
      "March 2020",
      "April 2020",
      "May 2020",
      "June 2020",
      "July 2020",
      "August 2020",
      "September 2020"
    ],
    datasets: [
      {
        id: "1",
        label: "ECOM Werkplaats #1",
        stack: "1",
        target: "5",
        active: 1,
        backgroundColor: "#148f77",
        data: [
          2,
          1,
          2,
          0,
          1,
          0,
          1,
          1,
          1.5,
          2,
          1,
          2
        ]
      },
      {
        id: "1",
        label: "ECOM Werkplaats #1",
        stack: "1",
        target: 0,
        active: 1,
        faulty: true,
        backgroundColor: "#005d45",
        data: [
          1,
          0,
          2,
          1,
          0,
          0,
          2.5,
          1,
          1,
          0,
          0,
          1
        ]
      },
      {
        id: "105",
        label: "Handleiding",
        stack: "105",
        target: "20",
        active: 1,
        backgroundColor: "#BF1760",
        data: [
          1,
          0,
          1,
          0,
          2,
          1,
          0,
          1,
          0,
          3,
          1,
          2
        ]
      },
      {
        id: "105",
        label: "Handleiding",
        stack: "105",
        target: 0,
        active: 1,
        faulty: true,
        backgroundColor: "#8d002e",
        data: [
          0,
          0,
          0,
          0,
          0,
          0,
          0,
          0,
          0,
          0,
          0,
          0
        ]
      }
    ]
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



}
function dataChanges(){
var ctx = document.getElementById('mbchart').getContext('2d');
                      var myChart = new Chart(ctx, {
                      type: 'bar',
                                         data: {
                                          labels: [
                                            "October 2019",
                                            "November 2019",
                                            "December 2019",
                                            "January 2020",
                                            "February 2020",
                                            "March 2020",
                                            "April 2020",
                                            "May 2020",
                                            "June 2020",
                                            "July 2020",
                                            "August 2020",
                                            "September 2020"
                                          ],
                                          datasets: [
                                            {
                                              id: 504,
                                              label: "Alex Jongsma",
                                              stack: 504,
                                              target: 0,
                                              active: 1,
                                              backgroundColor: "#36A9E1",
                                              data: [
                                                0,
                                                0,
                                                2.5,
                                                1,
                                                0,
                                                2,
                                                0,
                                                2,
                                                0,
                                                3,
                                                0,
                                                3
                                              ]
                                            },
                                            {
                                              id: 504,
                                              label: "Alex Jongsma",
                                              stack: 504,
                                              target: 0,
                                              active: 1,
                                              faulty: true,
                                              backgroundColor: "#0477af",
                                              data: [
                                                0,
                                                0,
                                                0,
                                                0,
                                                0,
                                                0,
                                                0,
                                                0,
                                                0,
                                                0,
                                                0,
                                                "0"
                                              ]
                                            }
                                          ],
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
                                      }


function datachange(){
var ctx = document.getElementById('mbchart').getContext('2d');
var myChart = new Chart(ctx, {
type: 'bar',
data: {
                          labels: [
                            "October 2019",
                            "November 2019",
                            "December 2019",
                            "January 2020",
                            "February 2020",
                            "March 2020",
                            "April 2020",
                            "May 2020",
                            "June 2020",
                            "July 2020",
                            "August 2020",
                            "September 2020"
                          ],
                          datasets: [
                            {
                              id: "504",
                              label: "Alex Jongsma",
                              stack: "504",
                              target: 0,
                              active: "1",
                              backgroundColor: "#148f77",
                              data: [
                                0,
                                0,
                                3,
                                1.5,
                                2,
                                2.5,
                                0,
                                3,
                                0,
                                1,
                                0,
                                3
                              ]
                            },
                            {
                              id: "504",
                              label: "Alex Jongsma",
                              stack: "504",
                              target: 0,
                              active: "1",
                              faulty: true,
                              backgroundColor: "#005d45",
                              data: [
                                0,
                                0,
                                0,
                                0,
                                0,
                                0,
                                0,
                                0,
                                0,
                                0,
                                0,
                                "0"
                              ]
                            }
                          ],
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
                      }

var ctx = document.getElementById('mbchart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
                    // data: {
                            //     labels: ['October 2019','November 2019','December 2019' ,'January 2020','February 2020','March 2020','April 2020','May 2020','June 2020','July 2020','August 2020'],
                            //     datasets: [{
                            //         label: '# of Diagnosis',
                            //         data: [25, 10, 15,0,5,0,15,0,20,0,25],
                            //         backgroundColor: [
                            //             'rgba(255, 99, 132, 0.2)',
                            //             'rgba(54, 162, 235, 0.2)',
                            //             'rgba(255, 206, 86, 0.2)',
                            //             'rgba(75, 192, 192, 0.2)',
                            //             'rgba(153, 102, 255, 0.2)',
                            //             'rgba(255, 159, 64, 0.2)'
                            //         ],
                            //         borderColor: [
                            //             'rgba(255, 99, 132, 1)',
                            //             'rgba(54, 162, 235, 1)',
                            //             'rgba(255, 206, 86, 1)',
                            //             'rgba(75, 192, 192, 1)',
                            //             'rgba(153, 102, 255, 1)',
                            //             'rgba(255, 159, 64, 1)'
                            //         ],
                            //         borderWidth: 1
                            //     }]
                            // },

                            data: {
    labels: [
      "October 2019",
      "November 2019",
      "December 2019",
      "January 2020",
      "February 2020",
      "March 2020",
      "April 2020",
      "May 2020",
      "June 2020",
      "July 2020",
      "August 2020",
      "September 2020"
    ],
    datasets: [
      {
        id: "1",
        label: "ECOM Werkplaats #1",
        stack: "1",
        target: "5",
        active: 1,
        backgroundColor: "#148f77",
        data: [
          2,
          1,
          2,
          1,
          1,
          2,
          1,
          1,
          1,
          2,
          1,
          2
        ]
      },
      {
        id: "1",
        label: "ECOM Werkplaats #1",
        stack: "1",
        target: 0,
        active: 1,
        faulty: true,
        backgroundColor: "#005d45",
        data: [
          1,
          0,
          0,
          1,
          0,
          0,
          2,
          1,
          1,
          0,
          0,
          1
        ]
      },
      {
        id: "105",
        label: "Handleiding",
        stack: "105",
        target: "20",
        active: 1,
        backgroundColor: "#BF1760",
        data: [
          1,
          0,
          1,
          0,
          0,
          1,
          0,
          1,
          0,
          0,
          1,
          2
        ]
      },
      {
        id: "105",
        label: "Handleiding",
        stack: "105",
        target: 0,
        active: 1,
        faulty: true,
        backgroundColor: "#8d002e",
        data: [
          0,
          0,
          0,
          0,
          0,
          0,
          0,
          0,
          0,
          0,
          0,
          0
        ]
      }
    ]
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



                    <div id="detail" style="">
	<div class="reporting--grid">
		<div class="reporting--item">
			<table id="questions" class="mdl-data-table"><tbody><tr class="no-hover"><td class="mdl-data-table__cell--non-numeric" colspan="5"><h2 class="subtitle">Results per question</h2></td></tr><tr class="no-hover"><td class="subtitle mdl-data-table__cell--non-numeric">Question</td><td class="subtitle">Yes</td><td class="subtitle">No</td><td class="subtitle">NA</td><td class="subtitle">% No (ex. NA.)</td></tr><tr><td class="mdl-data-table__cell--non-numeric">Control accessories (navigation, telephone, etc.)</td><td>0</td><td>1</td><td>0</td><td>100%</td></tr><tr><td class="mdl-data-table__cell--non-numeric">Accessories documented in Vedoc</td><td>2</td><td>0</td><td>1</td><td></td></tr><tr><td class="mdl-data-table__cell--non-numeric">Advertising dealer pasted</td><td>2</td><td>0</td><td>0</td><td></td></tr><tr><td class="mdl-data-table__cell--non-numeric">Alarm certificate available</td><td>4</td><td>0</td><td>1</td><td></td></tr><tr><td class="mdl-data-table__cell--non-numeric">Alarm sticker pasted</td><td>1</td><td>0</td><td>1</td><td></td></tr><tr><td class="mdl-data-table__cell--non-numeric">Day counter set to zero</td><td>1</td><td>0</td><td>0</td><td></td></tr><tr><td class="mdl-data-table__cell--non-numeric">Delivery forms completed in WIS</td><td>4</td><td>0</td><td>1</td><td></td></tr><tr><td class="mdl-data-table__cell--non-numeric">EVA deregistered</td><td>4</td><td>0</td><td>1</td><td></td></tr><tr><td class="mdl-data-table__cell--non-numeric">Extra bottle of oil present</td><td>2</td><td>0</td><td>0</td><td></td></tr><tr><td class="mdl-data-table__cell--non-numeric">Has the vehicle been refuelled?</td><td>1</td><td>0</td><td>0</td><td></td></tr><tr><td class="mdl-data-table__cell--non-numeric">If tow bar, white plate, adapter and sticker with ball pressure available</td><td>2</td><td>0</td><td>0</td><td></td></tr><tr><td class="mdl-data-table__cell--non-numeric">Is the exterior of the vehicle well polished</td><td>4</td><td>0</td><td>1</td><td></td></tr><tr><td class="mdl-data-table__cell--non-numeric">Is the interior clean</td><td>2</td><td>0</td><td>0</td><td></td></tr><tr><td class="mdl-data-table__cell--non-numeric">KDM action performed and signed off</td><td>0</td><td>0</td><td>1</td><td></td></tr><tr><td class="mdl-data-table__cell--non-numeric">MB Contact OK</td><td>4</td><td>0</td><td>1</td><td></td></tr><tr><td class="mdl-data-table__cell--non-numeric">Oil on level</td><td>3</td><td>0</td><td>0</td><td></td></tr><tr><td class="mdl-data-table__cell--non-numeric">Previous navigation targets deleted</td><td>1</td><td>0</td><td>1</td><td></td></tr><tr><td class="mdl-data-table__cell--non-numeric">Previous phone data deleted</td><td>0</td><td>0</td><td>1</td><td></td></tr><tr><td class="mdl-data-table__cell--non-numeric">Radio programmed</td><td>1</td><td>0</td><td>0</td><td></td></tr><tr><td class="mdl-data-table__cell--non-numeric">Repair performed correctly</td><td>1</td><td>0</td><td>0</td><td></td></tr><tr><td class="mdl-data-table__cell--non-numeric">Subsequent options available and correctly installed</td><td>3</td><td>0</td><td>0</td><td></td></tr><tr><td class="mdl-data-table__cell--non-numeric">Technical inspection not OK?</td><td>1</td><td>0</td><td>0</td><td></td></tr><tr><td class="mdl-data-table__cell--non-numeric">Test</td><td>1</td><td>0</td><td>2</td><td></td></tr><tr><td class="mdl-data-table__cell--non-numeric">Test1</td><td>1</td><td>0</td><td>0</td><td></td></tr><tr><td class="mdl-data-table__cell--non-numeric">Vehicle tracking system on and off</td><td>2</td><td>0</td><td>1</td><td></td></tr><tr><td class="mdl-data-table__cell--non-numeric">Yellow jackets present?</td><td>1</td><td>0</td><td>1</td><td></td></tr><tr><td class="mdl-data-table__cell--non-numeric">test</td><td>1</td><td>0</td><td>0</td><td></td></tr><tr><td class="mdl-data-table__cell--non-numeric">Total</td><td>49</td><td>1</td><td>14</td><td>2%</td></tr></tbody></table>
		</div>
		<div class="reporting--item">
			<table id="employees" class="mdl-data-table"><tr class="no-hover"><td class="mdl-data-table__cell--non-numeric" colspan="5"><h2 class="subtitle">Results per employee</h2></td></tr><tr class="no-hover"><td class="subtitle mdl-data-table__cell--non-numeric">Mechanic</td><td class="subtitle mdl-data-table__cell--non-numeric">Quality Controls</td><td class="subtitle mdl-data-table__cell--non-numeric">Deviations</td><td class="subtitle mdl-data-table__cell--non-numeric">Errors</td><td class="subtitle mdl-data-table__cell--non-numeric">%</td></tr><tr data-userid="7664"><td class="mdl-data-table__cell--non-numeric">Colleges Modernization</td><td class="mdl-data-table__cell--non-numeric">2</td><td class="mdl-data-table__cell--non-numeric">1</td><td class="mdl-data-table__cell--non-numeric">1</td><td class="mdl-data-table__cell--non-numeric">50%</td></tr><tr><td class="mdl-data-table__cell--non-numeric">Alex Jongsma</td><td class="mdl-data-table__cell--non-numeric">4</td><td class="mdl-data-table__cell--non-numeric">0</td><td class="mdl-data-table__cell--non-numeric">0</td><td class="mdl-data-table__cell--non-numeric"></td></tr><tr><td class="mdl-data-table__cell--non-numeric">ECOM Monteur</td><td class="mdl-data-table__cell--non-numeric">0</td><td class="mdl-data-table__cell--non-numeric">0</td><td class="mdl-data-table__cell--non-numeric">0</td><td class="mdl-data-table__cell--non-numeric"></td></tr><tr><td class="mdl-data-table__cell--non-numeric">ECOM Werkplaatschef</td><td class="mdl-data-table__cell--non-numeric">0</td><td class="mdl-data-table__cell--non-numeric">0</td><td class="mdl-data-table__cell--non-numeric">0</td><td class="mdl-data-table__cell--non-numeric"></td></tr><tr><td class="mdl-data-table__cell--non-numeric">External 1</td><td class="mdl-data-table__cell--non-numeric">0</td><td class="mdl-data-table__cell--non-numeric">0</td><td class="mdl-data-table__cell--non-numeric">0</td><td class="mdl-data-table__cell--non-numeric"></td></tr><tr><td class="mdl-data-table__cell--non-numeric">External 2</td><td class="mdl-data-table__cell--non-numeric">0</td><td class="mdl-data-table__cell--non-numeric">0</td><td class="mdl-data-table__cell--non-numeric">0</td><td class="mdl-data-table__cell--non-numeric"></td></tr><tr><td class="mdl-data-table__cell--non-numeric">External 3</td><td class="mdl-data-table__cell--non-numeric">0</td><td class="mdl-data-table__cell--non-numeric">0</td><td class="mdl-data-table__cell--non-numeric">0</td><td class="mdl-data-table__cell--non-numeric"></td></tr><tr><td class="mdl-data-table__cell--non-numeric">MBC Monteur Monteur</td><td class="mdl-data-table__cell--non-numeric">0</td><td class="mdl-data-table__cell--non-numeric">0</td><td class="mdl-data-table__cell--non-numeric">0</td><td class="mdl-data-table__cell--non-numeric"></td></tr><tr><td class="mdl-data-table__cell--non-numeric">MBC Werkplaatschef</td><td class="mdl-data-table__cell--non-numeric">0</td><td class="mdl-data-table__cell--non-numeric">0</td><td class="mdl-data-table__cell--non-numeric">0</td><td class="mdl-data-table__cell--non-numeric"></td></tr><tr><td class="mdl-data-table__cell--non-numeric">Ola Spain</td><td class="mdl-data-table__cell--non-numeric">0</td><td class="mdl-data-table__cell--non-numeric">0</td><td class="mdl-data-table__cell--non-numeric">0</td><td class="mdl-data-table__cell--non-numeric"></td></tr><tr><td class="mdl-data-table__cell--non-numeric">Rogier Schoonhoven</td><td class="mdl-data-table__cell--non-numeric">0</td><td class="mdl-data-table__cell--non-numeric">0</td><td class="mdl-data-table__cell--non-numeric">0</td><td class="mdl-data-table__cell--non-numeric"></td></tr></table>
		</div>
		<div class="reporting--item reporting--grow" style="padding-top: 72px; position: relative; height:70vh;">
			<canvas id="chartdetail" style="display: none;"></canvas>
		</div>
	</div>
	<table id="deviations" class="mdl-data-table"><tr class="no-hover"><td class="mdl-data-table__cell--non-numeric" colspan="7"><h2 class="subtitle">List of deviations</h2></td></tr><tr class="no-hover"><td class="subtitle mdl-data-table__cell--non-numeric">Date</td><td class="subtitle mdl-data-table__cell--non-numeric">Inspector</td><td class="subtitle mdl-data-table__cell--non-numeric">Mechanic</td><td class="subtitle mdl-data-table__cell--non-numeric">WO number</td><td class="subtitle mdl-data-table__cell--non-numeric">License plate</td><td class="subtitle mdl-data-table__cell--non-numeric">Question</td><td class="subtitle mdl-data-table__cell--non-numeric">Description</td></tr><tr data-userid="7664"><td class="mdl-data-table__cell--non-numeric">09/04/2020</td><td class="mdl-data-table__cell--non-numeric">Colleges Modernization</td><td class="mdl-data-table__cell--non-numeric">Colleges Modernization</td><td class="mdl-data-table__cell--non-numeric">16092810</td><td class="mdl-data-table__cell--non-numeric">0825</td><td class="mdl-data-table__cell--non-numeric">Control accessories (navigation, telephone, etc.)</td><td class="mdl-data-table__cell--non-numeric">sdsdsdsd</td></tr></table>
	<div class="spacer spacer-height-80"></div>
</div>

	</div>

</div>

			<div class="loading-overlay">
				<div class="loading-positioner">
					<div class="mdl-spinner mdl-spinner--single-color mdl-js-spinner is-active is-upgraded" data-upgraded=",MaterialSpinner"><div class="mdl-spinner__layer mdl-spinner__layer-1"><div class="mdl-spinner__circle-clipper mdl-spinner__left"><div class="mdl-spinner__circle"></div></div><div class="mdl-spinner__gap-patch"><div class="mdl-spinner__circle"></div></div><div class="mdl-spinner__circle-clipper mdl-spinner__right"><div class="mdl-spinner__circle"></div></div></div><div class="mdl-spinner__layer mdl-spinner__layer-2"><div class="mdl-spinner__circle-clipper mdl-spinner__left"><div class="mdl-spinner__circle"></div></div><div class="mdl-spinner__gap-patch"><div class="mdl-spinner__circle"></div></div><div class="mdl-spinner__circle-clipper mdl-spinner__right"><div class="mdl-spinner__circle"></div></div></div><div class="mdl-spinner__layer mdl-spinner__layer-3"><div class="mdl-spinner__circle-clipper mdl-spinner__left"><div class="mdl-spinner__circle"></div></div><div class="mdl-spinner__gap-patch"><div class="mdl-spinner__circle"></div></div><div class="mdl-spinner__circle-clipper mdl-spinner__right"><div class="mdl-spinner__circle"></div></div></div><div class="mdl-spinner__layer mdl-spinner__layer-4"><div class="mdl-spinner__circle-clipper mdl-spinner__left"><div class="mdl-spinner__circle"></div></div><div class="mdl-spinner__gap-patch"><div class="mdl-spinner__circle"></div></div><div class="mdl-spinner__circle-clipper mdl-spinner__right"><div class="mdl-spinner__circle"></div></div></div></div>
				</div>
			</div>

		</div>
    <!-- <footer class="mdl-mini-footer">
      <div class="mdl-mini-footer__left-section">
        <div class="mdl-logo">MB-Diag</div>
        <ul class="mdl-mini-footer__link-list">
          <li><a href="http://www.ecom.nl/">© 2020 ECOM</a></li>
          <li>Version 1.2.14</li>
          <li><a href="https://mbdiag.cloud.ecom.nl/about">ABOUT</a></li>
        </ul>
      </div>
    </footer> -->
	</main>

	</div></div>
</div>
	</div>

	<div id="toast-message" class="mdl-js-snackbar mdl-snackbar" data-upgraded=",MaterialSnackbar">
		<div class="mdl-snackbar__text" id="toast-message__text"></div>
		<button class="mdl-snackbar__action" type="toast-message__button" aria-hidden="true"></button>
	</div>

	<button id="add-media-to-field" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored fixed-action-btn" data-upgraded=",MaterialButton">
		<i class="material-icons">photo_camera</i>
		<label>Add media</label>
	</button>

	<dialog id="modal__dialog" class="mdl-dialog">
		<h4 class="mdl-dialog__title">{title}</h4>
		<div class="mdl-dialog__content" style="max-height: 621.6px;"></div>
		<div class="mdl-dialog__actions"></div>
		<div class="mdl-dialog__loading"><div class="mdl-spinner mdl-spinner--single-color mdl-js-spinner is-active is-upgraded" data-upgraded=",MaterialSpinner"><div class="mdl-spinner__layer mdl-spinner__layer-1"><div class="mdl-spinner__circle-clipper mdl-spinner__left"><div class="mdl-spinner__circle"></div></div><div class="mdl-spinner__gap-patch"><div class="mdl-spinner__circle"></div></div><div class="mdl-spinner__circle-clipper mdl-spinner__right"><div class="mdl-spinner__circle"></div></div></div><div class="mdl-spinner__layer mdl-spinner__layer-2"><div class="mdl-spinner__circle-clipper mdl-spinner__left"><div class="mdl-spinner__circle"></div></div><div class="mdl-spinner__gap-patch"><div class="mdl-spinner__circle"></div></div><div class="mdl-spinner__circle-clipper mdl-spinner__right"><div class="mdl-spinner__circle"></div></div></div><div class="mdl-spinner__layer mdl-spinner__layer-3"><div class="mdl-spinner__circle-clipper mdl-spinner__left"><div class="mdl-spinner__circle"></div></div><div class="mdl-spinner__gap-patch"><div class="mdl-spinner__circle"></div></div><div class="mdl-spinner__circle-clipper mdl-spinner__right"><div class="mdl-spinner__circle"></div></div></div><div class="mdl-spinner__layer mdl-spinner__layer-4"><div class="mdl-spinner__circle-clipper mdl-spinner__left"><div class="mdl-spinner__circle"></div></div><div class="mdl-spinner__gap-patch"><div class="mdl-spinner__circle"></div></div><div class="mdl-spinner__circle-clipper mdl-spinner__right"><div class="mdl-spinner__circle"></div></div></div></div></div>
	</dialog>

	<dialog id="modal__confirm" class="mdl-dialog">
		<h4 class="mdl-dialog__title">{title}</h4>
		<div class="mdl-dialog__content"></div>
		<div class="mdl-dialog__actions"></div>
		<div class="mdl-dialog__loading"><div class="mdl-spinner mdl-spinner--single-color mdl-js-spinner is-active is-upgraded" data-upgraded=",MaterialSpinner"><div class="mdl-spinner__layer mdl-spinner__layer-1"><div class="mdl-spinner__circle-clipper mdl-spinner__left"><div class="mdl-spinner__circle"></div></div><div class="mdl-spinner__gap-patch"><div class="mdl-spinner__circle"></div></div><div class="mdl-spinner__circle-clipper mdl-spinner__right"><div class="mdl-spinner__circle"></div></div></div><div class="mdl-spinner__layer mdl-spinner__layer-2"><div class="mdl-spinner__circle-clipper mdl-spinner__left"><div class="mdl-spinner__circle"></div></div><div class="mdl-spinner__gap-patch"><div class="mdl-spinner__circle"></div></div><div class="mdl-spinner__circle-clipper mdl-spinner__right"><div class="mdl-spinner__circle"></div></div></div><div class="mdl-spinner__layer mdl-spinner__layer-3"><div class="mdl-spinner__circle-clipper mdl-spinner__left"><div class="mdl-spinner__circle"></div></div><div class="mdl-spinner__gap-patch"><div class="mdl-spinner__circle"></div></div><div class="mdl-spinner__circle-clipper mdl-spinner__right"><div class="mdl-spinner__circle"></div></div></div><div class="mdl-spinner__layer mdl-spinner__layer-4"><div class="mdl-spinner__circle-clipper mdl-spinner__left"><div class="mdl-spinner__circle"></div></div><div class="mdl-spinner__gap-patch"><div class="mdl-spinner__circle"></div></div><div class="mdl-spinner__circle-clipper mdl-spinner__right"><div class="mdl-spinner__circle"></div></div></div></div></div>
	</dialog>

	<div id="map-hangar">
		<div id="map-element"></div>
	</div>

	<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="pswp__bg"></div>
		<div class="pswp__scroll-wrap">
			<div class="pswp__container">
				<div class="pswp__item"></div>
				<div class="pswp__item"></div>
				<div class="pswp__item"></div>
			</div>
			<div class="pswp__ui pswp__ui--hidden">
				<div class="pswp__top-bar">
					<div class="pswp__counter"></div>
					<button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
					<button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
					<button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
					<div class="pswp__preloader">
						<div class="pswp__preloader__icn">
							<div class="pswp__preloader__cut">
								<div class="pswp__preloader__donut"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
					<div class="pswp__share-tooltip"></div>
				</div>
				<button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
				<button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
				<div class="pswp__caption">
					<div class="pswp__caption__center"></div>
				</div>
			</div>
		</div>
	</div>

	<div id="mdl-loading--fullscreen" class="loading-overlay">
		<div class="loading-positioner">
			<div class="mdl-spinner mdl-spinner--single-color mdl-js-spinner is-active is-upgraded" data-upgraded=",MaterialSpinner"><div class="mdl-spinner__layer mdl-spinner__layer-1"><div class="mdl-spinner__circle-clipper mdl-spinner__left"><div class="mdl-spinner__circle"></div></div><div class="mdl-spinner__gap-patch"><div class="mdl-spinner__circle"></div></div><div class="mdl-spinner__circle-clipper mdl-spinner__right"><div class="mdl-spinner__circle"></div></div></div><div class="mdl-spinner__layer mdl-spinner__layer-2"><div class="mdl-spinner__circle-clipper mdl-spinner__left"><div class="mdl-spinner__circle"></div></div><div class="mdl-spinner__gap-patch"><div class="mdl-spinner__circle"></div></div><div class="mdl-spinner__circle-clipper mdl-spinner__right"><div class="mdl-spinner__circle"></div></div></div><div class="mdl-spinner__layer mdl-spinner__layer-3"><div class="mdl-spinner__circle-clipper mdl-spinner__left"><div class="mdl-spinner__circle"></div></div><div class="mdl-spinner__gap-patch"><div class="mdl-spinner__circle"></div></div><div class="mdl-spinner__circle-clipper mdl-spinner__right"><div class="mdl-spinner__circle"></div></div></div><div class="mdl-spinner__layer mdl-spinner__layer-4"><div class="mdl-spinner__circle-clipper mdl-spinner__left"><div class="mdl-spinner__circle"></div></div><div class="mdl-spinner__gap-patch"><div class="mdl-spinner__circle"></div></div><div class="mdl-spinner__circle-clipper mdl-spinner__right"><div class="mdl-spinner__circle"></div></div></div></div>
		</div>
	</div>

	<script type="text/javascript">

		var currentContainer = $('.sliding-page').not('#page-fragment');
		var current_field = null;

		var googleMaps = {
			map: null,
			you: null,
			path: null,
			watch: null
		};

		$(function(){
			componentHandler.upgradeDom();
			$('body').trigger('TweenAnimationDone');

			$('#add-media-to-field').click(function(){
				var form = $('#upload_file_all').find('.upload-form');
				var data = form.fileupload('option', 'formData');
				data.object_type = 'diagnosis';
				data.object_id = diagnosis_id;
				data.field = current_field;
				form.fileupload('option', 'formData', data).find('input[type=file]').click();
			});

			document.addEventListener('keydown', function(event){
				var prevent = false;
				if(event.keyCode === 8){
					prevent = true;
					var element = $(event.srcElement || event.target);
					if(!element.prop('readonly') && !element.prop('disabled')){
						if(element.get(0).isContentEditable){
							prevent = false;
						} else if(element.is('input')){
							if (['text', 'password', 'file', 'search', 'email', 'number', 'date', 'color', 'datetime', 'datetime-local', 'month', 'range', 'search', 'tel', 'time', 'url', 'week'].indexOf(element.attr('type').toLowerCase()) > -1) {
								prevent = false;
							}
						} else if(element.is('textarea')){
							prevent = false;
						}
					}
							} else if(event.keyCode === 123){
					prevent = true;
							}
				if(prevent){
					event.preventDefault();
					return false;
				}
			});
		});

	</script>
<iframe id="history-iframe" src="javascript:&quot;&quot;" style="display: none;" src="./MB-Diag_files/saved_resource.html"></iframe>


</div><?php /**PATH D:\13thsept\resources\views/inc/QualityControl/statistics.blade.php ENDPATH**/ ?>