<?php echo $this->Form->create('JobTitle', array('action'=>'edit')); ?>
   <fieldset class="fieldsetDetails">
     <legend>Details</legend>
     
     <table style="float:left;">
     <tr>
        <td style="padding-top:10px;"> <?php  echo $this->Form->input('job_title_id',array('label'=>false,'value'=>$this->data['JobTitle']['job_title_id'],'type'=>'hidden'));          
                   
				    echo $this->Form->input('description',array('id'=>'txtDesc','label'=>'Description:','div'=>false));
				    
					?>
      </tr>
       
     </table>
     <?php echo $this->Form->button('Save',array('type'=>'submit','id'=>'btnSave','class'=>'btn btn-success','div'=>false,'onclick'=>"if($('#txtDesc').val()==''){alert('Job title can not be empty!');$('#txtDesc').focus();return false;}"));?>
      </fieldset>
    <?php echo $this->Form->end() ?>
    