<?php echo $this->Html->script('jquery'); ?>
<?php echo $this->Html->css('bootstrap.min'); ?>
<link rel='stylesheet' type='text/css' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css' />	 

 <?php echo $this->Html->css('report'); ?>
  <?php echo $this->Html->css(array('print'), 'stylesheet', array('media' => 'print'));?>
  <?php echo $this->Html->css('jquery-ui.css'); ?>
  
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js'></script>
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
 <body class="bodyClinic">
 <div id="divReportTitle" style="width:200px;margin:0px auto; margin-top:20px;"><h3>Patient Report</h3></div>
<?php  
   	//Date picker
	echo $this->Form->create('Report'); ?> 
<br />
	<div id="divStart"><?php echo $this->Form->input('startDate', array('label'=>'Start Date:','class'=>'datepicker','type'=>'text','div'=>false));?> </div>
	<div id="divEnd"><?php echo $this->Form->input('endDate', array('label'=>'End Date: ','class'=>'datepicker','type'=>'text','div'=>false));?></div>
    <?php echo $this->Form->button('Print',array('id'=>'btnPrint','class'=>'btn btn-success','type'=>'button','onclick'=> "window.print();"));
			echo $this->Form->button('Search',array('type'=>'submit','class'=>'btn btn-success'));
    
  //  $url = array('controller'=>'reports', 'action'=>'print');
   // echo $this->Form->button('Print',array('id'=>'btnPrint','class'=>'btn','type'=>'button','onclick'=> "location.href='".$this->Html->url($url)."'"));
   
   echo $this->Form->end();?>
      
<div id="resultsTable">
  <table class="table table-bordered" id="tb">
     <thead>
         <tr>
            <th>Surname</th>
            <th>Given Name</th>
            <th>Patient's Type</th>
            <th>Joined Since</th>
         </tr>
      </thead>
      <tbody>
	<?php foreach ($results as $patient): ?> 
           
           <tr>        
             <td> 
                <?php echo $patient['Patient']['surname']; ?> 
             </td> 
             <td> 
                <?php echo $patient['Patient']['given_name']; ?> 
             </td>
             <td> 
                <?php echo $patient['PatientType']['description'];?>
             </td> 
             <td> 
                <?php echo date("d-m-Y",strtotime($patient['Patient']['created']));?>
             </td>
        </tr> 
        <?php endforeach; ?> 
      </tbody>
    </table>
    </div>
</body>
<?php echo $this->Html->script('jquery-ui'); ?>