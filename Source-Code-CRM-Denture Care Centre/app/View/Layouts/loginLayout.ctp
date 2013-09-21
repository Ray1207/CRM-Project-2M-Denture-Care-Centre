<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <title>Denture Care Centre Management System</title>
      <?php
	     echo $this->Html->meta ('icon');
	     echo $this->Html->css('bootstrap.min');
	     echo $this->Html->css ('loginLayout');
	  ?>
</head>

<body id="container">
 
<div id="content">
  <div id="loginBox">
  <div id="divMsg">   <?php echo $this->Session->flash(); ?> </div>
    <?php 
      
	  echo $content_for_layout;
   ?>
   

  </div>

</div>
 

</body>
</html>