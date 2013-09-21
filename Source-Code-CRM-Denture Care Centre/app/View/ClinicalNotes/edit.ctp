      
<?php echo $this->Form->create('ClinicalNote', array('action'=>'edit')); ?>
   <fieldset class="fieldsetDetails">
     <legend>Notes Details</legend>
     <div id="notes">
     <table style="float:left;">
     <tr>
        <td style="padding-top:10px;"> <?php  echo $this->Form->input('clinical_notes_id',array('label'=>false,'value'=>$this->data['ClinicalNote']['clinical_notes_id'],'type'=>'hidden'));
                    echo $this->Form->input('patient_id',array('label'=>false,'value'=>$this->data['ClinicalNote']['patient_id'],'type'=>'hidden'));
                    echo $this->Form->input('staff_id',array('label'=>false,'value'=>$this->data['ClinicalNote']['staff_id'],'type'=>'hidden'));          
                    echo $this->Form->input('title',array('id'=>'txtTitle','label'=>'Title:','div'=>false));
         ?></td>
         <td style="padding-top:10px; padding-left:20px;">
              <?php echo $this->Form->input('category',array('id'=>'ddlCatagory','label'=>'Subheadings:','type'=>'select','div'=>false,'options'=>array('OUD'=>'OUD','RVD'=>'RVD','FWS'=>'FWS'))); ?>
         </td>
      </tr>
      <tr>
        <td colspan="2" style="padding-top:10px;"><?php echo $this->Form->input('body',array('id'=>'txtBody','label'=>'Body:','type'=>'textarea','div'=>false));
        ?></td>
      </tr>
       
     </table></div>
         <div class="toothChart"><?php echo $this->Html->image('tooth-chart.jpg'); ?></div>
     
     <?php /* echo $this->Form->button('Edit',array('type'=>'button','Hidden'=>'Hidden','id'=>'btnEdit','class'=>'btn','div'=>false,'onclick'=>"$('#txtTitle').attr('disabled', false);
		$('#ddlCatagory').attr('disabled', false); $('#txtBody').attr('disabled', false); $('#txtTitle').focus();
		")); */ ?>
     <?php echo $this->Form->button('Save',array('type'=>'submit','id'=>'btnSave','class'=>'btn btn-success','div'=>false,'onclick'=>"if($('#txtTitle').val()==''){alert('Notes title cannnot be empty!');$('#txtTitle').focus();return false;}else if($('#txtBody').val()==''){alert('Notes body can not be empty!');$('#txtBody').focus();return false;}"));?>
       <?php echo $this->Form->button('Print',array('id'=>'btnPrint','class'=>'btn btn-success','type'=>'button','onclick'=> "window.print();"));?>
      </fieldset>
    <?php echo $this->Form->end() ?>
       <?php echo $this->Html->css(array('print'), 'stylesheet', array('media' => 'print'));?>