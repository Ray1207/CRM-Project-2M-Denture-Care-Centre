<?php echo $this->Html->css('bootstrap.min'); ?>
<link rel='stylesheet' type='text/css' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css' />
<?php echo $this->Html->css('jquery-ui-1.8.23.custom.css'); ?>
<?php echo $this->Html->script('jquery'); ?>
    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js'></script>
<script>
	$(function() {
		$( "#accordion" ).accordion({
			autoHeight:false,
			active:1
		});
	});
</script>
<style>
   .tabIframe{
   width:782px;
   border: none !important;
   margin-left:-22px;
   }
#divNotes .tabIframe{
	height:700px;
}
</style>
 <div id="location">
  <?php echo $this->Html->image ('HomeIcon.png', array ('alt'=>'Current location', 'id'=>'locationLogo', 'border'=>'0')); ?> 
 </div>
 <div id="currentLocation">Current location: 
 <?php echo $this->Html->link ('Patient',array ('controller'=>'patients','action'=>'searchPatient')); ?> &gt;&gt;
 <?php echo $this->Html->link ('Clinical Notes',''); ?>
 </div>

  <div id="content">
<div id="accordion">
	<h3><a href="#">Denture Job Status Progress</a></h3>
	<div>
            <?php echo "<iframe class='tabIframe' src='/review/JobStatuses/edit/$patientId'></iframe>"; ?>
	</div>
	<h3><a href="#">Clinical notes</a></h3>
	<div id="divNotes">
          <?php echo "<iframe class='tabIframe' src='/review/clinical_notes/index/$patientId'></iframe>" ?>
	</div>
	
</div>
</div>


    
 