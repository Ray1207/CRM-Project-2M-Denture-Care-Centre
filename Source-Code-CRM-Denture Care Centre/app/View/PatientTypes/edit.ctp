<style>
#txtDesc{
width:300px;
}
</style>
<?php echo $this->Form->create('PatientType', array('action'=>'edit')); ?>
   <fieldset class="fieldsetDetails">
     <legend>Patient Type Details</legend>
     
     <table style="float:left;">
     <tr>
        <td style="padding-top:10px;"> <?php  echo $this->Form->input('patient_type_id',array('label'=>false,'value'=>$this->data['PatientType']['patient_type_id'],'type'=>'hidden'));          
                   
				    echo $this->Form->input('description',array('id'=>'txtDesc','label'=>'Description:','div'=>false));
					?>
      </tr>
       
     </table>
     <?php echo $this->Form->button('Save',array('type'=>'submit','id'=>'btnSave','class'=>'btn btn-success','div'=>false,'onclick'=>"if($('#txtDesc').val()==''){alert('Patient type can not be empty!');$('#txtDesc').focus();return false;}"));?>
      </fieldset>
    <?php echo $this->Form->end() ?>
    