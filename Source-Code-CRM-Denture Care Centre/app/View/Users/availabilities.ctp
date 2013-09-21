
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
  <?php echo $this->Html->script('availabilityCalendar'); ?>
	

 <div id="location">
  <?php echo $this->Html->image ('HomeIcon.png', array ('alt'=>'Current location', 'id'=>'locationLogo', 'border'=>'0')); ?> 
 </div>
 <div id="currentLocation">Current location:
  <?php echo $this->Html->link ('Staff',array ('controller'=>'users','action'=>'searchAdmin')); ?> &gt;&gt; <?php echo $this->Html->link ('Staff Details',array ('controller'=>'users','action'=>'view',$staff_id)); ?> &gt;&gt; <?php echo $this->Html->link ('Availabilities',''); ?>
 
 </div>

<div id="content">
<?php echo $this->Session->flash(); ?>
	<div id='calendar'></div>
	<div id="event_edit_container">
		<form>
			<input type="hidden" />
			<ul>
				<li>
					<span>Date: </span><span class="date_holder"></span> 
				</li>
				<li>
					<label for="start">Start Time: </label><select name="start"><option value="">Select Start Time</option></select>
				</li>
				<li>
					<label for="end">End Time: </label><select name="end"><option value="">Select End Time</option></select>
				</li>
				<li>
					<label for="title">Availability: </label><input type="text" name="title" disabled="disabled" />
				</li>
				
				
			</ul>
		</form>
	</div>
	

</div>






