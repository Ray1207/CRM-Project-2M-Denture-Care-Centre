<?php echo $this->Html->css('bootstrap.min'); ?>
<?php echo $this->Html->css('jquey-ui'); ?>
<?php echo $this->Html->css('jquery-ui-1.8.23.custom.css'); ?>
<?php echo $this->Html->script('jquery'); ?>
<?php echo $this->Html->script('jquey-ui-min.js'); ?>
<?php echo $this->Html->script('jquery.qtip-1.0.0-rc3.min.js'); ?>
    <style>
   .demo{
   width:770px;
   margin:10px auto;
   
   }
   .tabIframe{
   width:750px;
   height:700px;
   border: none !important;
   margin-left:-15px;
   }
</style>
<script>
	$(function() {
		$( "#tabs" ).tabs({
			ajaxOptions: {
				error: function( xhr, status, index, anchor ) {
					$( anchor.hash ).html(
						"Couldn't load this tab. We'll try to fix this as soon as possible. " );
				}
			}
		});
		$( "#accordion" ).accordion({
			autoHeight: false
		}); 
		$( "#accordion2" ).accordion({
			autoHeight: false
		});
		$(".patientChart").qtip({
                      content: 'Top section is bar chart.\n Bottom section is pie chart and line chart.',
                      position: {
                                type: 'fixed'
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
              	$(".aptChart").qtip({
                      content: 'Top section is bar chart.\n Bottom section is pie chart and line chart.',
                      position: {
                                type: 'fixed'
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
	});
</script>

 <div id="location">
  <?php echo $this->Html->image ('HomeIcon.png', array ('alt'=>'Current location', 'id'=>'locationLogo', 'border'=>'0')); ?> 
 </div>
 <div id="currentLocation">Current location: 
 <?php echo $this->Html->link ('Reports',''); ?>
 </div>
 
 <div id="content">
    <?php echo $this->Session->flash(); ?>
     <div class="demo">

       <div id="tabs">
	<ul>
		<li><a href="#tabs-1">Patient Report</a></li>
		<li class="patientChart"><a href="#tabs-2">Patient Charts</a></li>
		<li><a href="#tabs-3">Daily Appointment</a></li>
		<li class="aptChart"><a href="#tabs-4">Appointment Charts</a></li>
	</ul>
	<div id="tabs-1">
	   <iframe class="tabIframe" src="/review/reports/feed"></iframe>
	</div>
	<div id="tabs-2">
	   <div id="accordion">
	         <h3><a href="#">Bar Chart</a></h3>
	             <div>
		             <iframe class="tabIframe" src="/review/reports/patientChart"></iframe>
	              </div>
	         <h3><a href="#">Pie Chart</a></h3>
	              <div>
                            <iframe class="tabIframe" src="/review/reports/pieChart"></iframe>
	               </div>
	         <h3><a href="#">Line Chart</a></h3>
	              <div>
                            <iframe class="tabIframe" src="/review/reports/patientLinechart"></iframe>
	               </div>
	
          </div>
	</div>
	<div id="tabs-3">
	       <iframe class="tabIframe" src="/review/appointments/dailyApt"></iframe>  
	</div>
	<div id="tabs-4">
	  <div id="accordion2">
	         <h3><a href="#">Bar Chart</a></h3>
	             <div>
		             <iframe class="tabIframe" src="/review/reports/aptChart"></iframe>
	              </div>
	         <h3><a href="#">Pie Chart</a></h3>
	              <div>
                            <iframe class="tabIframe" src="/review/reports/aptPie"></iframe>
	               </div>
	         <h3><a href="#">Line Chart</a></h3>
	              <div>
                            <iframe class="tabIframe" src="/review/reports/aptLinechart"></iframe>
	               </div>
	
          </div>
	       
	</div>
        </div>

     </div>
</div>

