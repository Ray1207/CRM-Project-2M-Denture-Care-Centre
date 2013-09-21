<?php echo $this->Form->create('Clinic', array('action'=>'edit')); ?>
   <fieldset class="fieldsetDetails">
     <legend>Clinic Details</legend>
     
     <table style="float:left;">
     <tr>
        <td colspan="2" style="padding-top:10px;"> <?php  echo $this->Form->input('clinic_id',array('label'=>false,'value'=>$this->data['Clinic']['clinic_id'],'type'=>'hidden'));          
                   
				    echo $this->Form->input('street_address',array('id'=>'txtStreet','label'=>'Street Address:','div'=>false));
					
		?></td>
		<td style="padding-top:10px;"> <?php					
					echo $this->Form->input('city',array('id'=>'txtCity','label'=>'Suburb:','div'=>false));
         ?></td>
         <td style="padding-top:10px; padding-left:20px;">
              <?php echo $this->Form->input('state', array('label'=>'State:','div'=>false,'type'=>'select','options'=>array('ACT'=>'ACT','NT'=>'NT','NSW'=>'NSW','QLD'=>'QLD','SA'=>'SA','TAS'=>'TAS','VIC'=>'VIC','WA'=>'WA'),'default'=>'VIC'));?>
         </td>
      </tr>
      <tr>
        <td style="padding-top:10px;"><?php echo $this->Form->input('postcode',array('id'=>'txtPostcode','label'=>'Postcode:','div'=>false));
        ?></td>
      </tr>
       
     </table>
     <?php echo $this->Form->button('Save',array('type'=>'submit','id'=>'btnSave','class'=>'btn btn-success','div'=>false,'onclick'=>"if($('#txtStreet').val()==''){alert('Clinics Street address cannnot be empty!');$('#txtTitle').focus();return false;}else if($('#txtCity').val()==''){alert('Clinics city can not be empty!');$('#txtCity').focus();return false;}else if($('#txtPostcode').val()==''){alert('Clinics postcode can not be empty!');$('#txtPostcode').focus();return false;}"));?>
      </fieldset>
    <?php echo $this->Form->end() ?>
    