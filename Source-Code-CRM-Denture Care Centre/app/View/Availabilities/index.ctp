<?php echo $this->Html->css('reset'); ?>
<?php echo $this->Html->css('bootstrap.min'); ?>
	<link rel='stylesheet' type='text/css' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css' />
        <?php echo $this->Html->css('jquery.weekcalendar'); ?>
        <?php echo $this->Html->css('demo'); ?>
        <?php echo $this->Html->css('default'); ?>

    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js'></script>
    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js'></script>
  	  
  <script>
     $(function() {
		$("#datepicker").datepicker({
       		       dateFormat : 'DD, d MM, yy'
	       });
	});
  </script>
  
  <?php echo $this->Html->script('date'); ?>
  <?php echo $this->Html->script('jquery.weekcalendar'); ?>
  <?php echo $this->Html->script('availabilityCalendar'); ?>

 <div id="location">
  <?php echo $this->Html->image ('HomeIcon.png', array ('alt'=>'Current location', 'id'=>'locationLogo', 'border'=>'0')); ?> 
 </div>
 <div id="currentLocation">Current location: <?php
   $fullName=$technician_name['0']['User']['given_name'].' '.$technician_name['0']['User']['surname'];
 echo $this->Html->link ('Availability -> '.$fullName,''); ?> </div>

<div id="content">
<?php echo $this->Session->flash(); ?>


  <form>
    <?php   echo $this->Form->input('technicainId',array('label'=>false,'hidden'=>'hidden','value'=>$technicainId));?>
  </form>
  
  <p><label class="lblLine" for="datepicker" style="margin-left: 14px;">Date: </label> <input type="text" id="datepicker">
  <label class="lblLine" for="selectClinic" style="margin-left: 14px;">Clinic: </label> 
  <?php   echo $this->Form->input('clinic', array('id'=>'selectClinic','label'=>false,'type'=>'select','div'=>false,'options'=>$clinics));?>
           <button id="btnSaveSettings" class="btn btn-success" type="button">Go</button>
</p>
	<div id='calendar'></div>
	<div id="event_edit_container">
		<form>
			<input type="hidden" />
			<ul>
				<li>
					<span>Date: </span><span class="date_holder"></span> 
					
				</li>
				<li>
					<input type="hidden"  name="id"/>
				</li>
				
				<li>
					<label for="start">Start Time: </label><select name="start"><option value="">Select Start Time</option></select>
				</li>
				<li>
					<label for="end">End Time: </label><select name="end"><option value="">Select End Time</option></select>
				</li>
				<li>
					<label for="body">Additional Information: </label><textarea name="body"></textarea>
				</li>
			</ul>
			<div class="ui-widget">
</div>
		</form>
	</div>
	

</div>






