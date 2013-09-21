<?php echo $this->Html->css('bootstrap.min'); ?>
<?php echo $this->Html->css('step2') ?>

 <div id="location">
  <?php echo $this->Html->image ('HomeIcon.png', array ('alt'=>'Current location', 'id'=>'locationLogo', 'border'=>'0')); ?> 
 </div>
 <div id="currentLocation">Current location: 
 <?php echo $this->Html->link ('Patient',array ('controller'=>'patients','action'=>'searchPatient')); ?> &gt;&gt;
 <?php echo $this->Html->link ('Edit Patient',''); ?>
 </div>
 
 <div id="content">

<?php echo $this->Session->flash(); ?>
<p id="step" style="font-size:16px;font-weight: bold; margin-top:10px;">2- Detailed Information</p>
<?php echo $this->Form->create('Patient'); ?>
  <table id='tbStep2'>

     <tr>
     
        <td style="width:250px;"><?php echo $this->Form->input('patient_id', array('type' => 'hidden'));
                  echo $this->Form->input('has_current_dentures', array('label'=>'Do you have denture?','div'=>false,'onchange'=>'dentureCheck()')); ?></td>
        <td style="vertical-align:middle;"><div id="divDentureAge"><?php echo $this->Form->input('current_dentures_age',array('label'=>'Current denture age:','disabled'=>true,'div'=>false)); ?></div></td>
     </tr>
     <tr>
        <td colspan='2'><div id="divProblem"><?php echo $this->Form->input('current_dentures_problem',array('label'=>'Current denture problems:', 'div'=>false, 'type'=>'textarea','disabled'=>true)); ?></div></td>
     </tr>
     <tr>
        <td><?php echo $this->Form->input('has_latex_allergic',array('label'=>'Latex allergic?', 'div'=>false,'onchange'=>'latexCheck()')); ?></td>
        <td><?php echo $this->Form->input('latex_allergic_details',array('label'=>'Details:', 'div'=>false,'type'=>'textarea','disabled'=>true)); ?></td>
     </tr>
     <tr>
        <td><?php echo $this->Form->input('has_other_allergies',array('label'=>'Any other allergies?', 'div'=>false,'onchange'=>'allergiesCheck()')); ?></td>
        <td><?php echo $this->Form->input('other_allergies_details',array('label'=>'Details:', 'div'=>false,'type'=>'textarea','disabled'=>true)); ?></td>
     </tr>
     <tr>
        <td><?php echo $this->Form->input('has_medical_conditions',array('label'=>'Any medical conditions?', 'div'=>false,'onchange'=>'medicalCheck()')); ?></td>
        <td><?php echo $this->Form->input('medical_conditions_details',array('label'=>'Details:', 'div'=>false,'type'=>'textarea','disabled'=>true)); ?></td>
     </tr>
     <tr>
        <td><?php echo $this->Form->input('has_medicines',array('label'=>'Taking any medicines?', 'div'=>false,'onchange'=>'medicineCheck()')); ?></td>
        <td><?php echo $this->Form->input('medicines_details',array('label'=>'Details:', 'div'=>false,'type'=>'textarea','disabled'=>true)); ?></td>
     </tr>
     <tr>
        <td colspan="2"><div id="divAddInfo"><?php echo $this->Form->input('addtional_information',array('label'=>'Additional Information:', 'div'=>false)); ?></div></td>
     </tr>
  </table>

<div id="divPatientType"><?php
echo $this->Form->input('patient_type', array('label'=>'Patient Type:','div'=>false,'type'=>'select','options'=>array('1'=>'Prospective','2'=>'Private','3'=>'Medicare','4'=>'DVA','5'=>'VDS'),'onchange'=>'accordings()'));
?> </div>
<table id="tbPatientType">
<tr >
      <td><div id='divDentist' style="display:none;"><?php echo $this->Form->input('dentist_letter',array('label'=>'Dentist Letter','div'=>false));?></div></td>
      <td>
           <div id='divGP' style="display:none;"><?php echo $this->Form->input('gp_initiation',array('label'=>'GP Initiation', 'div'=>false));?></div>
           
           <div id='divDeposit1' class="input-prepend input-append" style="display:none;"><label style="margin-right:10px;">Deposit 1:</label><span class="add-on">$</span><?php echo $this->Form->input('deposit',array('label'=>false, 'div'=>false, 'type'=>'text')); ?></div>
         <div id='divDeposit2' class="input-prepend input-append" style="display:none;"><label style="margin-right:10px;">Deposit 2:</label><span class="add-on">$</span><?php echo $this->Form->input('deposit2',array('label'=>false, 'div'=>false, 'type'=>'text')); ?></div>
         <div id='divDeposit3' class="input-prepend input-append" style="display:none;"><label style="margin-right:10px;">Deposit 3:</label><span class="add-on">$</span><?php echo $this->Form->input('deposit3',array('label'=>false, 'div'=>false, 'type'=>'text')); ?></div>
           <div id='divDVA' style="display:none;"><?php echo $this->Form->input('dva_confirmation',array('label'=>'DVA Confirmation', 'div'=>false));?></div>
      </td>
      <td>
           <div id='divVoucher' style="display:none;"><?php echo $this->Form->input('voucher',array('label'=>'Voucher', 'div'=>false));?></div>
      </td>
      <td>
           <div id='divMedicare' style="display:none;"><?php echo $this->Form->input('medicare_confirmation',array('label'=>'Medicare Confirmation', 'div'=>false));?></div>
      </td>
      <td>
           <div id='divSignature' style="display:none;"><?php echo $this->Form->input('signature',array('label'=>'Signature', 'div'=>false));?></div>
      </td>
   </tr>
   
</table>
<div id='divNote'"><?php echo $this->Form->label('Notes:');
echo $this->Form->textarea('note',array('div'=>false, 'cols'=>'20','rows'=>'5')); ?><br /></div>
<div id="divButton" >
<?php
echo $this->Form->end(array('label' => 'Save', 'div' => false,'class'=>'btn btn-success','id'=>'btnSave','onclick'=>'var a=depositValidation(); if(a==0){return false;};'));
    $url = array('controller'=>'patients', 'action'=>'editStep1', $this->data['Patient']['patient_id']);
    echo $this->Form->button('Back',array('class'=>'btn btn-success','type'=>'button','onclick'=> "location.href='".$this->Html->url($url)."'"));   
?></div>
</div>
<?php echo $this->Html->script('patientType'); ?>
