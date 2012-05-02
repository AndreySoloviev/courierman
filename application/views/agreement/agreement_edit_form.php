<div class="container-fluid">
  <div class="row-fluid">
    <div class="span3">
      <? $this->load->view('agreement/agreement_leftmenu'); ?>
    </div>
    
    <div class="span9">
    
    	<? if ($agreement == null) {?>
    	<h2>Регистрация нового договора</h2>        
        <? } else { ?>
    	<h2>Редактирование договора</h2> 
    	<? } ?>
    	        
        <form class="form-horizontal" style="padding-top: 40px;" method="post" action=/agreement/save_agreement/>
		  
		  <? if ($agreement != null) {?> <input type="hidden" name="id" value="<?=$agreement->id?>"><? }?>
		  
		  <fieldset>		
		    <div class="control-group">
		      <label class="control-label" for="input01">Компания</label>
		      <div class="controls">
		        <select name=company_id class="form_company_sel">
		      		<option>-- Выберите компанию --</option>
		        	<? 
		        		$companys = $this->company_model->get_companys_list();
		        		foreach ($companys as $company) 
		        		{ 
		        			echo "<option value='$company->id' ";
		        			if (@$agreement->company_id == $company->id) echo "selected";
		        			echo " >$company->name</option>\n";
		        			echo "$doc->company_id";
		        		} 
		        	?>
		        </select>		        
		      </div>
		    </div>
		    
		    <div class="control-group">
		      <label class="control-label" for="input01">Номер</label>
		      <div class="controls">
		        <input type="text" class="input-medium" id="input01" name="number" value="<?=@$agreement->number?>">		        
		      </div>
		    </div>
		    
		    <div class="control-group">
		      <label class="control-label" for="input01">Дата заключения</label>
		      <div class="controls">
		        <input type="text" class="input-small" id="dp1" name="date_sign" value="
		        <?
		        	if (@$agreement->date_sign) {
		        		echo @$agreement->date_sign;
		        	}
		        	else {
		        		echo date("d-m-Y");
		        	}
		        ?>">		        
		      </div>
		    </div>
		    
		    
		    <div class="control-group">
		      <label class="control-label" for="input01">Статус</label>
		      <div class="controls">
              <label class="checkbox">
                <input type="checkbox" id="optionsCheckbox" name="is_sent" <? if (@$agreement->is_sent == 1) { echo " checked "; } ?>>
                Отправлен заказчику
              </label>
            </div>
            
            <div class="controls">
              <label class="checkbox">
                <input type="checkbox" id="optionsCheckbox" name="is_returned" <? if (@$agreement->is_returned == 1) { echo " checked "; } ?>>
                Оригинал получен обратно
              </label>
            </div>

		      
		    </div>
		    
		        
            <div class="form-actions">
            <button type="submit" class="btn btn-primary">Сохранить изменения</button>
          </div>
          
          </div>
		    
		    
		  </fieldset>
		</form>
        
    </div>
  </div>
</div>
	<script>
		$(function(){
			$('#dp1').datepicker({
				format: 'dd-mm-yyyy',
				weekStart: 1
			});
			
		});
	</script>