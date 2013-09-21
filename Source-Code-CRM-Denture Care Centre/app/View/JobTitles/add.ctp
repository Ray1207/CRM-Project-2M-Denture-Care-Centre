<?php echo $this->Form->create('JobTitle', array('action'=>'add')); ?>
     <fieldset class="fieldsetDetails">
     <legend>New Job Titles</legend>
     
     <table style="float:left;">
     <tr>
		<td style="padding-top:10px;"> <?php
					echo $this->Form->input('description',array('label'=>'Description:','id'=>'txtDesc'));
         ?></td>
      </tr>
       
     </table>
          
     
     <?php
           $url = array('controller' => 'JobTitles', 'action' => 'index');
           echo $this->Form->button('Cancel',array('id'=>'btnCancel','type'=>'button','class'=>'btn btn-success','onclick'=> "location.href='".$this->Html->url($url)."'"));
     ?>
           <?php echo $this->Form->button('Save',array('type'=>'submit','id'=>'btnSave','class'=>'btn btn-success','div'=>false,'onclick'=>"if($('#txtDesc').val()==''){alert('Job titles can not be empty!');$('#txtDesc').focus();return false;}"));?>

     </fieldset>
<?php echo $this->Form->end() ?>
    
 