<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js'></script>
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js'></script>
<link rel='stylesheet' type='text/css' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css' />

<?php echo $this->Html->css('jquery.zweatherfeed.css'); ?>

<link href="http://live.datatables.net/media/css/demo_table.css" rel="stylesheet">


<?php echo $this->Html->script('jquery.zweatherfeed.min.js'); ?>
<?php echo $this->Html->script('dataTable.js'); ?>
<?php echo $this->Html->script('jquery.qtip-1.0.0-rc3.min.js'); ?>

<script type="text/javascript">
       $(document).ready(function(){
       		       $('#recentActivity').dataTable( {
       		       		       "iDisplayLength": 7,
       		       		       "bLengthChange": false,
       		       		       "bFilter": false
       		       });
       		      // $("#divTest2").autoscroll();
        });
    </script>
    

<?php echo $this->Html->css('bootstrap.min'); ?>

<?php
            	    if($current_user['job_title']=='Super Admin')
            	    {
            	       echo $this->Html->css('administratorHome');
            	       
            	    }
            	    elseif($current_user['job_title']=='Administrator')
            	    {
            	    	 echo $this->Html->css('technicianHome');
            	    }
                    else
                    {
            	        echo $this->Html->css('technicianHome');
                    }
 ?>
<script>
	$(function() {
		$( "#calendar" ).datepicker({
		   dateFormat: 'dd-mm-yy',
		   onSelect: function(dateText, inst) { 
		       window.location = '/review/reminders/index/'+dateText;
		   }
		});
		 $(".ui-state-default").attr("title","Click to set reminder on this date.");
		$('#divBBS2').weatherfeed(['ASXX0075']);
		                
              $("#divNotesReminder").qtip({
                   content: 'Click the calendar above to create new reminder.',
                   style: { 
                        width: 200,
                        padding: 5,
                        background: '#A2D959',
                        color: 'white',
                        textAlign: 'center',
                        border: {
                        width: 7,
                        radius: 5,
                        color: '#A2D959'
                    },
                  tip: 'bottomLeft',
                 name: 'dark' 
             }
});
              
	});
</script>
<style>
.qtip {
  top: 320.083313px !important;
  left: 750.5px !important;
}
</style>
 <div id="location">
  <?php echo $this->Html->image ('HomeIcon.png', array ('alt'=>'Current location', 'id'=>'locationLogo', 'border'=>'0')); ?> 
 </div>
 <div id="currentLocation">Current location: <?php echo $this->Html->link ('Home',array ('controller'=>'users','action'=>'index')); ?> </div>

<div id="content">
<?php echo $this->Session->flash(); ?>

           <div id="divBBS2">
           </div>      
           
           <div id="calendar">
           </div>
 <table id="tbBottom" style="clear:both;"> 
  <tr>
      <td style="width:410px">            
          <div  class="test">
              <?php echo $this->Html->image ('messages/events.png', array('alt'=>'Urgent','title'=>'Urgent','class'=>'boxIcon')); ?>
               Upcoming Appointments
         </div>
        <div id="divAppt">
           <table id="recentActivity" class="table table-bordered">
              <thead>
                 <tr>
                    <th></th>
                    <th>Start Time</th>
                    <th>Patient</th>
                    <th>Subject</th>                    
                 </tr>
              </thead>
              <tbody>
             <?php foreach ($results as $appts): ?> 
           
             <tr class="good">  
                <td style="width:30px;">
                   <?php echo $this->Html->image ('messages/alarm.png', array ('alt'=>'Urgent','title'=>'Urgent','class'=>'alarm')); ?> 
                </td>
            
                <td> 
                   <?php echo date("d-M-Y H:i:s",strtotime($appts['Appointment']['startTime'])); ?>
               </td> 
             <td> 
                <?php echo $appts['Patient']['given_name'];?>&nbsp;                
                <?php  echo $appts['Patient']['surname'];?>
               
             </td>
            <td> 
                <?php echo $appts['Appointment']['title']; ?> 
            </td>
        
        </tr> 
        <?php endforeach; ?>    
              </tbody>
               </table> 
        </div>
      </td>
      <td>
         <div  class="test" id="divNotesReminder">
              <?php echo $this->Html->image ('Clock-icon.png', array('alt'=>'Urgent','title'=>'Urgent','class'=>'boxIcon')); ?>
               My Reminders
         </div>
         <div id="divStickNotes">
           <div id="divTest2">
           
             <?php foreach ($reminders as $reminder): ?> 
                 <div class="remiderPoint">
                     <p class="pTime">
                        <?php     $date = date('l F jS, Y',  strtotime($reminder['Reminder']['reminder_time']));
                                  echo $date;
                       ?></p>
                     <p class="pDesc"><?php echo $reminder['Reminder']['description'] ?></p>
                 </div>
             <?php endforeach; ?> 
             
            </div>
         </div>
      </td>
  </tr>
</table>

</div>
