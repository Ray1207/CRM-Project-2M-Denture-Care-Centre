<?php echo $this->Html->css('bootstrap.min'); ?>
<?php echo $this->Html->css('edit_admin'); ?>

 <div id="location">
  <?php echo $this->Html->image ('HomeIcon.png', array ('alt'=>'Current location', 'id'=>'locationLogo', 'border'=>'0')); ?> 
 </div>
 <div id="currentLocation">Current location: 
 <?php echo $this->Html->link ('Staff',array ('controller'=>'users','action'=>'searchAdmin')); ?> &gt;&gt;
 <?php echo $this->Html->link ('Staff Details',''); ?>
 </div>

 <div id="content">
 <div id="divFlahMsg"><?php echo $this->Session->flash(); ?> </div>
<?php   echo $this->Form->create('User', array('action'=>'editAdmin'));?>

<table>
    <tr>
         <td class="td1"><div id="given_name"><?php   echo $this->Form->input('given_name',array('label'=>'Given Name:'));?> </div></td>
         <td class="td2"><div id="surname"><?php   echo $this->Form->input('surname',array('label'=>'Surname:')); ?></div></td>
    </tr>
    <tr>
         <td class="td1"><div id="email_address"><?php   echo $this->Form->input('email_address',array('label'=>'Email Address:'));?></div></td>
         <td class="td2"><div id="email_confirmation"><?php   echo $this->Form->input('email_confirmation',array('label'=>'Confirm Email:','value'=>$this->data['User']['email_address']));?></div></td>
    </tr>
    <tr>
         
         <td class="td1"><div id="job_title"><?php   echo $this->Form->input('job_title', array('label'=>'Job Title:','type'=>'select','options'=>$jobTitles,'onchange'=>'accordings()'));?></div></td>
         <td class="td3"><div id="gender">
               <?php  
                      echo $this->Form->label('gender','Gender:',array('id'=>'lblGender'));
                      echo $this->Form->input('gender',array('legend'=>false,'label'=>'Gender:','type'=>'radio','options'=>array('Male'=>'Male','Female'=>'Female'),'default'=>'Male'));   
               ?>
        </div></td>
    </tr>
    <tr>
       <td colspan="2"><div id="date_of_birth"><?php   echo $this->Form->input('date_of_birth',array('label'=>'Date of Birth:','dateFormat'=>'DMY','minYear'=>date('Y')-70,'maxYear'=>date('Y')));?></div>
</td>
    </tr>
       <tr>
         <td class="td1"><div id="address"><?php   echo $this->Form->input('address',array('label'=>'Street Address:'));?></div></td>
         <td class="td2"><div id="city"><?php   echo $this->Form->input('city',array('label'=>'Suburb:'));?></div></td>
    </tr>
        <tr>
         <td class="td1" ><div id="state"><?php   echo $this->Form->input('state', array('label'=>'State:','type'=>'select','options'=>array('ACT'=>'ACT','NT'=>'NT','NSW'=>'NSW','QLD'=>'QLD','SA'=>'SA','TAS'=>'TAS','VIC'=>'VIC','WA'=>'WA'),'default'=>'VIC'));?></div></td>
         <td class="td2" > <div id="postcode"><?php echo $this->Form->input('postcode',array('label'=>'Postcode:','type'=>'text')); ?></div></td>
    </tr>
    <tr>
       <td class="td1" ><div id="mobile"><?php   echo $this->Form->input('mobile',array('label'=>'Mobile:','type'=>'text'));?></div></td>
       <td class="td2"><div id="homeNum"><?php   echo $this->Form->input('home',array('label'=>'Home:'));?></div>
           <div id="staff_id"><?php  echo $this->Form->input('staff_id', array('type'=>'hidden'));?></div>
       </td>
    </tr>
    <tr>
    <td class="td1"><div id="insurance"><?php   echo $this->Form->input('insurance_policy',array('label'=>'Insurance Policy:'));?></div></td>
    <td class="td2"><div id="provider"><?php   echo $this->Form->input('provider_number',array('label'=>'Provider Number:'));?></div></td>
    </tr>
    <tr>
        <td class="td1"><div id="police"><?php   echo $this->Form->input('police_check',array('label'=>'Police Check'));?></div></td>
        <td class="td2"><div id="reg"><?php   echo $this->Form->input('registeration_certificate',array('label'=>'Registeration Certificate'));?></div></td>
    </tr>
    <tr>
       <td colspan="2">
                   <?php $url = array('controller'=>'users', 'action'=>'searchAdmin');
                 echo $this->Form->button('Cancel',array('id'=>'btnCancel','type'=>'button','class'=>'btn btn-success','onclick'=> "location.href='".$this->Html->url($url)."'"));   ?>
                 <?php   echo $this->Form->button('Save',array('type'=>'submit','id'=>'btnSave','class'=>'btn btn-success'));
                   echo $this->Form->end();?></td>
       
    </tr>
</table>
</div>
<?php echo $this->Html->script('textboxFocus'); ?>
<?php echo $this->Html->script('Focus'); ?>
<?php echo $this->Html->script('jobTitle'); ?>
