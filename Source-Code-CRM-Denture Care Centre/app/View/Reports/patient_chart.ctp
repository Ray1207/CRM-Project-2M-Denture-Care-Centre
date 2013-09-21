<?php echo $this->Html->css('bootstrap.min'); ?>
         <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
       	<?php echo $this->Html->script('Highcharts'); ?>
         <script src="http://code.highcharts.com/modules/exporting.js"></script>
         <?php echo $this->Html->script('jquery.qtip-1.0.0-rc3.min.js'); ?>
<script type="text/javascript">
$(function () {
		$(".bigger").qtip({
                      content: 'Click to have a bigger view.',
                      position: {
                                adjust: {
                                       x: -50
                                 }
                      },
                      style: { 
                      	    left:  150,
                            width: 185,
                            padding: 5,
                            background: '#A2D959',
                            color: 'white',
                            textAlign: 'center',
                            border: {
                            width: 7,
                            radius: 5,
                            color: '#A2D959'
                            },
                    tip: 'topLeft',
                    name: 'dark'
                  }
              });
    var chart;
    $(document).ready(function() {  
    		    var value=$("#ReportYearYear").find("option:selected").val();
 var options = {
      chart: {
                renderTo: 'chart',
                type: 'bar',
            },
            title: {
                text: 'Monthly New Patient Amount'
            },
            subtitle: {
                text: 'Denture Care Centre'
            },
            xAxis: {
                categories: [
                    'Jan',
                    'Feb',
                    'Mar',
                    'Apr',
                    'May',
                    'Jun',
                    'Jul',
                    'Aug',
                    'Sep',
                    'Oct',
                    'Nov',
                    'Dec'],
                title: {
                    text: 'Month'
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'New Patient Amount',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            tooltip: {
                formatter: function() {
                    return ''+
                        this.series.name +': '+ this.y;
                }
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -100,
                y: 100,
                floating: true,
                borderWidth: 1,
                backgroundColor: '#FFFFFF',
                shadow: true
            },
            credits: {
                enabled: false
            },
            series: []

};

$.ajax({
		type: "POST",
        url: "/review/reports/getBarData",
        data:{start : $("#ReportYearYear").find("option:selected").val()},
        success: function(data) {   
        	var records = eval(data);
            var recordCount = records.length;
            for (i=0; i<recordCount; i++) {    
                options.series.push({
                    name: records[i]['name'],
                   data: records[i]['data']
           }); 
	    }
	   
           chart = new Highcharts.Chart(options);
        }
    });
             
    });
    
});
	 	 
         </script>
         <style>
         #ReportPatientChartForm{
         	 width:500px;
         	 margin:0px auto;
         }
         #btnView{
         	 width:70px;
         	 margin-left:20px;
         }
         #ReportYearYear{
         	 margin-top:8px;
         }
         #lbl{
         	 display:inline;
         	font-weight:bold;
         }
         .bigger{
         	 margin-left:20px;
         }
         </style>
         <body style="padding-left:0px;"> 
         <div>
         <?php echo $this->Form->create('Report', array('action'=>'patientChart')); ?>
         <?php
         $start='';
         if( isset($year)){$start=$year;}
         
         echo "<label id='lbl'>Year: </label>";
         echo $this->Form->year('year',2000,date('Y'),array('value'=>$start));
         echo $this->Form->button('View',array('type'=>'submit','id'=>'btnView','class'=>'btn btn-success'));
         ?>
         <a href="/review/reports/patientChart" target="_blank" class='bigger btn btn-success'>Open in a new tab</a>
         <?php
         echo $this->Form->end();
         ?>
        
         </div>
<div id="chart" style="width: 700px; height: 1500px; margin: 0 auto"></div>
</body>
