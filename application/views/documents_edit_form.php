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
    	        
        <form class="form-horizontal" style="padding-top: 40px;" method="post" action=/users/save_user>
		  <? if ($doc != null) {?> <input type="hidden" name="id" value="<?=$doc->id?>"><? }?>
		  
		  <fieldset>		
		    <div class="control-group">
		      <label class="control-label" for="input01">Дата доставки</label>
		      <div class="controls">
		        <input type="text" class="input-large" id="dp1" name="date" value="02-16-2012">	
        
		      </div>
		    </div>
		    
		    <div class="control-group">
		      <label class="control-label" for="input01">Компания</label>
		      <div class="controls">
		        <input type="text" class="input-large" id="input01" name="surname" value="<?=@$doc->company_id?>">		        
		      </div>
		    </div>
		    
		    <div class="control-group">
		      <label class="control-label" for="input01">Дополнительные сведения</label>
		      <div class="controls">
		        <textarea style="width: 80%;"><?=@$doc->email?></textarea>		        
		      </div>
		    </div>
		    
		  		    
			<div class="control-group">
            <label class="control-label" for="optionsCheckbox">Флаги</label>
            <div class="controls">
              <label class="checkbox">
                <input type="checkbox" id="optionsCheckbox" name="is_courier" <? if (@$user->flags & U_COURIER) { echo " checked "; } ?>>
                Надо отзвонитьсся
              </label>
            </div>
            
            <div class="controls">
              <label class="checkbox">
                <input type="checkbox" id="optionsCheckbox" name="is_manager" <? if (@$user->flags & U_MANAGER) { echo " checked "; } ?>>
                Получить документы от них
              </label>
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
			//window.prettyPrint && prettyPrint();
			$('#dp1').datepicker({
				format: 'dd-mm-yyyy',
				weekStart: 1
			});
			
		});
	</script>
	