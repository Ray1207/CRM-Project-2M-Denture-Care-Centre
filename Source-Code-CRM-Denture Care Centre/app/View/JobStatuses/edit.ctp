<?php echo $this->Html->css('bootstrap.min'); ?>
<style>
/* this uses the same elements as the default 'message' class */
.flash-message-warning {
  background-image: url('/project19/review/img/messages/warning.png');
  background-repeat: no-repeat;
  background-position: 230px 1px;
  color: #9F6000;
  text-align: center;
  background-color:#FFFABF;
  font-size: 100%;
  font-weight: bold;
  width: 750px;
  margin-left: 14px;
  margin-top:3px;
  border: 1px solid #9F6000;
}
.flash-message-success{
  font-family: Arial, sans-serif;
  background-image: url('/project19/review/img/messages/success.png');
  background-repeat: no-repeat;
  background-position: 210px 1px;
  color: #4F8A10;
  text-align: center;
  background-color:#DFF2BF;
  font-size: 100%;
  font-weight: bold;
  width: 755px;
  margin-left: 20px;
  margin-top:3px;
  border: 1px solid #4F8A10;
}
.fieldset{width:751px;}
.divDental{
        width:185px;
	float:left;
}
.statusCheck{
margin-right:10px !important;
}
#btnUpdate{
float:right;
margin-top:10px;
margin-right:10px;
}
</style>
 <div id="divFlahMsg"><?php echo $this->Session->flash(); ?> </div>
<?php echo $this->Form->create('JobStatus', array('action'=>'edit')); ?>

   <fieldset class="fieldset">
   <legend style="font-style: italic; font-size:15px;">Denture Job Status <?php if(!empty($results[0])){ echo '- '.$results[0]['Patient']['given_name'].' '.$results[0]['Patient']['surname'];} ?></legend>
  <?php echo "<input type='hidden' name='id' value=$patient ></input>"; ?>
   
<?php foreach ($statuses as $status): ?> 
          <div class="divDental">
           
            <?php
             if (in_array($status['PatientStatus']['status_id'], $jobStatuses))
             {
                  echo "<input class='statusCheck' type='checkbox' name='statusList[]' value='".$status['PatientStatus']['status_id']."' checked='checked'>";                                 	   
             } 
             else
             {
                  echo "<input class='statusCheck' type='checkbox' name='statusList[]' value='".$status['PatientStatus']['status_id']."'>";   
             }
               echo $status['PatientStatus']['description'];
            ?> 
          </div>
<?php endforeach; ?>     
 </fieldset>
 <?php echo $this->Form->end(array('label' => 'Update', 'id'=>'btnUpdate', 'class'=>'btn btn-success', 'div' => false)); ?>
    