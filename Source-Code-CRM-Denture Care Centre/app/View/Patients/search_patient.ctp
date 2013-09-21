<?php echo $this->Html->script('jquery'); ?>
<?php echo $this->Html->css('bootstrap.min'); ?>
 <?php echo $this->Html->css('search_patient'); ?>
      <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js'></script>
      <link rel='stylesheet' type='text/css' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css' />
      <link href="http://live.datatables.net/media/css/demo_table.css" rel="stylesheet">
      <?php echo $this->Html->script('dataTable.js'); ?>
      <?php echo $this->Html->script('jquery.qtip-1.0.0-rc3.min.js'); ?>
<script type="text/javascript">
       $(document).ready(function(){
       		       $('#resultsTable').dataTable( {
       		       		       "iDisplayLength": 11,
       		       		       "bLengthChange": false,
       		       		       "bFilter": false
       		       });
       		  $(".view").qtip({
                      content: 'View/Edit patient details.',
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
             $(".delete").qtip({
                      content: 'Delete this patient.',
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
                    tip: 'topLeft',
                    name: 'dark'
                  }
              });
             $(".clicnialNotes").qtip({
                      content: 'View/Edit clinical notes.',
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
 <?php echo $this->Html->link ('Patient',array ('controller'=>'patients','action'=>'searchPatient')); ?>
 </div>
 
 <div id="content">
<div id="divFlahMsg"><?php echo $this->Session->flash(); ?> </div>

<div id="searchBox">
<?php  
    echo $this->Form->create('Patient');  
    echo $this->Form->input('selection',array('type'=>'select','label'=>false,'options'=>array('Given Name','Surname','Patient Type')));
    echo $this->Form->input('value',array('type'=>'text', 'label'=>false));
    echo $this->Form->button('Search',array('type'=>'submit','id'=>'btnSearch','class'=>'btn btn-success',));
    echo $this->Form->end();
    
    $url = array('controller'=>'patients', 'action'=>'step1');
    echo $this->Form->button('New Patient',array('id'=>'btnNew','class'=>'btn btn-success','type'=>'button','onclick'=> "location.href='".$this->Html->url($url)."'"));
    
?> 
</div>    
    
    
    
<div id="divTable">
<table id="resultsTable" class="table table-bordered"> 
<thead>
    <tr>        
        <th >Surname</th> 
        <th >Given Name</th>
        <th >Gender</th>
        <th >Type</th>
        <th style="width:209px;" >Action</th>
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
            <?php echo $patient['Patient']['gender']; ?>
        </td>
        <td> 
            <?php echo $patient['PatientType']['description']; ?>
        </td>
        <td>
           
           <?php echo $this->Html->image ('view.png', array ('alt'=>'view patient details', 'class'=>'view', 'border'=>'0','url'=> array('controller' => 'patients', 'action' => 'view', $patient['Patient']['patient_id']))); ?>  

           &nbsp; &nbsp; 
           <?php echo $this->Html->image ('trash.png', array ('alt'=>'delete this patient', 'class'=>'delete', 'border'=>'0','url'=> array('controller' => 'patients', 'action' => 'delete', $patient['Patient']['patient_id']),'onclick'=>"return confirm('Are you sure to delete this patient?');")); ?>  

           &nbsp; &nbsp; 
           <?php
              if ($current_user['job_title']==2 || $current_user['job_title']==3)
              {
              	  echo $this->Html->image ('notes.png', array ('alt'=>'Clinical Notes', 'class'=>'clicnialNotes', 'border'=>'0','url'=> array('controller' => 'clinical_notes', 'action' => 'noteslist', $patient['Patient']['patient_id']))); 
              }

              ?>  

          
        </td>
        
    </tr> 
<?php endforeach; ?> 
</tbody>
</table> 

</div>
</div>