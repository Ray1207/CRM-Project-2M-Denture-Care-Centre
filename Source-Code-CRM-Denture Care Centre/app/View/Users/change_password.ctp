<?php echo $this->Html->css('bootstrap.min'); ?>
<?php echo $this->Html->css('password'); ?>

 <div id="location">
  <?php echo $this->Html->image ('HomeIcon.png', array ('alt'=>'Current location', 'id'=>'locationLogo', 'border'=>'0')); ?>
 </div>
 <div id="currentLocation">Current location:
 <?php echo $this->Html->link ('Change Password',array ('controller'=>'users','action'=>'changePassword')); ?>
 </div>

 <div id="content">
 <div id="divFlahMsg"><?php echo $this->Session->flash(); ?> </div>

<?php   echo $this->Form->create('User', array('action'=>'changePassword','class'=>'form-horizontal','id'=>'formPassword'));?>

  
             <div class="control-group">
             <?php   echo $this->Form->label('Current','Old Password:',array('class'=>'control-label')); ?>
              <div class="controls">
	      <?php   echo $this->Form->password('currentPassword');?>
	      </div>
             </div>
             
             <div class="control-group">
             <?php   echo $this->Form->label('New','New Password:',array('class'=>'control-label')); ?>
              <div class="controls">
	      <?php   echo $this->Form->password('password',array('value'=>'','id'=>'txtNew'));?>
	      </div>
             </div>
             
             <div class="control-group">
              <?php   echo $this->Form->label('Confirm','Confirm New Password:',array('class'=>'control-label')); ?>
              <div class="controls">
	      <?php   echo $this->Form->password('confirmPassword', array('value'=>''));?>
	      </div>
             </div>

            <div class="form-actions">
              <?php   echo $this->Form->button('Save',array('type'=>'submit','id'=>'btnSave','class'=>'btn btn-success'));
                      echo $this->Form->end();?>
             <?php $url = array('controller'=>'users', 'action'=>'editProfile');
                   echo $this->Form->button('Cancel',array('id'=>'btnCancel','type'=>'button','class'=>'btn btn-success','onclick'=> "location.href='".$this->Html->url($url)."'")); ?>
            </div>

       
</div>