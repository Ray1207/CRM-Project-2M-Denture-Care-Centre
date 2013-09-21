<?php echo $this->Form->create('PatientStatus', array('action'=>'add')); ?>
     <fieldset class="fieldsetDetails">
     <legend>New Patient Status</legend>
     
     <table style="float:left;">
     <tr>
        <td style="padding-top:10px;"> <?php          
                    echo $this->Form->input('status_id',array('label'=>false,'value'=>$status_id,'type'=>'hidden'));		
                    echo $this->Form->input('name',array('label'=>'Status Name:','id'=>'txtName'));
		?></td>
		<td style="padding-top:10px;"> <?php
					echo $this->Form->input('description',array('label'=>'Description:','id'=>'txtDesc'));
         ?></td>
      </tr>
       
     </table>
          
     
     <?php
           $url = array('controller' => 'patientStatuses', 'action' => 'index');
           echo $this->Form->button('Cancel',array('id'=>'btnCancel','type'=>'button','class'=>'btn btn-success','onclick'=> "location.href='".$this->Html->url($url)."'"));
     ?>
           <?php echo $this->Form->button('Save',array('type'=>'submit','id'=>'btnSave','class'=>'btn btn-success','div'=>false,'onclick'=>"if($('#txtName').val()==''){alert('Status name cannnot be empty!');$('#txtName').focus();return false;}else if($('#txtDesc').val()==''){alert('Patient Status can not be empty!');$('#txtDesc').focus();return false;}"));?>

     </fieldset>
<?php echo $this->Form->end() ?>
    
 