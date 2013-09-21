
<?php echo $this->Html->css('bootstrap.min'); ?>
<?php echo $this->Html->css('staffView'); ?>
 <div id="location">
  <?php echo $this->Html->image ('HomeIcon.png', array ('alt'=>'Current location', 'id'=>'locationLogo', 'border'=>'0')); ?> 
 </div>
 <div id="currentLocation">Current location: 
 <?php echo $this->Html->link ('Staff',array ('controller'=>'users','action'=>'searchAdmin')); ?> &gt;&gt;
 <?php echo $this->Html->link ('Staff Details',''); ?>
 </div>
 
 <div id="content">
 <h3 ><?php echo $staff['User']['given_name']; ?>&nbsp;<?php echo $staff['User']['surname']; ?></h3>
 <?php   
      if($staff['User']['job_title']=='2' || $staff['User']['job_title']=='3')
      {
          $url1 = array('controller'=>'availabilities', 'action'=>'index',$staff['User']['staff_id']);
          echo $this->Form->button('Availabilities',array('id'=>'btnAvl','type'=>'button','class'=>'btn btn-success','title'=>'view and edit availabilies of this technician','onclick'=> "location.href='".$this->Html->url($url1)."'"));
     }
?>


<table class="table table-bordered" id="tbDetail">
  <tr>
     <th>Surname:</th>    
     <td><?php echo $staff['User']['surname']; ?></td>
     <th>Given Name:</th>
    <td><?php echo $staff['User']['given_name']; ?></td>
  </tr>
  <tr>
     <th>Job Title:</th>
     <td><?php echo $staff['JobTitle']['description']; ?></td>
     <th>Gender:</th>
     <td><?php echo $staff['User']['gender']; ?></td>
  </tr>
  <tr>
     <th>Email Address:</th>
     <td><?php echo $staff['User']['email_address']; ?></td>
     <th>Date of Birth:</th>
     <td><?php echo date("d-M-Y",strtotime($staff['User']['date_of_birth'])); ?></td>
  </tr>
   <tr>
     <th>Address:</th>
     <td colspan="3">
          <?php  echo $staff['User']['address'];?> &nbsp;
          <?php       echo $staff['User']['city']; ?> &nbsp;
          <?php       echo $staff['User']['state']; ?> &nbsp;
          <?php       echo $staff['User']['postcode']; ?> &nbsp;     
     </td>
  </tr>
   <tr>
     <th>Mobile:</th>
     <td><?php echo $staff['User']['mobile']; ?></td>
     <th>Home:</th>
     <td><?php echo $staff['User']['home']; ?></td>
  </tr>
  <tr>
    <th>Police Check:</th>
      <td><?php 
             	 if($staff['User']['police_check']=="" || $staff['User']['police_check']=="0")
                 {
                       echo "No";
                 }
                 else
                 {
                        echo "Yes";
                 }
      ?></td>
    <th>Insurance Policy:</th>
    <td><?php echo $staff['User']['insurance_policy']; ?></td>
  </tr>
  <tr>
    <th>Registeration Certificate:</th>
      <td><?php 
              if($staff['User']['registeration_certificate']=="" || $staff['User']['registeration_certificate']=="0")
                 {
                       echo "No";
                 }
                 else
                 {
                        echo "Yes";
                 }
       ?></td>
    <th>Provider Number:</th>
    <td><?php echo $staff['User']['provider_number']; ?></td>
  </tr>
</table>
<?php $url = array('controller'=>'users', 'action'=>'searchAdmin');
                 echo $this->Form->button('Back',array('id'=>'btnBack','type'=>'button','class'=>'btn btn-success','onclick'=> "location.href='".$this->Html->url($url)."'"));   ?>
<?php
     if($current_user['job_title']!='2')
     {
        $url = array('controller'=>'users', 'action'=>'editAdmin',$staff['User']['staff_id']);
        echo $this->Form->button('Edit',array('id'=>'btnBack','type'=>'button','class'=>'btn btn-success','onclick'=> "location.href='".$this->Html->url($url)."'"));
     }
?>

</div>

