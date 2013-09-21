<style>
#txtDesc{
width:300px;
}
</style>
<?php echo $this->Form->create('PatientType', array('action'=>'add')); ?>
     <fieldset class="fieldsetDetails">
     <legend>New Patient Types</legend>
     
     <table style="float:left;">
     <tr>
        <td style="padding-top:10px;"> <?php          
                    echo $this->Form->input('patient_type_id',array('label'=>false,'value'=>$patient_type_id,'type'=>'hidden'));		
		?></td>
		<td style="padding-top:10px;"> <?php
					echo $this->Form->input('description',array('label'=>'Description:','id'=>'txtDesc'));
         ?></td>
      </tr>
       
     </table>
          <?php
           $url = array('controller' => 'PatientTypes', 'action' => 'index');
           echo $this->Form->button('Cancel',array('id'=>'btnCancel','type'=>'button','class'=>'btn btn-success','onclick'=> "location.href='".$this->Html->url($url)."'"));
     ?>
      <?php echo $this->Form->button('Save',array('type'=>'submit','id'=>'btnSave','class'=>'btn btn-success','div'=>false,'onclick'=>"if($('#txtDesc').val()==''){alert('Patient types can not be empty!');$('#txtDesc').focus();return false;}"));?>
     
     
     </fieldset>
<?php echo $this->Form->end() ?>
    
 