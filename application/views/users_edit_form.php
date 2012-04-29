<div class="container-fluid">
  <div class="row-fluid">
    <div class="span3">
      <? $this->load->view('users_leftmenu'); ?>
    </div>
    <div class="span9">
    	<? if ($user == null) {?>
    	<h2>Добавление пользователя</h2>        
        <? } else { ?>
    	<h2>Редактирование пользователя</h2> 
    	<? } ?>
    	        
        <form class="form-horizontal" style="padding-top: 40px;" method="post" action=/users/save_user>
		  <? if ($user != null) {?> <input type="hidden" name="id" value="<?=$user->id?>"><? }?>
		  
		  <fieldset>		
		    <div class="control-group">
		      <label class="control-label" for="input01">Имя</label>
		      <div class="controls">
		        <input type="text" class="input-large" id="input01" name="name" value="<?=@$user->name?>">		        
		      </div>
		    </div>
		    
		    <div class="control-group">
		      <label class="control-label" for="input01">Фамилия</label>
		      <div class="controls">
		        <input type="text" class="input-large" id="input01" name="surname" value="<?=@$user->surname?>">		        
		      </div>
		    </div>
		    
		    <div class="control-group">
		      <label class="control-label" for="input01">e-mail</label>
		      <div class="controls">
		        <input type="text" class="input-xlarge" id="input01" name="email" value="<?=@$user->email?>">		        
		      </div>
		    </div>
		    
		    <div class="control-group">
		      <label class="control-label" for="input01">Пароль</label>
		      <div class="controls">
		        <input type="text" class="input-large" id="input01" name="password" value="<?=@$user->password?>">		        
		      </div>
		    </div>
		    
			<div class="control-group">
            <label class="control-label" for="optionsCheckbox">Флаги</label>
            <div class="controls">
              <label class="checkbox">
                <input type="checkbox" id="optionsCheckbox" name="is_courier" <? if (@$user->flags & U_COURIER) { echo " checked "; } ?>>
                Управление курьером
              </label>
            </div>
            
            <div class="controls">
              <label class="checkbox">
                <input type="checkbox" id="optionsCheckbox" name="is_manager" <? if (@$user->flags & U_MANAGER) { echo " checked "; } ?>>
                Управление своими размещениями
              </label>
            </div>
            
            <div class="controls">
              <label class="checkbox">
                <input type="checkbox" id="optionsCheckbox" name="is_mediaboss" <? if (@$user->flags & U_MEDIABOSS) { echo " checked "; } ?>>
                Управление всеми размещениями
              </label>
            </div>
            
            <div class="controls">
              <label class="checkbox">
                <input type="checkbox" id="optionsCheckbox" name="is_finance" <? if (@$user->flags & U_FINANCE) { echo " checked "; } ?>>
                Бухгалтерия
              </label>
            </div>
            
            <div class="controls">
              <label class="checkbox">
                <input type="checkbox" id="optionsCheckbox" name="is_boss" <? if (@$user->flags & U_BOSS) { echo " checked "; } ?>>
                Администратор
              </label>
            </div>
            
            <div class="controls">
              <label class="checkbox">
                <input type="checkbox" id="optionsCheckbox" name="is_banned"  <? if (@$user->flags & U_BANNED) { echo " checked "; } ?>>
                Отключен от системы
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