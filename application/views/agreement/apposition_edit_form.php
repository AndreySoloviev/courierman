<div class="container-fluid">
  <div class="row-fluid">
    <div class="span3">
      <? $this->load->view('agreement/agreement_leftmenu'); ?>
    </div>
    
    <div class="span9">
        <ul class="breadcrumb">
 		 <li>
    		<a href=/agreement/>Список договоров</a> <span class="divider">/</span>
 		 </li>
 		 <li>
    		<a href=/agreement/agreement_info/<?=$agreement->id?>/>Договор №<?=$agreement->number?></a> <span class="divider">/</span>
 		 </li>
 		 <li>
 			Редактирование приложения   		
  		 </li>
		</ul>
    <h1>Договор №<?=$agreement->number?></h1><br><br>
    
    	<? if ($apposition == null) {?>
    	<h2>Регистрация нового приложения</h2>        
        <? } else { ?>
    	<h2>Редактирование приложения</h2> 
    	<? } ?>
    	        
        <form class="form-horizontal" style="padding-top: 40px;" method="post" action=/agreement/save_apposition/>
		 	<input type="hidden" name="agreement_id" value="<?=$agreement->id?>"> 
		  <? if ($apposition != null) {?> <input type="hidden" name="id" value="<?=$apposition->id?>"><? }?>
		  
		  <fieldset>		
		   
		    <div class="control-group">
		      <label class="control-label" for="input01">Номер приложения</label>
		      <div class="controls">
		        <input type="text" class="input-medium" id="input01" name="number" value="<?=@$apposition->number?>">		        
		      </div>
		    </div>
		    
		     <div class="control-group">
		      <label class="control-label" for="input01">Тип</label>
		      <div class="controls">
		        <select name="type">
		        	<option value=1 <? if (@$apposition->type == 1) echo "selected"; ?>>Типовое приложение</option>
		        	<option value=2 <? if (@$apposition->type == 2) echo "selected"; ?>>Отчет агента</option>
		        	<option value=3 <? if (@$apposition->type == 3) echo "selected"; ?>>Другое</option>
		        </select>		        
		      </div>
		    </div>
		    
		    <div class="control-group">
		      <label class="control-label" for="input01">Дата подписания</label>
		      <div class="controls">
		        <input type="text" class="input-small" id="dp1" name="sign_date" value="<?
		        	if (@$apposition->date_sign != "") {
		        		echo $this->useful->date_from_mysql($apposition->sign_date);
		        	}
		        	else {
		        		echo date("d-m-Y");
		        	}?>">		        
		      </div>
		    </div>
		    
		    <div class="control-group">
		      <label class="control-label" for="input01">Счет</label>
		      <div class="controls">
		        <div class="input-prepend">
		             <span class="add-on">Дата выставления</span><input id="dp2" name="invoice_date" class="input-small" id="prependedInput" size="10" type="text"
		             value="<?
		        	if (@$apposition->invoice_date != "") {
		        		echo $this->useful->date_from_mysql($apposition->invoice_date);
		        	}
		        	?>">
		        </div>&nbsp;&nbsp;
		        <div class="input-prepend">
		             <span class="add-on">Дата оплаты</span><input id="dp3" name="payment_date" class="input-small" id="prependedInput" size="10" type="text"
		             <?
		        	if (@$apposition->payment_date != "") {
		        		echo $this->useful->date_from_mysql($apposition->payment_date);
		        	}
		        	?>>
		        </div>
		        		        	        
		      </div>
		    </div>
		    <div class="control-group">
		      <label class="control-label" for="input01">Закрывающие</label>
		      <div class="controls">
		        <div class="input-prepend">
		             <span class="add-on">Дата формирования</span><input id="dp4" name="statement_date" class="input-small" id="prependedInput" size="10" type="text"
		             value="<?
		        	if (@$apposition->statement_date != "") {
		        		echo $this->useful->date_from_mysql($apposition->statement_date);
		        	}
		        	?>">
		        </div>
		      <br><br>
		      <label class="checkbox">
                <input type="checkbox" id="optionsCheckbox" name="is_statement_signed" <? if (@$agreement->is_statement_signed == 1) { echo " checked "; } ?>>
                Сформированы и высланы
              </label>
              
              <label class="checkbox">
                <input type="checkbox" id="optionsCheckbox" name="is_statement_returned" <? if (@$agreement->is_statement_returned == 1) { echo " checked "; } ?>>
                Оригиналы возвращены
              </label>
		        		        	        
		      </div>
		    </div>
		    
		    <div class="control-group">
		      <label class="control-label" for="input01">Менеждер</label>
		      <div class="controls">
		      	<select name=user_id>
		      		<option>-- указать обязательно --</option>
		        	<? foreach ($users as $user) { 
		        	echo "<option value='$user->id' ";
		        	if (@$apposition->user_id == $user->id) { echo "selected"; }
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
        
    </div>
  </div>
</div>
	<script>
		$(function(){
			$('#dp1').datepicker({
				format: 'dd-mm-yyyy',
				weekStart: 1
			});
			$('#dp2').datepicker({
				format: 'dd-mm-yyyy',
				weekStart: 1
			});
			$('#dp3').datepicker({
				format: 'dd-mm-yyyy',
				weekStart: 1
			});
			$('#dp4').datepicker({
				format: 'dd-mm-yyyy',
				weekStart: 1
			});
			
		});
	</script>