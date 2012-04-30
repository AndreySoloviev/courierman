<div class="container-fluid">
  <div class="row-fluid">
    <div class="span3">
      <? $this->load->view('documents_leftmenu'); ?>
    </div>
    <div class="span9">
    	<? if ($company == null) {?>
    	<h2>Добавление компании</h2>        
        <? } else { ?>
    	<h2>Редактирование компании</h2> 
    	<? } ?>
    	        
        <form class="form-horizontal" style="padding-top: 40px;" method="post" action=/companys/save_company/>
		  <? if ($company != null) {?> <input type="hidden" name="id" value="<?=$company->id?>"><? }?>
		  
		  <fieldset>		
		    <div class="control-group">
		      <label class="control-label" for="input01">Название компании</label>
		      <div class="controls">
		        <input type="text" class="input-large" id="input01" name="name" value="<?=@$company->name?>">		        
		      	 <span class="help-block">Краткое название, например, "Соль", "Адривер"</span>
		      </div>
		    </div>
		    
		    <div class="control-group">
		      <label class="control-label" for="input01">Телефон</label>
		      <div class="controls">
		        <input type="text" class="input-large" id="input01" name="phone" value="<?=@$company->phone?>">		        
		        <span class="help-block">Общий телефон компании, приемной</span>
		      </div>
		    </div>
		    
		    <div class="control-group">
		      <label class="control-label" for="input01">Адрес</label>
		      <div class="controls">
		        <textarea name=address style="width: 60%; height: 150px;"><?=@$company->address?></textarea>	        
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