<?php echo $this->Html->script('jquery'); ?>
<?php echo $this->Html->css('bootstrap.min'); ?>
<?php echo $this->Html->css('maintenance'); ?>
 <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js'></script>
      <link rel='stylesheet' type='text/css' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css' />
      <link href="http://live.datatables.net/media/css/demo_table.css" rel="stylesheet">
      <?php echo $this->Html->script('dataTable.js'); ?>
      <?php echo $this->Html->script('jquery.qtip-1.0.0-rc3.min.js'); ?>
<script type="text/javascript">
       $(document).ready(function(){
       		       $('#tbMaintenance').dataTable( {
       		       		       "iDisplayLength": 5,
       		       		       "bLengthChange": false,
       		       		       "bFilter": false
       		       });
       		      $(".view").qtip({
                      content: 'View/Edit job title details.',
                      style: { 
                      	    left:  150,
                            width: 185,
                            padding: 5,
                            background: '#A2D959',
                            color: 'white',
                            textAlign: 'center',
                            border: {
                            width: 7,
                            radius: 5,
                            color: '#A2D959'
                            },
                    tip: 'topLeft',
                    name: 'dark'
                  }
              });
             $(".delete").qtip({
                      content: 'Delete this job title.',
                     
                      style: { 
                            width: 185,
                            padding: 5,
                            background: '#A2D959',
                            color: 'white',
                            textAlign: 'center',
                            border: {
                            width: 7,
                            radius: 5,
                            color: '#A2D959'
                            },
                    tip: 'topLeft',
                    name: 'dark'
                  }
              });
        });
</script>
 <style>
.flash-message-warning {
  background-image: url('/review/img/messages/warning.png');
  background-repeat: no-repeat;
  background-position: 230px 1px;
  color: #9F6000;
  text-align: center;
  background-color:#FFFABF;
  font-size: 100%;
  font-weight: bold;
  width: 750px;
  margin-left: 14px;
  margin-top:3px;
  border: 1px solid #9F6000;
}
.flash-message-success{
  font-family: Arial, sans-serif;
  background-image: url('/review/img/messages/success.png');
  background-repeat: no-repeat;
  background-position: 210px 1px;
  color: #4F8A10;
  text-align: center;
  background-color:#DFF2BF;
  font-size: 100%;
  font-weight: bold;
  width: 755px;
  margin-left: 20px;
  margin-top:3px;
  border: 1px solid #4F8A10;
}
</style>
  <body class="bodyClinic">
 <div style="height:30px;">
 <div id="divFlahMsg"><?php echo $this->Session->flash(); ?> </div>
 <?php echo $this->Form->hidden('',array('id'=>'txtJobTitleId','value'=>$job_title_id)); ?>
 
<?php echo "<input type='button' class='btn btn-success' id='btnNewJobTitle' value='New Job Title'>"; ?>
</div>
<div id="divTable">
  <table class="table table-bordered" id="tbMaintenance">
     <thead>
         <tr>
            <th>Job Title</th>
            <th>Actions</th>
         </tr>
      </thead>
      <tbody>
            <?php foreach ($results as $titles): ?>
            
           <tr>       
             <td> 
                <?php echo $titles['JobTitle']['description']; ?> 
             </td> 
            <td>
           
             <?php
           $cid = $titles['JobTitle']['job_title_id'];
           echo $this->Html->image ('view.png', array ('alt'=>'view job title', 'id'=>$cid, 'border'=>'0','class'=>'view','url'=>'#','onclick'=>"var id=this.id;
				$.get('/review/jobTitles/edit/'+id,
					function(data){
						$('#divAjax').html(data);
				});
				return false;")); ?> 
               &nbsp; &nbsp;
               <?php echo $this->Html->image ('trash.png', array ('alt'=>'delete this title', 'class'=>'delete', 'border'=>'0','url'=> array('controller' => 'jobTitles', 'action' => 'delete', $titles['JobTitle']['job_title_id']),'onclick'=>"return confirm('Are you sure to delete this title?');")); ?>  

               
              &nbsp; &nbsp;
              
            </td>
        
        </tr> 
        <?php endforeach; ?> 
      </tbody>
    </table>
    </div>
       
    <div id="divAjax">
        
    </div>
 </body>   

<?php echo $this->Html->script('title'); ?>
