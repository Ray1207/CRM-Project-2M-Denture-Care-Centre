<?php echo $this->Html->css('bootstrap.min'); ?>
<link rel='stylesheet' type='text/css' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css' />
<?php echo $this->Html->css('jquery-ui-1.8.23.custom.css'); ?>
<?php echo $this->Html->script('jquery'); ?>
    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js'></script>
<script>
	$(function() {
		$( "#tabs" ).tabs({
			ajaxOptions: {
				error: function( xhr, status, index, anchor ) {
					$( anchor.hash ).html(
						"Couldn't load this tab. We'll try to fix this as soon as possible. " +
						"If this wouldn't be a demo." );
				}
			}
		});
	});
</script>
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

 <div id="location">
  <?php echo $this->Html->image ('HomeIcon.png', array ('alt'=>'Current location', 'id'=>'locationLogo', 'border'=>'0')); ?> 
 </div>
 <div id="currentLocation">Current location: <?php echo $this->Html->link ('System Administration',''); ?> </div>

<div id="content">

<div class="demo">

<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Clinics</a></li>
		<li><a href="#tabs-2">Staff Job Titles</a></li>
		<li><a href="#tabs-3">Denture Job Statuses</a></li>
		<li><a href="#tabs-4">Patient Types</a></li>
	</ul>
	<div id="tabs-1">
	   <iframe class="tabIframe" src="/review/clinics"></iframe>
	</div>
	<div id="tabs-2">
	   <iframe class="tabIframe" src="/review/jobTitles"></iframe>
	</div>
	<div id="tabs-3">
	   <iframe class="tabIframe" src="/review/patientStatuses"></iframe>
	</div>
	<div id="tabs-4">
	   <iframe class="tabIframe" src="/review/PatientTypes"></iframe>
	</div>
</div>

</div>
</div>





