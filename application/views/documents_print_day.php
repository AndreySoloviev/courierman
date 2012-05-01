<div style="margin: 0px 30px;">
		
		  	<? 
		  	$date = "";
		  	
		  	foreach ($documents as $document) { 
		    
		    if ( $date != $document->date_to_go )
		    {
		    	//Закрываем таблицу, если это не первая дата
		    	if ($date != "") echo "</tbody></table>";
		    	
		    	$date = $document->date_to_go;
		    	
		    	echo "<h1 style='padding-bottom: 6px;'>".$this->useful->date_human_from_mysql($date).", ".$this->useful->day_of_week_from_mysql($date);		    		
		    	echo  "</h1>";
		    	
		    	echo "
		    	<table class='table table-bordered'>
		  		<tbody>
		  		 <thead>
    		     <tr>
                   <th>Компания</th>
                   <th>Адрес</th>
                   <th>Кому</th>
                   <th>Дополнительная информация</th>
                   <th>Отметки</th>
    			</tr>
  				</thead>
		  		
		  		";
		    	
		    }
		    
		    ?>
		  	
		  		
		  		<tr>
		  			<td><b><? echo $this->company_model->get_company_name($document->company_id); ?></b></td>
		  			<td><? echo nl2br($this->company_model->get_company_address($document->company_id)); ?><br><br>
		  				<? echo $this->company_model->get_company_phone($document->company_id); ?>
		  			</td>
		  			<td><? if ($document->person_id)
		  					{ echo "<span class='label label-inverse'>В руки:</span><br>".$this->company_model->get_person_fio($document->person_id)."<br>".nl2br($this->company_model->get_person_phone($document->person_id));
		  						
		  					}
		  				   else 
		  				    { echo "На&nbsp;ресепшн"; } ?>
		  		    <? if ($document->backcall_id)  ?></td>
		  			<td><? echo $document->notes; ?>
		  			<? if ($document->backcall_id) {
		  				$user = $this->user_model->get_user_data($document->backcall_id);
		  				echo "<br><br><span class='label label-inverse'>Отзвониться:</span><br>$user->name&nbsp;$user->surname<br>$user->phone";
		  			} ?>
		  			</td>
		  			<td style='width: 15%;'>&nbsp;</td>	   
		  		</tr>
		  	<? } ?>
		  
		  </tbody>
		</table>
        
</div>