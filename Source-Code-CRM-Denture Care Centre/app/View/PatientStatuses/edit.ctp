<?php echo $this->Form->create('PatientStatus', array('action'=>'edit')); ?>
   <fieldset class="fieldsetDetails">
     <legend>Patient Status Details</legend>
     
     <table style="float:left;">
     <tr>
        <td style="padding-top:10px;"> <?php  echo $this->Form->input('status_id',array('label'=>false,'value'=>$this->data['PatientStatus']['status_id'],'type'=>'hidden'));          
                   
				    echo $this->Form->input('name',array('id'=>'txtName','label'=>'Name:','div'=>false));
				
		?></td>
       <td style="padding-top:10px;"> <?php  echo $this->Form->input('sortOrder',array('type'=>'text','id'=>'txtSort','label'=>'Sort Order:','div'=>false));?></td>
        </tr><tr>
		<td colspan="2" style="padding-top:10px;"> <?php					
					echo $this->Form->input('description',array('id'=>'txtDesc','label'=>'Desc:','type'=>'textarea','div'=>false));
         ?></td>
      </tr>
       
     </table>
     <?php echo $this->Form->button('Save',array('type'=>'submit','id'=>'btnSave','class'=>'btn btn-success','div'=>false,'onclick'=>"if($('#txtName').val()==''){alert('Status name cannnot be empty!');$('#txtName').focus();return false;}else if($('#txtDesc').val()==''){alert('Patient status description can not be empty!');$('#txtDesc').focus();return false;}"));?>
      </fieldset>
    <?php echo $this->Form->end() ?>
    