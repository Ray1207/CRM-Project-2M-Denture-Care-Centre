<?php echo $this->Html->css('bootstrap.min'); ?>
<?php echo $this->Html->css('patientView'); ?>
<style>
.tabIframe{
   width: 555px;
   height:95px;
   border:none;
}
</style>
 <div id="location">
  <?php echo $this->Html->image ('HomeIcon.png', array ('alt'=>'Current location', 'id'=>'locationLogo', 'border'=>'0')); ?> 
 </div>
 <div id="currentLocation">Current location: 
 <?php echo $this->Html->link ('Patient',array ('controller'=>'patients','action'=>'searchPatient')); ?> &gt;&gt;
 <?php echo $this->Html->link ('Patient Details',''); ?>
 </div>

 <div id="content">
  <div style="height:56px;"> 
 <h3 style="color: red; text-align:center; margin-top:10px; margin-bottom:0px;">CONFIDENTIAL</h3>

 <?php $url = array('controller'=>'patients', 'action'=>'editStep1', $patient['Patient']['patient_id']);
                 echo $this->Form->button('Edit',array('id'=>'btnBack','type'=>'button','class'=>'btn btn-success','onclick'=> "location.href='".$this->Html->url($url)."'"));   ?>
  </div>
<?php echo $this->Form->create('Patient'); ?>

<table class="table table-bordered" id="tbDetail">
  <tr>
     <th>Surname:</th>    
     <td><?php echo $patient['Patient']['surname']; ?></td>
     <th>Given Name:</th>
    <td><?php echo $patient['Patient']['given_name']; ?></td>
  </tr>
  <tr>
     <th>Patient Type:</th>
     <td><?php echo $patient['PatientType']['description']; ?></td>
     <th>Date of Birth:</th>
     <td><?php echo date("d-M-Y",strtotime($patient['Patient']['date_of_birth'])); ?></td>
  </tr>
   <tr>
     <th>Address:</th>
     <td colspan="3">
          <?php       echo $patient['Patient']['street_address'];?> &nbsp;
          <?php       echo $patient['Patient']['city']; ?> &nbsp;
          <?php       echo $patient['Patient']['state']; ?> &nbsp;
          <?php       echo $patient['Patient']['postcode']; ?> &nbsp;     
     </td>
  </tr>
   <tr>
     <th>Mobile:</th>
     <td><?php echo $patient['Patient']['mobile']; ?></td>
     <th>Home:</th>
     <td><?php echo $patient['Patient']['home']; ?></td>
  </tr>
  <tr>
    <th>GP's Name:</th>
    <td><?php echo $patient['Patient']['gp_name']; ?></td>
    <th>GP's Contact Number:</th>
    <td><?php echo $patient['Patient']['gp_phone']; ?></td>
  </tr>
   <tr>
     <th>GP's Address:</th>
     <td colspan="3"><?php echo $patient['Patient']['gp_address']; ?></td>
   </tr>
  <tr>
     <th>Age of Current Dentures:</th>
     <td><?php
        if($patient['Patient']['current_dentures_age']==""){
           echo "Don't have denture currently.";
        }
        else{
           echo $patient['Patient']['current_dentures_age'];
        }
                
     ?></td>
     <th>Current Dentures Problems:</th>
     <td><?php
          if($patient['Patient']['current_dentures_problem']==""){
             echo "No";
          }
          else {
             echo $patient['Patient']['current_dentures_problem'];
          }          
     ?></td>
  </tr>
    <tr>
     <th>Latex allergy:</th>
     <td colspan="3"><?php
          if($patient['Patient']['latex_allergic_details']==""){
             echo "No";
          }
          else{
             echo $patient['Patient']['latex_allergic_details'];
          }
          
     ?></td>
  </tr>
    <tr>
     <th>Other allergies:</th>
     <td colspan="3"><?php
        if($patient['Patient']['other_allergies_details']==""){
            echo "No";
        }
        else{
            echo $patient['Patient']['other_allergies_details'];
        }
         
     ?></td>   
  </tr>
  <tr>
     <th>Medical Conditions:</th>
     <td colspan="3"><?php
        if($patient['Patient']['medical_conditions_details']==""){
            echo "No";
         }
        else{
            echo $patient['Patient']['medical_conditions_details'];
        }
      
     ?></td>
  </tr>
   <tr>
     <th>Medications:</th>
     <td colspan='3'><?php
        if($patient['Patient']['medicines_details']==""){
            echo "No";
         }
        else{
            echo $patient['Patient']['medicines_details'];
        }
     ?></td>
  </tr>
  <tr>
     <th>Dental Job Status:</th>
     <td colspan='3'>
         <?php
           $PatientId=$patient['Patient']['patient_id']; 
           echo "<iframe class='tabIframe' src='/review/JobStatuses/index/$PatientId'></iframe>";
         ?>
     </td>
  </tr>
  <tr>
     <th>Patient Type Related Information:</th>
     <td colspan='3'>
          
           <?php 
               if($patient['Patient']['patient_type']=="1")
               {
                     echo "No";
               }
               if($patient['Patient']['patient_type']=="2")
               {     echo "&nbsp;&nbsp;&nbsp;";  
                     echo "<strong>Deposit: </strong>&nbsp;&nbsp;";
                     
                     if($patient['Patient']['deposit']!="")
                     {
                           echo "$";
                           echo $patient['Patient']['deposit'];
                     }
		                          
		     if($patient['Patient']['deposit2']!="")
                     {
                     	   echo ", ";
                           echo "$";
                           echo $patient['Patient']['deposit2'];
                     }
                     if($patient['Patient']['deposit3']!="")
                     {
                     	   echo ", ";
                           echo "$";
                           echo $patient['Patient']['deposit3'];
                     }
                     
                     if($patient['Patient']['deposit']=="" &&$patient['Patient']['deposit2']=="" &&$patient['Patient']['deposit3']=="")
                     {
                           echo "$";
                           echo "0.00";
                     }
                     echo "<br >";
		     echo "&nbsp;&nbsp;&nbsp;";  
                     echo "<strong>Dentist Letter: </strong>&nbsp;&nbsp;";
				if($patient['Patient']['dentist_letter']=="" || $patient['Patient']['dentist_letter']=="0")
                 {
                       echo "No";
                 }
                 else
                 {
                        echo "Yes";
                 }
       
               }
               if($patient['Patient']['patient_type']=="3")
               {
                     echo $this->Form->input('dentist_letter',array('label'=>'Dentist Letter', 'div'=>false, 'disabled'=>true,'checked'=>$patient['Patient']['dentist_letter']));
                     echo $this->Form->input('gp_initiation',array('label'=>'GP Initiation', 'div'=>false, 'disabled'=>true,'checked'=>$patient['Patient']['gp_initiation']));
                     echo $this->Form->input('voucher',array('label'=>'Voucher', 'div'=>false, 'disabled'=>true,'checked'=>$patient['Patient']['voucher']));
                     echo $this->Form->input('medicare_confirmation',array('label'=>'Medicare Confirmation', 'div'=>false, 'disabled'=>true,'checked'=>$patient['Patient']['medicare_confirmation']));
               }
               if($patient['Patient']['patient_type']=="4")
               {
                     echo $this->Form->input('dentist_letter',array('label'=>'Dentist Letter', 'div'=>false,'disabled'=>true,'checked'=>$patient['Patient']['dentist_letter']));
                     echo $this->Form->input('dva_confirmation',array('label'=>'DVA Confirmation', 'div'=>false, 'disabled'=>true,'checked'=>$patient['Patient']['dva_confirmation']));
               }
               if($patient['Patient']['patient_type']=="5")
               {
                     echo $this->Form->input('dentist_letter',array('label'=>'Dentist Letter', 'div'=>false, 'disabled'=>true,'checked'=>$patient['Patient']['dentist_letter']));
                     echo $this->Form->input('voucher',array('label'=>'Voucher', 'div'=>false, 'disabled'=>true,'checked'=>$patient['Patient']['voucher']));

               }
           ?>
      
     </td>
  </tr>
   <tr>
     <th>Signature Captured:</th>
     <td colspan='3'>
         <?php   if($patient['Patient']['signature']=="" || $patient['Patient']['signature']=="0")
                 {
                       echo "No";
                 }
                 else
                 {
                        echo "Yes";
                 }
         ?>
     </td>
  </tr>
   <tr>
     <th>Additional Information:</th>
     <td colspan='3'><?php
        if($patient['Patient']['addtional_information']==""){
            echo "No";
        }
        else{
          echo $patient['Patient']['addtional_information'];
        }
      
     ?></td>
  </tr>
  <tr>
  <td colspan='4'>
      <?php $url = array ('controller'=>'patients','action'=>'searchPatient');
                 echo $this->Form->button('Back',array('id'=>'btnBack2','type'=>'button','class'=>'btn btn-success','onclick'=> "location.href='".$this->Html->url($url)."'"));   ?>
     </td>
  </tr>
</table>
<?php echo $this->Form->end(); ?>
</div>


