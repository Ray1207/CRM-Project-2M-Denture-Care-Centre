<?php echo $this->Html->css('bootstrap.min'); ?>
         <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
      <!-- 	<script src="http://code.highcharts.com/highcharts.js"></script> -->
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
    	    	 var options = {
            chart: {
                renderTo: 'chart',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'Appointment amount shares at Denture Care Centre, 2012'
            },
            tooltip: {
                formatter: function() {
                    return '<b>'+ this.point.name +'</b>: '+ this.percentage.toFixed(2) +' %';
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                        },
                        showInLegend: true
                    }
                
            },
            series: []
        };	
        
        $.ajax({
        		type: "POST",       		
        url: "/review/reports/getAptPieData",
        data:{start : $("#ReportYearYear").find("option:selected").val()},
        success: function(data) { 

        	var good = [];
        	var records = eval(data);
            var recordCount = records.length;
            for (i=0; i<recordCount; i++) { 
            	    var good2 = [];
            	    good2[0]=records[i][0];
                    good2[1]=records[i][1];
            	    good.push(good2);
	    }
	    
        	options.series.push({
                type: 'pie',
                name: 'Appointment amount share',
                data: good         
            });

        chart = new Highcharts.Chart(options);
        }
    });
    	
        
    });
    
});
</script>
<style>
         #ReportAptPieForm{
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
         <?php echo $this->Form->create('Report', array('action'=>'aptPie')); ?>
         <?php
         $start='';
         if( isset($year)){$start=$year;}
         
         echo "<label id='lbl'>Year: </label>";
         echo $this->Form->year('year',2000,date('Y'),array('value'=>$start));
         echo $this->Form->button('View',array('type'=>'submit','id'=>'btnView','class'=>'btn btn-success'));
         ?>
         <a href="/review/reports/aptPie" target="_blank" class='bigger btn btn-success'>Open in a new tab</a>
         <?php
         echo $this->Form->end();
         ?>
        
         </div>
<div id="chart" style="width:650px; height: 400px; margin: 0 auto"></div>
</body>
