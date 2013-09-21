<?php echo $this->Html->css('bootstrap.min'); ?>
<?php echo $this->Html->css('search_admin'); ?>
<?php echo $this->Html->script('jquery'); ?>
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js'></script>
      <link rel='stylesheet' type='text/css' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css' />
      <link href="http://live.datatables.net/media/css/demo_table.css" rel="stylesheet">
      <?php echo $this->Html->script('dataTable.js'); ?>
      <?php echo $this->Html->script('jquery.qtip-1.0.0-rc3.min.js'); ?>
<script type="text/javascript">
       $(document).ready(function(){
       		       $('#resultsTable').dataTable( {
       		       		       "iDisplayLength": 11,
       		       		       "bLengthChange": false,
       		       		       "bFilter": false
       		       });
       		       
       		       $(".avl").qtip({
                      content: 'Availability system is not opened to this type of staff.',
                      position: {
                                type: 'fixed'
                      },
                      style: { 
                      	    left: 150 ,
                            width: 185,
                            padding: 5,
                            background: '#DA5979',
                            color: 'white',
                            textAlign: 'center',
                            border: {
                            width: 7,
                            radius: 5,
                            color: '#DA5979'
                            },
                    tip: 'topLeft',
                    name: 'dark'
                  }
              });
              	$(".view").qtip({
                      content: 'View/Edit staff details.',
                      position: {
                                type: 'fixed'
                      },
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
                      content: 'Delete this staff.',
                      position: {
                                type: 'fixed'
                      },
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
            $(".suspend").qtip({
                      content: 'Suspend this staff.',
                      position: {
                                type: 'fixed'
                      },
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
            $(".activate").qtip({
                      content: 'Activate this staff.',
                      position: {
                                type: 'fixed'
                      },
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
            $(".avlYes").qtip({
                      content: 'View/Edit availabilities.',
                      position: {
                                type: 'fixed'
                      },
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

 <div id="location">
  <?php echo $this->Html->image ('HomeIcon.png', array ('alt'=>'Current location', 'id'=>'locationLogo', 'border'=>'0')); ?> 
 </div>
 <div id="currentLocation">Current location: 
 <?php echo $this->Html->link ('Staff',array ('controller'=>'users','action'=>'searchAdmin')); ?>
 </div>
 
 <div id="content">
<div id="divFlahMsg"><?php echo $this->Session->flash(); ?> </div>
<div id="searchBox">
<?php  
    echo $this->Form->create('User');  
    echo $this->Form->input('selection',array('type'=>'select','label'=>false,'options'=>array('Job Title','Given Name','Surname')));
    echo $this->Form->input('value',array('type'=>'text', 'label'=>false));
    echo $this->Form->button('Search',array('type'=>'submit','id'=>'btnSearch','class'=>'btn btn-success'));
    echo $this->Form->end();
    
    $url = array('controller'=>'users', 'action'=>'addAdmin');
    echo $this->Form->button('New Staff',array('id'=>'btnNew','class'=>'btn btn-success','type'=>'button','onclick'=> "location.href='".$this->Html->url($url)."'"));
    
?> 
</div>

<div id="divTable">
<table id="resultsTable" class="table table-bordered"> 
<thead>
    <tr>  
        <th>Surname</th> 
        <th>Given Name</th>
        <th>Job Title</th>
        <th>Working State</th>
        <th style="width:190px;">Action</th>
    </tr> 
</thead>

<tbody>

<?php foreach ($results as $user): ?> 
    <tr> 
        <td><?php echo $user['User']['surname']; ?> </td> 
        <td> 
            <?php echo $user['User']['given_name']; ?> 
        </td> 
        <td> 
            <?php echo $user['JobTitle']['description']; ?>
        </td>
        <td> 
            <?php echo $user['User']['working_state']; ?>
        </td>
        
        <td>
           <?php echo $this->Html->image ('view.png', array ('alt'=>'view staff details', 'class'=>'view', 'border'=>'0','url'=> array('controller' => 'users', 'action' => 'view', $user['User']['staff_id']))); ?>  
          
           &nbsp;&nbsp;&nbsp;
           
           <?php echo $this->Html->image ('trash.png', array ('alt'=>'delete this staff', 'class'=>'delete', 'border'=>'0','url'=> array('controller' => 'users', 'action' => 'delete', $user['User']['staff_id']),'onclick'=>"return confirm('Are you sure to delete this staff?');")); ?>           
           &nbsp;&nbsp;&nbsp;
           <?php
             if ($current_user['job_title']=='2' || $current_user['job_title']=='3')
              {
                 if($user['User']['working_state']=='Activated')
                 {
                  echo $this->Html->image ('suspend.png', array ('alt'=>'suspend this staff', 'class'=>'suspend', 'border'=>'0','url'=> array('controller' => 'users', 'action' => 'suspend', $user['User']['staff_id']),'onclick'=>"return confirm('Are you sure to suspend this staff?');"));
                 }
                 if($user['User']['working_state']=='Suspended')
                 {
                  echo $this->Html->image ('activate.png', array ('alt'=>'activate this staff','class'=>'activate', 'border'=>'0','url'=> array('controller' => 'users', 'action' => 'activate', $user['User']['staff_id']),'onclick'=>"return confirm('Are you sure to activate this staff?');"));
                 }
              }
              
           ?>
           &nbsp;&nbsp;&nbsp;    
           <?php   
               if($user['User']['job_title']=='2' || $user['User']['job_title']=='3')
               {
               	  echo $this->Html->image ('calendar.png', array ('alt'=>'view/edit availability','class'=>'avlYes', 'border'=>'0','url'=> array('controller' => 'availabilities', 'action' => 'index', $user['User']['staff_id'])));     
               }
               else
               {
               	 echo $this->Html->image ('calendar.png', array ('alt'=>'view/edit availability', 'class'=>'avl', 'id'=>'avlNo', 'border'=>'0','url'=> '#'));
               }
          ?>
          
           
        </td>
        
    </tr> 
<?php endforeach; ?> 
</tbody>
</table> 
</div>
</div>