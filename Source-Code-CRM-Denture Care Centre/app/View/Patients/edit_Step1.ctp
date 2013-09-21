<?php echo $this->Html->css('bootstrap.min'); ?>
<?php echo $this->Html->css('step1') ?>

 <div id="location">
  <?php echo $this->Html->image ('HomeIcon.png', array ('alt'=>'Current location', 'id'=>'locationLogo', 'border'=>'0')); ?> 
 </div>
 <div id="currentLocation">Current location: 
 <?php echo $this->Html->link ('Patient',array ('controller'=>'patients','action'=>'searchPatient')); ?> &gt;&gt;
 <?php echo $this->Html->link ('Edit Patient',''); ?>
 </div>

 <div id="content">
<?php echo $this->Session->flash(); ?>

 <p id="step" style="font-weight: bold; margin-top:10px;">1- Basic Information</p>
 <div id="divStep1">
 <?php echo $this->Form->create('Patient'); ?>

<table id="tableBasicInfo">
   <tr>
      <td style="width:400px"><?php echo $this->Form->input('patient_id', array('type' => 'hidden')); ?>
          <div id="divGivenName"><?php echo $this->Form->input('given_name',array('label'=>'Given Name:', 'div'=>false));?></div></td>
      <td><div id="divSurname"><?php echo $this->Form->input('surname',array('label'=>'Surname:', 'div'=>false));?></div></td>
   </tr>
   
   <tr>
   <td><div id="divDateOfBirth"><?php echo $this->Form->input('date_of_birth',array('label'=>'Date of Birth:', 'div'=>false,'dateFormat'=>'DMY','minYear'=>date('Y')-70,'maxYear'=>date('Y')));?></div></td>
   <td>
      <div id="gender">
          <?php  
              echo $this->Form->label('gender','Gender:',array('id'=>'lblGender','for'=>'PatientGender'));
              echo $this->Form->input('gender',array('legend'=>false,'label'=>'Gender:','type'=>'radio','options'=>array('Male'=>'Male','Female'=>'Female'),'default'=>'Male'));   
         ?>
    </div>
   </td>   
   </tr>
   
   <tr>
      <td style="width:400px"><div id="divStreetAddress"><?php echo $this->Form->input('street_address',array('label'=>'Street Address:', 'div'=>false));?></div></td>
      <td><div id="divCity"><?php echo $this->Form->input('city',array('label'=>'Suburb:', 'div'=>false));?></div></td>
   </tr>
   
   <tr>

      <td style="width:400px"><div id="divState"><?php echo $this->Form->input('state', array('label'=>'State:','div'=>false,'type'=>'select','options'=>array('ACT'=>'ACT','NT'=>'NT','NSW'=>'NSW','QLD'=>'QLD','SA'=>'SA','TAS'=>'TAS','VIC'=>'VIC','WA'=>'WA')));?></div></td>
      <td><div id="divPostcode"><?php echo $this->Form->input('postcode',array('label'=>'Postcode:', 'div'=>false));?></div></td>    
   </tr>
   
   <tr>
      <td style="width:400px"><div id="divMobile"><?php echo $this->Form->input('mobile',array('label'=>'Mobile:', 'div'=>false));?></div></td>
      <td><div id="divHome"><?php echo $this->Form->input('home',array('label'=>'Home:', 'div'=>false));?></div></td>
   </tr>
   <tr>
      <td colspan="2">
       <div id="GPContainer">
        <a href="" title="Hide/Display GP Details" onclick="Effect.toggle('divGP', 'slide'); return false;">GP's Details (optional) </a>     
          <div id="divGP">
            <table>
               <tr>
                  <td><div id="divGPName"><?php echo $this->Form->input('gp_name',array('label'=>'GP Name:', 'div'=>false));?></div></td>
                  <td><div id="divGPPhone"><?php echo $this->Form->input('gp_phone',array('label'=>'GP Phone:', 'div'=>false));?></div></td>
              </tr>
              <tr><td colspan="2"><div id="divGPAddress"><?php echo $this->Form->input('gp_address',array('label'=>'GP Address:', 'div'=>false));?></div></td></tr>
           </table>                    
          </div>
         </div>
      </td>
   </tr>
   <tr >
      <td colspan="2" align="right"><?php echo $this->Form->end(array('label' => 'Next', 'id'=>'btnNext', 'class'=>'btn btn-success', 'div' => false)); ?> </td>
      
   </tr>
</table>
</div>
</div>
