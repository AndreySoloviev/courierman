<div class="container-fluid">
  <div class="row-fluid">
   <div class="span1">&nbsp;</div>
	<div class="span10">

	<form class="form-horizontal" method="post" action="/booking/save_data">
	  <fieldset>
		<table class="table">
		<tr><td>
		 <div class="control-group">
		      <label class="control-label" for="input01">Название размещения</label>
		      <div class="controls">
		      	<input name="title" style="width: 80%;" value="">
		      </div>
		    </div>

		</td></tr>
		<tr><td>
		    
		    <div class="control-group">
		      <label class="control-label" for="input01">Плательщик</label>
		      <div class="controls">
		        <select name="payer_id">
		        	<option>-- Не задан --</option>
		        	<?php 
		        		foreach ($companys as $company)
		        		{
			        		echo "<option value=$company->id>$company->name</option>\n";
		        		}
		        	?>
		        </select>
		        &nbsp;&nbsp;
		        	<label class="checkbox inline">
		                <input type="checkbox" name="is_our_client" id="inlineCheckbox1" value="option1"> Прямой клиент
		            </label>
		      </div>
		    </div>
		
			     
		    <div class="control-group">
		      <label class="control-label" for="input01">Селлинговый агент</label>
		      <div class="controls">
		        <select name="seller_id">
		        	<option>-- Не задан --</option>
		        	<?php 
		        		foreach ($companys as $company)
		        		{
			        		echo "<option value=$company->id>$company->name</option>\n";
		        		}
		        	?>
		        </select>
		      </div>
		    </div>   
		
			<div class="control-group">
		      <label class="control-label" for="input01">Рекламное агентство</label>
		      <div class="controls">
		        <select name="agency_id">
		        	<option>-- Не задан --</option>
		        	<?php 
		        		foreach ($companys as $company)
		        		{
			        		echo "<option value=$company->id>$company->name</option>\n";
		        		}
		        	?>
		        </select>
		      </div>
		    </div>
		    
		   
		      </div>
		    </div>
		
		</td></tr>   
		<tr><td>
		     
		    <div class="control-group">
		      <label class="control-label" for="input01">Тип размещения</label>
		      <div class="controls">
		        <select name="adv_type_id">
		        
		        <option>-- Не задан --</option>
		        	<?php 
		        		foreach ($adv_types as $adv_type)
		        		{
			        		echo "<option value=$adv_type->id>$adv_type->name</option>\n";
		        		}
		        	?>
		        </select>
		        &nbsp;&nbsp;
		        <div class="input-prepend">
		             <span class="add-on">Количество показов</span><input name=imp_count class="input-small" id="prependedInput" size="10" type="text">
		        </div>&nbsp;&nbsp;
		      </div>
		    </div>
		
		</td></tr>   
		<tr><td>
		 
			<div class="control-group">
		      <label class="control-label" for="input01">Сроки</label>
		      <div class="controls">
		        <div class="input-prepend">
		             <span class="add-on">Старт</span><input name="date_start" class="input-small" id="dp1" size="10" type="text">
		        </div>&nbsp;&nbsp;
		        <div class="input-prepend">
		             <span class="add-on">Финиш</span><input name="date_stop" class="input-small" id="dp2" size="10" type="text">
		        </div>&nbsp;&nbsp;
		        <div class="input-prepend">
		             <span class="add-on">Дата закрытия</span><input name="date_close" class="input-small" id="dp3" size="10" type="text">
		        </div>
		      </div>
		    </div>
		
		</td></tr>   
		<tr><td>
		     
		    <div class="control-group">
		      <label class="control-label" for="input01">Стоимость</label>
		      <div class="controls">
		        <div class="input-prepend">
		             <span class="add-on">Прайс</span><input name="price_price" class="input-small" id="prependedInput" size="14" type="text">
		        </div>&nbsp;&nbsp;
		        <div class="input-prepend">
		             <span class="add-on">Скидка %</span><input name="price_discount" style="width: 30px;" id="prependedInput" size="3" type="text">
		        </div>&nbsp;&nbsp;
		        <div class="input-prepend">
		             <span class="add-on">Подитог</span><input class="input-small" id="prependedInput" size="14" type="text">
		        </div>&nbsp;&nbsp;
		        <div class="input-prepend">
		             <span class="add-on">Селлинг %</span><input name="price_selling_discount" style="width: 30px;" id="prependedInput" size="10" type="text">
		        </div>&nbsp;&nbsp;
		        <div class="input-prepend">
		             <span class="add-on">Итого</span><input class="input-small" id="prependedInput" size="14" type="text">
		        </div>&nbsp;&nbsp;
		
		      </div>
		    </div>
		
		</td></tr>  
		<tr><td>
		     
		    <div class="control-group">
		      <label class="control-label" for="input01">Менеждер</label>
		      <div class="controls">
		        <select name="manager_id">
		        	<option>-- Не задан --</option>
		        	<?php 
		        		foreach ($users as $user)
		        		{
			        		echo "<option value=$user->id>$user->surname $user->name</option>\n";
		        		}
		        	?>
		        </select>
		        &nbsp;&nbsp;		        
		      </div>
		    </div>
		
		</td></tr>
		
		<tr><td>		     
		    <div class="control-group">
		      <label class="control-label" for="input01">Договор и приложения</label>
		      <div class="controls">			     
	            
	             <div id=agreementText style="padding: 6px 0px;">Приложение не указано</div>
	             
	             <div><a href=# onclick="showBox()">Редактировать</a></div>
	             <input type="hidden" id="apposition_id" name="apposition_id" value="">
	             
	             <div id="doc_select_box" style="display: none;">
	             
	             <select id="doc_company" class="doc_company">
		            <option>-- Выберите компанию --</option>
		        	<?php 
		        		foreach ($companys_with_agreement as $company)
		        		{
			        		echo "<option value=$company->id>$company->name</option>\n";
		        		}
		        	?>
		        </select>
		        
		        <select id="doc_agreement" class="doc_agreement" style="display:none">	        	
		        </select>
		        
		        
		        <select id="doc_apposition"  style="display:none">		            
		        </select>
		       
		        <a href=# id=appbtn onclick="setAgreementId()" class=btn style="display: none;">Выбрать</a>
	             </div>
              </div>
		    </div>		    
		    		
		</td></tr>   
		 
		<tr><td>
		     
		    <div class="control-group">
		      <label class="control-label" for="input01">Примечания</label>
		      <div class="controls">
		        <textarea name="notes" style="width: 80%; height: 100px;"></textarea>	        
		      </div>
		    </div>
		
		</td></tr> 
		 
		 
		</table>
		
		 <div class="form-actions">
            <button type="submit" class="btn btn-primary">Сохранить изменения</button>
          </div>
	 
	  </fieldset>
	</form>
</div>
</div>
</div>

<script type="text/javascript">
    
    $(document).ready(function(){
        $("#doc_company").bind('change', formCityAjaxValue);     
    });
   

    function formCityAjaxValue()
    {        
        $.ajax({
            type: "POST",
            url: "/ajax/dogovor_select/"+ $('#doc_company').val(),
            data: "",
            success: function(msg){            	               
                $('#doc_agreement').html(msg);
                $('#doc_agreement').css('display', 'inline');
                $('#doc_agreement').bind('change', formAppositionsAjaxValue);
           }
        });
    }
    
    function formAppositionsAjaxValue()
    {  
        
        $.ajax({
            type: "POST",
            url: "/ajax/apposition_select/"+ $('#doc_agreement').val(),
            data: "",
            success: function(msg){            	
                $('#doc_apposition').replaceWith(msg);
                $('#doc_apposition').css('display', 'inline');
                $('#appbtn').css('display', 'inline');
            }
        });
        
    }


    
    function showBox()
    {
	    $("#doc_select_box").css('display', 'inline');	    
    }
    
    function setAgreementId()
    {
	 	
	 	if ($('#doc_apposition').val() == "0")
	 	{
		 	alert("Вы не выбрали номери приложения!");
	 	}
	 	else
	 	{
	 		$("#doc_select_box").css('display', 'none');   	    
	 		$("#agreementText").html(
	 			"Приложение №" + $('#doc_apposition option:selected').html() + " к договору №" + $('#doc_agreement option:selected').html() + " (" + $('#doc_company option:selected').html() + ")"
	 		);		 	
	 		$("#apposition_id").val( $("#doc_apposition").val() );
	 	}

    }
    

		$(function(){
			$('#dp1').datepicker({
				format: 'dd-mm-yyyy',
				weekStart: 1
			});
			
		});
		
		$(function(){
			$('#dp2').datepicker({
				format: 'dd-mm-yyyy',
				weekStart: 1
			});
			
		});
		
		$(function(){
			$('#dp3').datepicker({
				format: 'dd-mm-yyyy',
				weekStart: 1
			});
			
		});
	
</script>