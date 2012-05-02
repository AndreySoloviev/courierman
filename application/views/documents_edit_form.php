<div class="container-fluid">
  <div class="row-fluid">
    <div class="span3">
      <? $this->load->view('documents_leftmenu'); ?>
    </div>
    <div class="span9">
    	<? if ($doc == null) {?>
    	<h2>Добавление заявки</h2>        
        <? } else { ?>
    	<h2>Редактирование заявки</h2> 
    	<? } ?>
       
        <form class="form-horizontal" style="padding-top: 40px;" method="post" action=/courier/save_document/>
		  <? if ($doc != null) {?> <input type="hidden" name="document_id" value="<?=$doc->id?>"><? }?>
		  
		  <input type="hidden" name="owner_id" value="<?=$this->session->userdata('id');?>">
		  
		  <fieldset>		
		    <div class="control-group">
		      <label class="control-label" for="input01">Дата доставки</label>
		      <div class="controls">
		        <input type="text" class="input-large" id="dp1" name="date" value="<? echo date("d-m-Y"); ?>">	
        
		      </div>
		    </div>
		    
		    <div class="control-group">
		      <label class="control-label" for="input01">Компания</label>
		      <div class="controls">
		      	<select name=company_id class="form_company_sel">
		      		<option></option>
		        	<? 
		        		foreach ($companys as $company) 
		        		{ 
		        			echo "<option value='$company->id' ";
		        			if (@$doc->company_id == $company->id) echo "selected";
		        			echo " >$company->name</option>\n";
		        			echo "$doc->company_id";
		        		} 
		        	?>
		        </select>
		        	        
		      </div>
		    </div>
		    
		    <div class="control-group">
		      <label class="control-label" for="input01">Точнее</label>
		      <div class="controls">
		      	<? if (!@$doc->company_id) { ?>
		      	<select name=person_id  class="form_company_sel" id="person_sel">		      			        	
		        </select>		        	  
		        <? } else { 
		        	echo "<select name=person_id  class='form_company_sel' id='person_sel'>";
		        	
		        	$persons = $this->company_model->get_persons_from_company($doc->company_id);
		        	
		        	foreach ($persons as $person)
		        	{
		        		echo "<option value=$person->id>$person->surname $person->name</option>\n";
		        	}
		        	
		        	echo "</select>";
		        		        
		        } ?>
		              
		      </div>
		    </div>
		    
		    <div class="control-group">
		      <label class="control-label" for="input01">Дополнительные сведения</label>
		      <div class="controls">
		        <textarea name=notes style="width: 80%; height: 150px;"><?=@$doc->notes?></textarea>		        
		      </div>
		    </div>
		    
		  		    
			<div class="control-group">
		      <label class="control-label" for="input01">Кому отзвониться?</label>
		      <div class="controls">
		      	<select name=backcall_id>
		      		<option>Никому не надо</option>
		        	<? foreach ($users as $user) { 
		        	echo "<option value='$user->id' ";
		        	if (@$doc->backcall_id == $user->id) { echo "selected"; }
		        	echo ">$user->surname $user->name</option>\n"; } ?>
		        </select>		        	        
		      </div>
		    </div>
                       
            <div class="form-actions">
            <button type="submit" class="btn btn-primary">Сохранить изменения</button>
          </div>
          
          </div>
		    
		    
		  </fieldset>
		</form>
		<? if ($doc != null) {?> <div style="float: right;"><a href=/courier/delete_document/<?=$doc->id?>/>Удалить заявку</div> <? }?>

        <div style="float: right;"><a href=/courier/delete_document/Удалить заявку</div>
    </div>
  </div>
</div>

<script type="text/javascript">
   
    $(document).ready(function(){
        $(".form_company_sel").change(function(event){
            event.preventDefault();
            formCityAjaxValue( $('.form_company_sel').val() );
        });
    });

    function formCityAjaxValue(country_id)
    {
        $(".form_person_sel").attr('disabled', 'true');

        $.ajax({
            type: "POST",
            url: "/ajax/persons_select/"+ country_id,
            data: "",
            success: function(msg){
                $('.form_person_sel').replaceWith(msg);
                $('#person_sel').replaceWith(msg);
            }
        });
    }
</script> 



<script>
		$(function(){
			//window.prettyPrint && prettyPrint();
			$('#dp1').datepicker({
				format: 'dd-mm-yyyy',
				weekStart: 1
			});
			
		});
	</script>
	