<?php echo $this->Html->css('bootstrap.min'); ?>
<?php echo $this->Html->css('forgot_password'); ?>

<body>

 <div class="container">
   <div class="content">
 <div class="forget_password_form">
 <?php echo $this->Session->flash(); ?>
    <p class="hightitle">Please enter the email address you use to sign in to the system. We'll send you a link to reset your password.</p>
    <div id="inner">
    <?php echo $this->Form->create('User', array('action' => 'forgot_password')); ?>

    <?php echo $this->Form->input('email_address',array('id'=>'txtEmail','label'=>'Email:'));?>
    <div id="divBtn">
    <input type="submit" class="btn btn-success" value="Recover" id="btnRecover" />
    <?php $url = array('controller'=>'users', 'action'=>'login');
                 echo $this->Form->button('Cancel',array('id'=>'btnCancel','type'=>'button','class'=>'btn btn-success','onclick'=> "location.href='".$this->Html->url($url)."'"));   ?>
    </div>
    <?php echo $this->Form->end();?>
    </div>
    </div>
 </div>
</div>
</body>