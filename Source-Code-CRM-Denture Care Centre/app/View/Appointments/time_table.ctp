<?php echo $this->Html->css('reset'); ?>
<?php echo $this->Html->css('bootstrap.min'); ?>
    
<link rel='stylesheet' type='text/css' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css' />

<?php echo $this->Html->css('jquery.weekcalendar'); ?>
<?php echo $this->Html->css('demo'); ?>
<?php echo $this->Html->css('default'); ?>
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js'></script>
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js'></script>
 
  <?php echo $this->Html->script('date'); ?>
  <?php echo $this->Html->script('jquery.weekcalendar'); ?>
  <?php echo $this->Html->script('timeTableJs'); ?>
  <script>
     $(function() {
		$("#datepicker").datepicker({
       		       dateFormat : 'DD, d MM, yy'
	       });
	});
  </script>
  
 <div id="location">
  <?php echo $this->Html->image ('HomeIcon.png', array ('alt'=>'Current location', 'id'=>'locationLogo', 'border'=>'0')); ?> 
  </div>
 <div id="currentLocation">Current location: 
 <?php echo $this->Html->link ('Staff',array ('controller'=>'users','action'=>'searchAdmin')); ?> &gt;&gt;
 <?php echo $this->Html->link ('Timetable',''); ?>
 </div>

<div id="content">
<?php echo $this->Session->flash(); ?>
<form>
<p><label class="lblLine" for="datepicker" style="margin-left: 14px;">Date: </label> <input type="text" id="datepicker">
  <label class="lblLine" for="selectClinic" style="margin-left: 14px;">Clinic: </label> 
  <?php   echo $this->Form->input('clinic', array('id'=>'selectClinic','label'=>false,'type'=>'select','div'=>false,'options'=>$clinics));?>
           <button id="btnSaveSettings" class="btn btn-success" type="button">Go</button>
</p>
</form>
	<div id='calendar'></div>
	<div id="event_edit_container">
				<form>
			<input type="hidden" />
			<ul>
				<li>
					<span>Date: </span><span class="date_holder"></span> 
					
				</li>
				<li>
					<input type="hidden" name="id" disabled="disabled"/>
				</li>
				<li>
					<label for="title">Title: </label><input type="text" name="title" disabled="disabled"/>
				</li>
				        
					
                                        <?php   echo $this->Form->input('patcient', array('label'=>'Patient','disabled'=>'disabled','type'=>'select','div'=>false,'name'=>'patient','options'=>$patients));?>
					
				</li>
				<li>
					<label for="start">Start Time: </label><select name="start" disabled="disabled"><option value="">Select Start Time</option></select>
				</li>
				<li>
					<label for="end">End Time: </label><select name="end" disabled="disabled"><option value="">Select End Time</option></select>
				</li>
				<li>
					<?php   echo $this->Form->input('technician_id', array('label'=>'Technician:','disabled'=>'disabled','type'=>'select','name'=>'technician','options'=>$technicians));?>
				</li>
				<li>
					<label for="body">Additional Information: </label><textarea name="body" disabled="disabled"></textarea>
				</li>
			</ul>
			<div class="ui-widget">
</div>
		</form>
	</div>
	

</div>





