<?php echo $this->Html->css('bootstrap.min'); ?>
<?php echo $this->Html->css(array('print'), 'stylesheet', array('media' => 'print'));?>
<?php echo $this->Html->css('clinicalNotes'); ?>
<?php echo $this->Html->script('jquery'); ?>
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js'></script>
      <link rel='stylesheet' type='text/css' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css' />
      <link href="http://live.datatables.net/media/css/demo_table.css" rel="stylesheet">
      <?php echo $this->Html->script('dataTable.js'); ?>
       <?php echo $this->Html->script('jquery.qtip-1.0.0-rc3.min.js'); ?>
<script type="text/javascript">
       $(document).ready(function(){
       		       $('#tbNotes').dataTable( {
       		       		       "iDisplayLength": 5,
       		       		       "bLengthChange": false,
       		       		       "bFilter": false
       		       });
       		      $(".view").qtip({
                      content: 'View/Edit clinical notes.',
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
                    tip: 'topRight',
                    name: 'dark'
                  }
              });
             $(".delete").qtip({
                      content: 'Delete this clinical notes.',
                      position: {
                                type: 'fixed'
                      },
                      style: { 
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
                    tip: 'topRight',
                    name: 'dark'
                  }
              });
        });
</script>
 
 <div id="content">
 
 <div id="divFlahMsg"> <?php echo $this->Session->flash(); ?> </div>
 <div style="height:30px; width:740px">
 <h4><?php echo $patient_name['0']['Patient']['given_name']." ".$patient_name['0']['Patient']['surname']; ?></h4>
 
 <?php echo $this->Form->hidden('',array('id'=>'txtPatientId','value'=>$patientId)); ?>
 
<?php echo "<input type='button' class='btn btn-success' id='btnNew' value='New Notes'>"; ?>
</div>
<div id="divTable">
  <table id="tbNotes" class="table table-bordered">
     <thead>
         <tr>
            <th>Title</th>
            <th>Technician Name</th>
            <th>Created Datetime</th>
            <th>Modified Datetime</th>
            <th style="width: 100px;">Action</th>
         </tr>
      </thead>
      <tbody>
            <?php foreach ($results as $notes): ?> 
           
           <tr>        
             <td> 
                <?php echo $notes['ClinicalNote']['title']; ?> 
             </td> 
             <td> 
                <?php echo $notes['User']['given_name'];?> &nbsp;                
                <?php echo $notes['User']['surname'];?>
             </td>
            <td> 
                <?php echo date("d-M-Y H:i:s",strtotime($notes['ClinicalNote']['created'])); ?>
            </td>
            <td> 
                <?php echo date("d-M-Y H:i:s",strtotime($notes['ClinicalNote']['modified'])); ?>
            </td>
            <td>

             <?php
           $cid = $notes['ClinicalNote']['clinical_notes_id'];
           echo $this->Html->image ('view.png', array ('alt'=>'view clinical notes', 'id'=>$cid, 'class'=>'view', 'border'=>'0','url'=>'#','onclick'=>"var id=this.id;
				$.get('/project19/review/clinical_notes/edit'+'/'+id,
					function(data){
						$('#divAjax').html(data);
						$('#txtTitle').focus();
				});
				return false;")); ?>     
			&nbsp; &nbsp;	
               <?php echo $this->Html->image ('trash.png', array ('alt'=>'delete this notes', 'class'=>'delete', 'border'=>'0','url'=> array('controller' => 'clinical_notes', 'action' => 'delete', $notes['ClinicalNote']['clinical_notes_id'],$notes['ClinicalNote']['patient_id']),'onclick'=>"return confirm('Are you sure to delete this notes?');")); ?>               
              
            </td>
        
        </tr> 
        <?php endforeach; ?> 
      </tbody>
    </table>
    </div>
    <div id="divAjax">
    
    </div>
    
    
    
    
</div>

<?php echo $this->Html->script('clinicalNote'); ?>
