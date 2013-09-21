<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <title>Denture Care Centre Management System</title>
      
      <?php
	     echo $this->Html->meta ('icon');
	     echo $this->Html->css ('administratorsLayout');
	     echo $this->Html->script('msgFadeOut');
              echo $this->Html->script('prototype');
              echo $this->Html->script('scriptaculous');
	  ?>
</head>

<body id="container">
 <div id="top">
    <?php echo $this->Html->image ('SystemLogo.png', array ('alt'=>'Denture Care Centre Management System', 'id'=>'systemLogo', 'border'=>'0', 'url'=> array ('controller'=>'users','action'=>'index'))); ?>
   
    <div id="userProfile">
    
      <?php
        if($current_user['avatar_photo']==null || $current_user['avatar_photo']=='')
        {
           echo $this->Html->image ('/img/Upload/Default.png', array ('alt'=>'User profile', 'id'=>'userProfileImg', 'border'=>'0', 'url'=> '#'));
        }
        else
        {
           echo $this->Html->image ($current_user['avatar_photo'], array ('alt'=>'User profile', 'id'=>'userProfileImg', 'border'=>'0', 'url'=> '#'));
        }     
      ?>
      <p id="userName"><?php echo $current_user['username'] ?></p>
      
      <p id="userType"><?php echo $current_user_jobTitle[0]['JobTitle']['description'];?></p>
      <p id="signout"><?php echo $this->Html->link ('Edit Profile',array ('controller'=>'users', 'action'=> 'editProfile')); ?>  |  <?php echo $this->Html->link ('Logout',array ('controller'=>'users', 'action'=> 'logout')); ?></p>
    </div>
    
 </div>
 
 <div id="sideMenuBar" onload="loadType()">
     <?php echo $this->Html->image ('Home.jpg', array ('alt'=>'Homepage', 'id'=>'home', 'border'=>'0','url'=> array ('controller'=>'users'))); ?>    
     <p><?php echo $this->Html->link ('Home',array ('controller'=>'users')); ?> </p>
     
     <?php echo $this->Html->image ('Patient.jpg', array ('alt'=>'Patient', 'id'=>'patient', 'border'=>'0','url'=> array ('controller'=>'patients','action'=>'searchPatient'))); ?>    
     <p><?php echo $this->Html->link ('Patient',array ('controller'=>'patients','action'=>'searchPatient')); ?> </p>
    
      <?php echo $this->Html->image ('Technician.jpg', array ('alt'=>'Technician', 'id'=>'technician', 'border'=>'0','url'=> array ('controller'=>'users','action'=>'searchTechnician'))); ?>    
     <p><?php echo $this->Html->link ('Staff',array ('controller'=>'users','action'=>'searchTechnician')); ?> </p>
      
     <?php echo $this->Html->image ('Roster.png', array ('alt'=>'Roster', 'id'=>'roster', 'border'=>'0','url'=> array ('controller'=>'appointments','action'=>'index'))); ?>    
     <p><?php echo $this->Html->link ('Appointment',array ('controller'=>'appointments','action'=>'index')); ?> </p>

     <?php echo $this->Html->image ('Help.jpg', array ('alt'=>'Help & Support', 'id'=>'help', 'border'=>'0','url'=> array ('controller'=>'supports'))); ?>    
     <p><?php echo $this->Html->link ('Help & Support',array ('controller'=>'supports')); ?> </p>
 </div>                                                                                             
 
 <div id="mainContent">
    <?php 
	  echo $content_for_layout;	  
   ?>
 </div>

 <div id="footer">
    <p>This website's content is Copyright &copy; 2M Dental Group<br />
        Website Designed By Enamel Tech</p> 
 </div>
</body>
</html>