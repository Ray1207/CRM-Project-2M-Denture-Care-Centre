<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <title>Denture Care Centre Management System</title>
      
      <?php
	     echo $this->Html->meta ('icon');
	     echo $this->Html->css ('administratorsLayout');
	  ?>
</head>

<body id="container">
 <div id="top">
    <?php echo $this->Html->image ('SystemLogo.png', array ('alt'=>'Denture Care Centre Management System', 'id'=>'systemLogo', 'border'=>'0', 'url'=> '#')); ?>
       
 </div>
 
 <div id="sideMenuBar">
 
    <?php echo $this->Html->image ('Home.jpg', array ('alt'=>'Homepage', 'id'=>'home', 'border'=>'0','url'=> array ('controller'=>'users'))); ?>    
     <p><?php echo $this->Html->link ('Login',array ('controller'=>'users','action'=>'login')); ?> </p>
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