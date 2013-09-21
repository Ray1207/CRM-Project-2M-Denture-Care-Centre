<?php echo $this->Form->create('ClinicalNote', array('action'=>'add')); ?>
     <fieldset class="fieldsetDetails">
     <legend>New Notes</legend>
     
     <table style="float:left;">
     <tr>
        <td style="padding-top:10px;"> <?php          
                    echo $this->Form->input('patient_id',array('label'=>false,'value'=>$patient_id,'type'=>'hidden'));
                    echo $this->Form->input('staff_id',array('label'=>false,'value'=>$current_user['staff_id'],'type'=>'hidden'));
                    echo $this->Form->input('title',array('label'=>'Title:','id'=>'txtTitle'));
         ?></td>
         <td style="padding-top:10px; padding-left:20px;">
              <?php echo $this->Form->input('category',array('label'=>'Subheadings:','type'=>'select','options'=>array('OUD'=>'OUD','RVD'=>'RVD','FWS'=>'FWS')));  ?>
         </td>
      </tr>
      <tr>
        <td colspan="2" style="padding-top:10px;"><?php echo $this->Form->input('body',array('label'=>'Body:', 'type'=>'textarea','id'=>'txtBody'));
        ?></td>
      </tr>
       
     </table>
          
      <?php             
          echo $this->Form->button('Save',array('type'=>'submit','class'=>'btn btn-success','id'=>'btnSave','onclick'=>"if($('#txtTitle').val()==''){alert('Notes title cannnot be empty!');$('#txtTitle').focus();return false;}else if($('#txtBody').val()==''){alert('Notes body can not be empty!');$('#txtBody').focus();return false;}"));         
     ?>
     
     <?php
           $url = array('controller' => 'clinical_notes', 'action' => 'index', $patient_id);
           echo $this->Form->button('Cancel',array('id'=>'btnCancel','type'=>'button','class'=>'btn btn-success','onclick'=> "location.href='".$this->Html->url($url)."'"));
     ?>
     </fieldset>
<?php echo $this->Form->end() ?>
    
 