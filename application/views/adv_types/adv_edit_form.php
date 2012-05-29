<div class="container-fluid">
  <div class="row-fluid">
    <div class="span3">
      <? $this->load->view('/adv_types/adv_types_leftmenu'); ?>
    </div>
    <div class="span9">
    	<? if ($adv_type == null) {?>
    	<h2>Добавление нового рекламного формата</h2>        
        <? } else { ?>
    	<h2>Редактирование рекламного формата</h2> 
    	<? } ?>
    	        
        <form class="form-horizontal" style="padding-top: 40px;" method="post" action=/adv_types/save/>
		  <? if ($adv_type != null) {?> <input type="hidden" name="id" value="<?=$adv_type->id?>"><? }?>
		  
		  <fieldset>		
		    <div class="control-group">
		      <label class="control-label" for="input01">Название формата</label>
		      <div class="controls">
		        <input type="text" class="input-xxlarge" id="input01" name="name" value="<?=@$adv_type->name?>">		        
		      </div>
		    </div>
		    
		    <div class="control-group">
		      <label class="control-label" for="input01">Описание формата</label>
		      <div class="controls">
		        <textarea name=description style="width: 90%; height: 150px;"><?=@$adv_type->description?></textarea>	        
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