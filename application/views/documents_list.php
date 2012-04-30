<div class="container-fluid">
  <div class="row-fluid">
    <div class="span3">
      <? $this->load->view('documents_leftmenu'); ?>
    </div>
    <div class="span9">
    	<h2 style="padding: 10px 0px;">Заявки курьеру</h2>        

		
		  	<? 
		  	$date = "";
		  	
		  	foreach ($documents as $document) { 
		    
		    if ( $date != $document->date_to_go )
		    {
		    	//Закрываем таблицу, если это не первая дата
		    	if ($date != "") echo "</tbody></table>";
		    	
		    	$date = $document->date_to_go;
		    	
		    	echo "<h3 style='padding-bottom: 6px;'>".$this->useful->date_human_from_mysql($date)." </h3>
		    	
		    	<table class='table table-bordered'>
		  		<tbody>
		  		<tr><td colspan=4 style='text-align:right;'><i class=icon-print></i> <a href=/>распечатать лист</a></td></tr>
		  		
		  		";
		    	
		    }
		    
		    ?>
		  	
		  		
		  		<tr>
		  			<td><? echo $this->company_model->get_company_name($document->company_id); ?></td>
		  			<td><? if ($document->person_id)
		  					{ echo $this->company_model->get_person_fio($document->person_id);}
		  				   else 
		  				    { echo "На ресепшн"; } ?>
		  		    <? if ($document->backcall_id) { echo " <i class='icon-volume-up'></i>"; } ?></td>
		  			<td><? echo $document->notes; ?></td>
		  			<td><a href=/courier/edit_document/<?=$document->id?>/><i class=icon-pencil></i></a></td>	   
		  		</tr>
		  	<? } ?>
		  
		  </tbody>
		</table>
        
    </div>
  </div>
</div>