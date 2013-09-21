
<?php echo $this->Html->css('bootstrap.min'); ?>
<?php echo $this->Html->css('search_admin'); ?>

 <div id="location">
  <?php echo $this->Html->image ('HomeIcon.png', array ('alt'=>'Current location', 'id'=>'locationLogo', 'border'=>'0')); ?> 
 </div>
 <div id="currentLocation">Current location: 
 <?php echo $this->Html->link ('Staff',array ('controller'=>'users','action'=>'searchTechnician')); ?>
 </div>
 
 <div id="content">
<div id="divFlahMsg"><?php echo $this->Session->flash(); ?> </div>
<div id="searchBox">
<?php  
    echo $this->Form->create('User');  
    echo $this->Form->input('selection',array('type'=>'select','label'=>false,'options'=>array('Given Name','Surname')));
    echo $this->Form->input('value',array('type'=>'text', 'label'=>false));
    echo $this->Form->button('Search',array('type'=>'submit','id'=>'btnSearch','class'=>'btn btn-success'));
    echo $this->Form->end();
    
    $url = array('controller'=>'users', 'action'=>'addAdmin');
    echo $this->Form->button('New Staff',array('id'=>'btnNew','class'=>'btn btn-success','type'=>'button','onclick'=> "location.href='".$this->Html->url($url)."'"));
    
?> 
</div>
<div id="divTable">
<table id="resultsTable"> 
<thead>
    <tr>  
        <th>Surname</th> 
        <th>Given Name</th>
        <th>Staff Type</th>
        <th>Action</th>
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
            <?php echo $user['User']['job_title']; ?>
        </td> 
        <td>
           <?php echo $this->Html->image ('view.png', array ('alt'=>'view staff details','title'=>'View staff details', 'id'=>'view', 'border'=>'0','url'=> array('controller' => 'users', 'action' => 'view', $user['User']['staff_id']))); ?>  
           
           &nbsp;&nbsp;&nbsp;
           <?php echo $this->Html->image ('edit.png', array ('alt'=>'edit this staff','title'=>'Edit this staff', 'id'=>'edit', 'border'=>'0','url'=> array('controller' => 'users', 'action' => 'editAdmin', $user['User']['staff_id']))); ?>  
           
           &nbsp;&nbsp;&nbsp;
           <?php echo $this->Html->image ('trash.png', array ('alt'=>'delete this staff','title'=>'Delete this staff', 'id'=>'delete', 'border'=>'0','url'=> array('controller' => 'users', 'action' => 'delete', $user['User']['staff_id']),'onclick'=>"return confirm('Are you sure to delete this staff?');")); ?>  
          

           &nbsp;&nbsp;&nbsp;
        </td>
        
    </tr> 
<?php endforeach; ?> 
</tbody>
</table> 
</div>
</div>
