
<?php echo $this->Form->create('User');?>
    
    <?php
    echo $this->Form->input('username');
    echo $this->Form->input('password');
    echo $this->Form->button('Log in',array('type'=>'submit','id'=>'btnLogin','class'=>'btn btn-success'));
    echo $this->Html->link ('forgot password?',array ('controller'=>'users','action'=>'forgot_password'),array('id'=>'linkForgot','title'=>'Click to recover your password.'));
    ?>
    
    <?php echo $this->Html->script('Focus'); ?>
