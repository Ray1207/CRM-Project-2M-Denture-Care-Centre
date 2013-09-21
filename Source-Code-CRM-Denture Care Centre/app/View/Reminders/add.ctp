<?php echo $this->Form->create('Reminder', array('action'=>'add')); ?>
     <fieldset class="fieldsetDetails">
     <legend>New Reminder</legend>
     
     <table style="float:left;">
     <tr>
		<td style="padding-top:10px;">
		<?php echo $this->Form->input('description',array('label'=>'Notes:','id'=>'txtDesc','div'=>false,'type'=>'textarea'));
		      echo $this->Form->input('reminder_time',array('label'=>false,'value'=>$reminderTime,'dateFormat'=>'YMD','type'=>'hidden'));  
		       echo $this->Form->input('staff_id',array('label'=>false,'value'=>$current_user['staff_id'],'type'=>'hidden'));  
		?></td>
		
      </tr>      
     </table>
          
     
     <?php
           $url = array('controller' => 'Reminders', 'action' => 'index',$reminderTime);
           echo $this->Form->button('Cancel',array('id'=>'btnCancel','type'=>'button','class'=>'btn btn-success','onclick'=> "location.href='".$this->Html->url($url)."'"));
     ?>
           <?php echo $this->Form->button('Save',array('type'=>'submit','id'=>'btnSave','class'=>'btn btn-success','div'=>false,'onclick'=>"if($('#txtDesc').val()==''){alert('Notes can not be empty!');$('#txtDesc').focus();return false;}"));?>

     </fieldset>
<?php echo $this->Form->end() ?>
    
 