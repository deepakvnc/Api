            <div class="mdl-layout__tab-panel" id="statistics_panel">

                <div class="mdl-grid center-items" style="user-select: none; -webkit-user-select: none;">
                    <div class="mdl-cell mdl-cell--1-col mdl-cell--2-col-tablet mdl-cell--2-col-phone field-row mdl-zebra__desktop mdl-zebra__phone" id="select_start_date">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group" readonly="readonly"><input readonly="readonly" type="text" name="display_start_date" value="August 12,2020" id="display_start_date" class="mdl-textfield__input" /><label class="mdl-textfield__label" for="display_start_date">Start date</label></div>
                    </div>
                    <div class="mdl-cell mdl-cell--1-col mdl-cell--2-col-tablet mdl-cell--2-col-phone field-row mdl-zebra__desktop mdl-zebra__phone" id="select_end_date">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group" readonly="readonly"><input readonly="readonly" type="text" name="display_end_date" value="August 12,2021" id="display_end_date" class="mdl-textfield__input" /><label class="mdl-textfield__label" for="display_end_date">End date</label></div>
                    </div>
                    <div class="mdl-cell mdl-cell--2-col mdl-cell--4-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop mdl-zebra__phone">
                        <div class="mdl-selectcontainer">
                            <div class="mdl-selectfield mdl-js-selectfield is-dirty" tabindex="-1">
                                <select class="fullwidth mdl-selectfield__select filter" id="group" name="group" value="">
                                    <option value="" selected>&nbsp;</option>
                                    <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($group->id); ?>"><?php echo e($group->name); ?></option>                                        
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <label class="mdl-textfield__label" for="group">Groups</label></div>
                        </div>
                    </div>
                    <div class="mdl-cell mdl-cell--2-col mdl-cell--4-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop mdl-zebra__phone">
                        <div class="mdl-selectcontainer">
                            <div class="mdl-selectfield mdl-js-selectfield is-dirty" tabindex="-1">
                                <select id="user" name="user" value="" class="fullwidth mdl-selectfield__select">
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
                                </select>
                                <label class="mdl-textfield__label" for="user">Users</label></div>
                        </div>
                    </div>
                    <div class="breadcrumb mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--4-col-phone mdl-zebra__desktop mdl-zebra__phone">
                        <ol>
                        </ol>
                    </div>
                </div>
                <div style="position: relative; height:65vh;width:100vw; user-select:none; -webkit-user-select: none;">
                    <canvas id="mbchart"></canvas>
                </div> <!-- Canvas Script -->

</div>
<?php echo csrf_field(); ?>

<script>

var start, end;

function Statistics(canvas, breadcrumbs){
   // $(function(canvas, breadcrumbs)  {
        
    var _this = this;
    var _canvas = canvas;
    var _breadcrumbs = breadcrumbs;
    var _chart = null;
    var _data = null;
    var _period = 'year';
    var _period_id = undefined;
    Chart.defaults.global.defaultFontColor = '#989898';

    this.getData = function(keep_period){

        console.log("Dealer - ",currentContainer.find('#user'));
        
        if(!keep_period){
            _period = 'year';
            _period_id = undefined;
        }

        $.post(
            '/statistics/getDiagnosisData',
            {
                '_token' :  "<?php echo e(csrf_token()); ?>",
                period: _period,
                period_id: _period_id,
                start: start.time.format('YYYYMMDD'),
                end: end.time.format('YYYYMMDD'),
                dealer: '<?php echo Auth::user()->dealer_id?>',
                dealer_location: '<?php echo Auth::user()->dealer_location_id?>',
            	group: currentContainer.find('#group').val(),
				user: currentContainer.find('#user').val()
            },
            function(response){
                if(response.hasOwnProperty('token')){
                    _token = response.token;
                }
                if(response.hasOwnProperty('success') && response.success) {
                // alert(response);
                    _data = response.data;
                    _this.createChart(_data);
                } else {
                    console.log("this is response" + response);
                }
            }
        );
    }

    this.createBreadcrumb = function(title, period, period_id){
           
        
        if(!title || !period){      
            title = start.time.format('LL') + ' - ' + end.time.format('LL');
            period = 'year';
            period_id = undefined;
            _breadcrumbs.empty();
        }
        _breadcrumbs.find('li').removeClass('inactive');
        _breadcrumbs.append('<li class="inactive" data-period="' + period + (typeof period_id !== "undefined" ? '" data-period_id="' + period_id : '') + '"><a href="#">' + title + '</a><i class="material-icons">keyboard_arrow_right</i></li>');
    }

    this.setPeriod = function(period, period_id){
        _period = period;
        _period_id = period_id;
    }

    this.createChart = function (data) {
        
        if(_chart){
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
                                if(t.length) {
                                    return [
                                        c.datasets[t[0].datasetIndex].label,
                                        t[0].xLabel
                                    ];
                                }
                                return '';
                            },
                            label: function(l,c) {
                                var id = c.datasets[l.datasetIndex].id;
                                var d1 = c.datasets[l.datasetIndex];
                                var d2 = c.datasets[c.datasets.findIndex(function(e, i) {
                                    return e.id === id && i !== l.datasetIndex;
                                })];
                                if(d1.hasOwnProperty('faulty')) {
                                    var d3 = d1;
                                    d1 = d2;
                                    d2 = d3;
                                }
                                return [
                                    'Completed: ' + d1.data[l.index],
                                    'On hand: ' + d2.data[l.index]
                                ];
                            }
                        }
                    },
                    legend: {
                        onClick: function(t, e) {
                            var a = this.chart.getDatasetMeta(e.datasetIndex);
                            var b = this.chart.getDatasetMeta(e.datasetIndex + 1);
                            a.hidden = b.hidden = (a.hidden === null ? !this.chart.data.datasets[e.datasetIndex].hidden : null);
                            this.chart.update();
                        },
                        position: 'right',

                        labels: {
                            filter: function(item){
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
                    onClick: _this.clickHandler,
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
                }
            });
        
            
        }
    }

    this.clickHandler = function(e, a){
        if(a.length && a[0].hasOwnProperty('_index') && _data.nextType !== false){
            _period = _data.nextType;
            _period_id = parseInt(a[0]._index) + parseInt(_data.periodAdditive);
            _this.createBreadcrumb(_chart.data.labels[parseInt(a[0]._index)], _period, _period_id);
            _this.getData(true);
        }
    }
}

var stats = null;



// $('body').one('TweenAnimationDone', function(){
    $(function()  {        

    start = new mdDateTimePicker.default({
        type: 'date',
        future: moment().add(10, 'years'),
        trigger: document.getElementById('display_start_date'),
        cancel: 'Cancel',
        init: moment("12082019" ,"DDMMYYYY")		
    });

    $('.select_start_date, #select_start_date').on('click', function(event){
        event.preventDefault();
        start.toggle();
        return false;
    });

    $('#display_start_date').on('onOk', function(){
        this.value = start.time.format('LL');
      //  this.parentNode.MaterialTextfield.checkDirty();

        if(end && start.time.valueOf() > end.time.valueOf()){
            end.time = start.time;
            $('#display_end_date').trigger('onOk');
        } else if(stats){
            stats.createBreadcrumb();
            stats.getData();
        }
    }).trigger('onOk');


    end = new mdDateTimePicker.default({
        type: 'date',
        future: moment().add(10, 'years'),
        trigger: document.getElementById('display_end_date'),
        cancel: 'Cancel',
        init: moment()
    });

    $('.select_end_date, #select_end_date').on('click', function(event){
        event.preventDefault();
        end.toggle();
        return false;
    });

    $('#display_end_date').on('onOk', function(){
        this.value = end.time.format('LL');
      //  this.parentNode.MaterialTextfield.checkDirty();
        if(stats){
            stats.createBreadcrumb();
            stats.getData();
        }
    }).trigger('onOk');

    
    stats = new Statistics(document.getElementById('mbchart'), currentContainer.find('.breadcrumb').find('ol'));
    stats.createBreadcrumb();
    stats.getData();

   

    currentContainer.find('#dealer, #dealer_location, #group, #user').on('change', function(e){
        var $this = $(e.target);
        if($this.hasClass('filter')){
            console.log("Iside Filter");
            if($this.attr('id') === 'group' && $this.val() === '' && currentContainer.find('#dealer_location').length){
                currentContainer.find('#dealer_location').trigger('change');
            } else if($this.attr('id') === 'dealer_location' && $this.val() === '' && currentContainer.find('#dealer').length){
                currentContainer.find('#dealer').trigger('change');
            } else {
                $.get(
                    '/statistics/getFilters',
                    {   
                        type: $this.attr('id'),
                        id: $this.val() ? $this.val() : 0
                    },
                    function(response){
                        if(response.hasOwnProperty('token')){
                            this.token = response.token;
                        }
                        if(response.hasOwnProperty('success') && response.success) {
                            for(var key in response.filters){
                                if(response.filters.hasOwnProperty(key)){
                                    var element = currentContainer.find('#' + key);
                                    var html = '';
                                    for(var i = 0; i < response.filters[key].length; i++){
                                        html += '<option value="' + response.filters[key][i].id + '"' + (response.filters[key][i].id === '' ? ' selected' : '') + '>' + response.filters[key][i].text + '</option>';
                                    }
                                    element.html(html);
                                    var parent = element.parent();
                                    parent.attr('data-upgraded', '').removeClass('is-dirty').find('a, .mdl-menu__container').remove();
                                    componentHandler.upgradeElement(parent.get(0));
                                }
                            }
                            stats.getData(($this.attr('id') !== 'year'));
                        } else {
                            console.log(response);
                        }
                    }.bind(this)
                );
            }
        } else {
            stats.getData(true);
        }
    });

    currentContainer.find('.breadcrumb').on('click', 'li', function(e){
        e.preventDefault();
        var $this = $(this);
        $this.addClass('inactive').nextAll().remove();
        stats.setPeriod($this.attr('data-period'), $this.attr('data-period_id'));
        stats.getData(true);
    });
})
</script><?php /**PATH C:\xampp\htdocs\latest\16thsept1\resources\views/Diagnosis/Tabs/reports.blade.php ENDPATH**/ ?>