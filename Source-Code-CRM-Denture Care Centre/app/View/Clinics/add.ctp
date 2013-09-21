<?php echo $this->Form->create('Clinic', array('action'=>'add')); ?>
     <fieldset class="fieldsetDetails">
     <legend>New Clinic</legend>
     
     <table style="float:left;">
     <tr>
        <td colspan="2" style="padding-top:10px;"> <?php          
                    //echo $this->Form->input('clinic_id',array('label'=>false,'value'=>$clinic_id,'type'=>'hidden'));		
                    echo $this->Form->input('street_address',array('label'=>'Street Address:','id'=>'txtStreet'));
		?></td>
		<td style="padding-top:10px;"> <?php
					echo $this->Form->input('city',array('label'=>'Suburb:','id'=>'txtCity'));
         ?></td>
         <td style="padding-top:10px; padding-left:20px;">
              <?php echo $this->Form->input('state', array('label'=>'State:','div'=>false,'type'=>'select','options'=>array('ACT'=>'ACT','NT'=>'NT','NSW'=>'NSW','QLD'=>'QLD','SA'=>'SA','TAS'=>'TAS','VIC'=>'VIC','WA'=>'WA'),'default'=>'VIC'));?>
         </td>
      </tr>
      <tr>
        <td style="padding-top:10px;"><?php echo $this->Form->input('postcode',array('label'=>'Postcode:','id'=>'txtPostcode'));
        ?></td>
      </tr>
       
     </table>
          
     
     <?php
           $url = array('controller' => 'clinics', 'action' => 'index');
           echo $this->Form->button('Cancel',array('id'=>'btnCancel','type'=>'button','class'=>'btn btn-success','onclick'=> "location.href='".$this->Html->url($url)."'"));
     ?>
           <?php echo $this->Form->button('Save',array('type'=>'submit','id'=>'btnSave','class'=>'btn btn-success','div'=>false,'onclick'=>"if($('#txtStreet').val()==''){alert('Clinics street address cannot be empty!');$('#txtTitle').focus();return false;}else if($('#txtCity').val()==''){alert('Clinics city can not be empty!');$('#txtCity').focus();return false;}else if($('#txtPostcode').val()==''){alert('Clinics postcode can not be empty!');$('#txtPostcode').focus();return false;}"));?>

     </fieldset>
<?php echo $this->Form->end() ?>
    
 