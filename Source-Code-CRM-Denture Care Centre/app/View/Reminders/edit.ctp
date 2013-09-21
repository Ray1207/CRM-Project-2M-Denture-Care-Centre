<?php echo $this->Form->create('Reminder', array('action'=>'edit')); ?>
   <fieldset class="fieldsetDetails">
     <legend>Details</legend>
     
     <table style="float:left;">
     <tr>
        <td style="padding-top:10px;">
        <?php  echo $this->Form->input('reminder_id',array('label'=>false,'value'=>$this->data['Reminder']['reminder_id'],'type'=>'hidden'));   
             echo $this->Form->input('reminder_time',array('label'=>false,'value'=>$this->data['Reminder']['reminder_time'],'type'=>'hidden')); 
              echo $this->Form->input('description',array('id'=>'txtDesc','label'=>'Notes:','div'=>false,'type'=>'textarea'));
	?>
      </tr>
       
     </table>
     <?php echo $this->Form->button('Save',array('type'=>'submit','id'=>'btnSave','class'=>'btn btn-success','div'=>false,'onclick'=>"if($('#txtDesc').val()==''){alert('Notes can not be empty!');$('#txtDesc').focus();return false;}"));?>
      </fieldset>
    <?php echo $this->Form->end() ?>
    