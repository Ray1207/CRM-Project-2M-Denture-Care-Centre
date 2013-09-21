<?php echo $this->Html->css('bootstrap.min'); ?>
<?php echo $this->Html->css('edit_profile'); ?>

 <div id="location">
  <?php echo $this->Html->image ('HomeIcon.png', array ('alt'=>'Current location', 'id'=>'locationLogo', 'border'=>'0')); ?>
 </div>
 <div id="currentLocation">Current location:
 <?php echo $this->Html->link ('Edit Profile',array ('controller'=>'users','action'=>'editProfile')); ?>
 </div>
 <div id="content">
 <div id="divFlahMsg"><?php echo $this->Session->flash(); ?> </div>
 <div id="EditProfileImg">
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
      <?php echo $this->Html->link ('Change password',array ('controller'=>'users','action'=>'changePassword'),array('class'=>'changePassword')); ?>
      <p id="avl">
         <?php   
              if($current_user['job_title']=='2' || $current_user['job_title']=='3')
              {
              	 echo $this->Html->link ('My Availability',array ('controller'=>'availabilities','action'=>'index',$current_user['staff_id']),array('class'=>'changePassword'));
              }
        ?>
      </p>

 </div>
<?php   echo $this->Form->create('User', array('action'=>'editProfile','enctype' => 'multipart/form-data'));?>

<table id="EditProfile">
    <tr>
         <td class="td1"><div id="username"><?php   echo $this->Form->input('username',array('label'=>'Username:'));?> </div></td>
         <td class="td2"><div id="photo" class="controls"><label class="control-label">Photo: </label><?php   echo $this->Form->file('avatar_photo', array('label' =>'')); ?></div></td>
    </tr>
    <tr>
         <td class="td1"><div id="given_name"><?php   echo $this->Form->input('given_name',array('label'=>'Given Name:'));?> </div></td>
         <td class="td2"><div id="surname"><?php   echo $this->Form->input('surname',array('label'=>'Surname:')); ?></div></td>
    </tr>
    <tr>
         <td class="td1"><div id="email_address"><?php   echo $this->Form->input('email_address',array('label'=>'Email Address:'));?></div></td>
         <td class="td2"><div id="email_confirmation"><?php	echo $this->Form->input ('email_address',array('label'=>'Email Confirm:'));?></div></td>
    </tr>
    <tr>
         <td class="td1"><div id="address"><?php   echo $this->Form->input('address',array('label'=>'Street Address:'));?></div></td>
         <td class="td2"><div id="city"><?php   echo $this->Form->input('city',array('label'=>'Suburb:'));?></div></td>
    </tr>
        <tr>
         <td class="td1"><div id="state"><?php   echo $this->Form->input('state', array('label'=>'State:','type'=>'select','options'=>array('ACT'=>'ACT','NT'=>'NT','NSW'=>'NSW','QLD'=>'QLD','SA'=>'SA','TAS'=>'TAS','VIC'=>'VIC','WA'=>'WA'),'default'=>'VIC'));?></div></td>
         <td class="td2"> <div id="postcode"><?php echo $this->Form->input('postcode',array('label'=>'Postcode:','type'=>'text')); ?></div></td>
    </tr>
    <tr>
       <td class="td1"><div id="mobile"><?php   echo $this->Form->input('mobile',array('label'=>'Mobile:','type'=>'text'));?></div></td>
       <td class="td2"><div id="homeNum"><?php   echo $this->Form->input('home',array('label'=>'Home:'));?></div>
           <div id="staff_id"><?php  echo $this->Form->input('staff_id', array('type'=>'hidden'));?></div>
       </td>
    </tr>
    <tr>
       <td colspan="2">
                   <?php   echo $this->Form->button('Save',array('type'=>'submit','id'=>'btnSave','class'=>'btn btn-success'));
                   echo $this->Form->end();?></td>

    </tr>
</table>
</div>
<?php echo $this->Html->script('textboxFocus'); ?>
<?php echo $this->Html->script('Focus'); ?>
<?php echo $this->Html->script('jobTitle'); ?>