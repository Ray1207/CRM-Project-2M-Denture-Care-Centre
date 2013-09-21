<?php echo $this->Html->script('jquery'); ?>
<?php echo $this->Html->css('bootstrap.min'); ?>
<?php echo $this->Html->css('Reminder'); ?>
      <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js'></script>
      <link rel='stylesheet' type='text/css' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css' />
      <link href="http://live.datatables.net/media/css/demo_table.css" rel="stylesheet">
      <?php echo $this->Html->script('dataTable.js'); ?>
<script type="text/javascript">
       $(document).ready(function(){
       		       $('#tbMaintenance').dataTable( {
       		       		       "iDisplayLength": 5,
       		       		       "bLengthChange": false,
       		       		       "bFilter": false
       		       });
       		      // $("#divTest2").autoscroll();
        });
</script>
 
 <div id="location">
  <?php echo $this->Html->image ('HomeIcon.png', array ('alt'=>'Current location', 'id'=>'locationLogo', 'border'=>'0')); ?> 
 </div>
 <div id="currentLocation">Current location: 
 <?php echo $this->Html->link ('My Reminder',''); ?>
 </div>
 
 <div id="content">
 <div id="divFlahMsg"> <?php echo $this->Session->flash(); ?> </div>
 <div style="height:50px; width:775px; margin-left:15px;">
 <h4>Reminder -- <?php echo $reminderTime; ?></h4>
 <?php echo "<input id='txtTime' value=$reminderTime />"; ?>
<?php echo "<input type='button' class='btn btn-success' id='btnNew' value='New Reminder'>"; ?>
</div>
<div id="divTable">
  <table class="table table-bordered" id="tbMaintenance">
     <thead>
         <tr>
            <th>Reminder Notes</th>
            <th>Actions</th>
         </tr>
      </thead>
      <tbody>
            <?php foreach ($results as $reminders): ?>  
           <tr>
             <td> 
                <?php echo $reminders['Reminder']['description']; ?> 
             </td>        
            <td>
           
              <?php  echo  "<a href='' class='test' id='"; echo $reminders['Reminder']['reminder_id']; echo "'>";
                    echo $this->Html->image ('view.png', array ('alt'=>'view clinic details','title'=>'View clinic details', 'id'=>'view', 'border'=>'0')); echo "</a>";             
              ?>

               &nbsp; &nbsp;
               <?php echo $this->Html->image ('trash.png', array ('alt'=>'delete this clinic','title'=>'Delete this clinic', 'id'=>'delete', 'border'=>'0','url'=> array('controller' => 'reminders', 'action' => 'delete', $reminders['Reminder']['reminder_id'],$reminderTime),'onclick'=>"return confirm('Are you sure to delete this clinic?');")); ?>  

               
              &nbsp; &nbsp;
              
                 

            </td>
        
        </tr> 
        <?php endforeach; ?> 
      </tbody>
    </table>
    </div>
       
    <div id="divAjax">
    
    </div>
</div>
<?php echo $this->Html->script('reminder'); ?>
