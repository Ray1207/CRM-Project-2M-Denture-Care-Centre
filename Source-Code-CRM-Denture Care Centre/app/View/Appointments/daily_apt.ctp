<?php echo $this->Html->script('jquery'); ?>
<?php echo $this->Html->css('bootstrap.min'); ?>
<link rel='stylesheet' type='text/css' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css' />	 
<?php echo $this->Html->css('report'); ?>
<?php echo $this->Html->css(array('print'), 'stylesheet', array('media' => 'print'));?>
<?php echo $this->Html->script('jquey-ui-min.js'); ?>
<link href="http://live.datatables.net/media/css/demo_table.css" rel="stylesheet">
<?php echo $this->Html->script('dataTable.js'); ?>
<script type="text/javascript">
       $(document).ready(function(){
       		       $('#tb').dataTable( {
       		       		       "iDisplayLength": 10,
       		       		       "bLengthChange": false,
       		       		       "bFilter": false
       		       });
        });
</script>
<script>
$(function() {
       $(".datepicker").datepicker({
       		       dateFormat : 'DD, d MM, yy'
	   });
       
});
</script>
<style>
input{
	width:245px;
}
select{
	width:245px;
}
</style>
 <body class="bodyClinic">
 <div id="divReportTitle" style="width:200px;margin:0px auto; margin-top:20px;"><h3>Daily Appointment</h3></div>
<?php  
   	//Date picker
	echo $this->Form->create('Appointment'); ?> 
<br />
	<div id="divStart">
	   <?php
	      $a = date('l, d F, Y',time());
	      if(isset($this->data['Appointment']['queryDate']) && $this->data['Appointment']['queryDate']!=null)
	      {
	      	      $a=$this->data['Appointment']['queryDate'];
	      }
	       echo $this->Form->input('queryDate', array('label'=>'Date:','class'=>'datepicker','type'=>'text','div'=>false,'value'=>$a));
	  ?>
	</div>
	<div id="divEnd"><?php echo $this->Form->input('clinic', array('id'=>'selectClinic','label'=>'Clinic:','type'=>'select','div'=>false,'options'=>$clinics));?></div>
    <?php echo $this->Form->button('Print',array('id'=>'btnPrint','class'=>'btn btn-success','type'=>'button','onclick'=> "window.print();"));
			echo $this->Form->button('Search',array('type'=>'submit','class'=>'btn btn-success'));
    
   
   echo $this->Form->end();?>
      
<div id="resultsTable">
  <table class="table table-bordered" id="tb">
     <thead>
         <tr>
            <th>Subject</th>
            <th >Patient Name</th>            
            <th>Technician</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Location</th>
         </tr>
      </thead>
      <tbody>
	<?php foreach ($results as $apt): ?> 
           
           <tr>        
             <td> 
                <?php echo $apt['Appointment']['title']; ?> 
             </td> 
             <td> 
                <?php echo $apt['Patient']['given_name']." ".$apt['Patient']['surname']; ?> 
             </td>
             <td> 
                <?php echo $apt['User']['given_name']." ".$apt['User']['surname'];?>
             </td> 
             <td> 
                <?php echo date("H:i",strtotime($apt['Appointment']['startTime']))."     ";?>
             </td>
             <td> 
                <?php echo date("H:i",strtotime($apt['Appointment']['endTime']))."     ";?>
             </td>
             <td> 
                <?php echo $apt['Clinic']['city'];?>
             </td>
        </tr> 
        <?php endforeach; ?> 
      </tbody>
    </table>
    </div>
</body>
<?php echo $this->Html->script('jquery-ui'); ?>