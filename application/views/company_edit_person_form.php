<div class="container-fluid">
  <div class="row-fluid">
    <div class="span3">
      <? $this->load->view('documents_leftmenu'); ?>
    </div>
    <div class="span9">
    <h1 style="padding-bottom: 15px;"><?=$company->name?></h1>
    	<p><? echo nl2br($company->phone);?></p>
    	<p><? echo nl2br($company->address);?></p> 
    	    
    	<? if ($person == null) {?>
    	<h2 style='padding:15px 0px 0px 0px'>Добавление сотрудника</h2>        
        <? } else { ?>
    	<h2 style='padding:15px 0px 0px 0px'>Редактирование сотрудника</h2> 
    	<? } ?>
    	        
        <form class="form-horizontal" style="padding-top: 40px;" method="post" action=/companys/save_person/>
		  <input type="hidden" name="company_id" value="<?=$company->id?>">
		  <? if ($person != null) {?> <input type="hidden" name="person_id" value="<?=$person->id?>"><? }?>
		  
		  <fieldset>		
		    <div class="control-group">
		      <label class="control-label" for="input01">Имя</label>
		      <div class="controls">
		        <input type="text" class="input-large" id="input01" name="name" value="<?=@$person->name?>">		        
		      </div>
		    </div>
		    
		    <div class="control-group">
		      <label class="control-label" for="input01">Фамилия</label>
		      <div class="controls">
		        <input type="text" class="input-large" id="input01" name="surname" value="<?=@$person->surname?>">		        
		      </div>
		    </div>
		    
		    <div class="control-group">
		      <label class="control-label" for="input01">Должность</label>
		      <div class="controls">
		        <input type="text" class="input-large" id="input01" name="position" value="<?=@$person->position?>">		        
		      </div>
		    </div>
		    
		    <div class="control-group">
		      <label class="control-label" for="input01">e-mail</label>
		      <div class="controls">
		        <input type="text" class="input-xlarge" id="input01" name="email" value="<?=@$person->email?>">		        
		      </div>
		    </div>
		    
		    <div class="control-group">
		      <label class="control-label" for="input01">Телефоны</label>
		      <div class="controls">
		        <textarea name=phone style="width: 40%; height: 60px;"><?=@$person->phone?></textarea>	        
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