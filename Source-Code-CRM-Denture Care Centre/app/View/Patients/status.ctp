<?php echo $this->Html->css('bootstrap.min'); ?>
<style>
#content input[type="checkbox"]{
	margin-left:5px;
}
#content label {
display: inline;
margin-left:5px;
}
#btnUpdate{
	float:right;
	margin-top:10px;
	margin-right:6px;
}
</style>

 <div id="content">
<?php echo $this->Session->flash(); ?>
 <?php echo $this->Form->create('Patient'); ?>
<div id='divStatus'>
<?php echo $this->Form->input('patient_id', array('type' => 'hidden')); ?>
<fieldset>
<legend style="font-style: italic; font-size:15px;">Denture Job Status</legend>
    <table id='statusTable'>
      <tr>
        <td><?php  echo $this->Form->input('status_first_consultation',array('label'=>'First consultation','div'=>false)); ?></td>
        <td><?php  echo $this->Form->input('status_first_impression',array('label'=>'First impression','div'=>false));?></td>
        <td><?php echo $this->Form->input('status_second_impression',array('label'=>'Second impression','div'=>false));?></td>
        <td><?php echo $this->Form->input('status_bite_registeration',array('label'=>'Bite registeration','div'=>false));?></td>
        <td><?php echo $this->Form->input('status_try_in',array('label'=>'Try in','div'=>false));?></td>
     </tr>
     <tr>
        <td><?php echo $this->Form->input('status_insert',array('label'=>'Insert','div'=>false));?></td>
        <td><?php echo $this->Form->input('status_shade',array('label'=>'Shade','div'=>false));?></td>
        <td><?php echo $this->Form->input('status_mouth_guard_impression',array('label'=>'Mouth guard impression','div'=>false));?></td>
        <td><?php echo $this->Form->input('status_mouth_guard_insertion',array('label'=>'Mouth guard insertion','div'=>false));?></td>
        <td><?php echo $this->Form->input('status_relines',array('label'=>'Relines','div'=>false));?></td>
     </tr>
    </table>      
 </fieldset>
 <?php echo $this->Form->end(array('label' => 'Update', 'id'=>'btnUpdate', 'class'=>'btn btn-success', 'div' => false)); ?>
 </div>
</div>

