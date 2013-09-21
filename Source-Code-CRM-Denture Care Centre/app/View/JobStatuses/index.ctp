<?php echo $this->Html->css('bootstrap.min'); ?>
<style>
.fieldset{width:697px;}
.divDental{
        width:178px;
	float:left;
}
.statusCheck{
margin-right:10px !important;
}
</style>
   <div class="fieldset"> 
<?php foreach ($statuses as $status): ?> 
          <div class="divDental">
           
            <?php
             if (in_array($status['PatientStatus']['status_id'], $jobStatuses))
             {
                  echo "<input class='statusCheck' disabled='disabled' type='checkbox' name='statusList[]' value='".$status['PatientStatus']['status_id']."' checked='checked'>";                                 	   
             } 
             else
             {
                  echo "<input class='statusCheck' disabled='disabled' type='checkbox' name='statusList[]' value='".$status['PatientStatus']['status_id']."'>";   
             }
               echo $status['PatientStatus']['description'];
            ?> 
          </div>
<?php endforeach; ?>     
</div> 
