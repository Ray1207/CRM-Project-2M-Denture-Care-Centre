<?php echo $this->Html->css(array('print'), 'stylesheet', array('media' => 'print'));?>
<?php echo $this->Html->css('bootstrap.min'); ?>
<?php echo $this->Html->css('support'); ?>

 <div id="location">
  <?php echo $this->Html->image ('HomeIcon.png', array ('alt'=>'Current location', 'id'=>'locationLogo', 'border'=>'0')); ?> 
 </div>
 <div id="currentLocation">Current location: 
 <?php echo $this->Html->link ('Help & Support',''); ?>
 </div>
  
 <div id="content">
  <div id="divUserManual">
  <?php echo $this->Html->image ('pdf.jpg', array ('alt'=>'View User Manual', 'id'=>'imgUserManual', 'border'=>'0','url'=> '/files/Team 19 User manual v3.pdf')); ?> 
  <?php echo $this->Html->link ('View User Manual','/files/Team 19 User manual v3.pdf'); ?>
  </div>
 
<font size="+2"><b>Frequently Asked Questions (FAQs)</b></font><br /><br />
<a name="top" href="#1">How do I change my password?</a><br />
<a href="#2">How do I update my profile details?</a><br />
<a href="#3">How do I make a reminder notes?</a><br />
<a href="#4">How do I update my reminder notes?</a><br />
<a href="#5"></a><br />
<br /><br />
<p><a name="1">Question: How do I change my password?</a><br />
Answer: <br /><ol>
<li>Click "Edit Profile" link on the top right corner of the web site.</li>
<li>Click "Change Password" link.</li>
<li>Enter a new password and retype it again in the next field.</li>
<li>Click the "Save" button.</li>
<li>In case of not matching password, you will receive an error message "Password and confirm password not match".</li>
<li>If all inputs are valid, you will be presented with a flash message "Password has been updated".</li></ol>
<a href="#top">Back to Top</a><br /></p><br />
<p><a name="2">Question: How do I update my profile details?</a><br />
Answer: <br /><ol>
<li>Click "Edit Profile" link on the top right corner of the web site.</li>
<li>Change the inputs of the particular fields as desired.</li>
<li>Click the "Save" button.</li>
<li>If all inputs are valid, you will be presented with a flash message "Your profile has been updated".</li></ol>
<a href="#top">Back to Top</a><br /></p><br />
<p><a name="3">Question: How do I make my reminder notes?</a><br />
Answer: <br /><ol>
<li>Click on the day of the calendar on the top right corner of the homepage. </li>
<li>Click on the "New Reminder" button.</li>
<li>Enter all fields as required.</li>
<li>Click the "Save" button.</li>
<li>If all inputs are valid, a flash message "New reminder has been saved" will appear. </li>
<li>The newly created reminder will also be displayed under the "My Reminder" section in your homepage.</li></ol>
<a href="#top">Back to Top</a><br /></p><br />
<p><a name="4">Question: How do I update my reminder notes?</a><br />
Answer: <br /><ol>
<li>Click on the day of the calendar on the top right corner of the homepage. </li>
<li>Click on the "View reminder details" <?php echo $this->Html->image ('view.png'); ?>icon.</li>
<li>Change the inputs of the particular fields as desired.</li>
<li>Click the "Save" button.</li>
<li>If all inputs are valid, a flash message "The reminder has been updated" will appear.</li></ol>
<a href="#top">Back to Top</a><br /></p><br />
 </div>