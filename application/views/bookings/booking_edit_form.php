<div class="container-fluid">
  <div class="row-fluid">
   <div class="span1">&nbsp;</div>
	<div class="span10">

	<form class="form-horizontal">
	  <fieldset>
		<table class="table">
		<tr><td>
		    
		    
		    <div class="control-group">
		      <label class="control-label" for="input01">Плательщик</label>
		      <div class="controls">
		        <select name="payer">
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
		                <input type="checkbox" id="inlineCheckbox1" value="option1"> Прямой клиент
		            </label>
		      </div>
		    </div>
		
			     
		    <div class="control-group">
		      <label class="control-label" for="input01">Селлинговый агент</label>
		      <div class="controls">
		        <select name="payer">
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
		        <select name="payer">
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
		        <select name="payer">
		        
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
		             <span class="add-on">Количество показов</span><input class="input-small" id="prependedInput" size="10" type="text">
		        </div>&nbsp;&nbsp;
		      </div>
		    </div>
		
		</td></tr>   
		<tr><td>
		 
			<div class="control-group">
		      <label class="control-label" for="input01">Сроки</label>
		      <div class="controls">
		        <div class="input-prepend">
		             <span class="add-on">Старт</span><input class="input-small" id="dp1" size="10" type="text">
		        </div>&nbsp;&nbsp;
		        <div class="input-prepend">
		             <span class="add-on">Финиш</span><input class="input-small" id="dp2" size="10" type="text">
		        </div>&nbsp;&nbsp;
		        <div class="input-prepend">
		             <span class="add-on">Дата закрытия</span><input class="input-small" id="dp3" size="10" type="text">
		        </div>
		      </div>
		    </div>
		
		</td></tr>   
		<tr><td>
		     
		    <div class="control-group">
		      <label class="control-label" for="input01">Стоимость</label>
		      <div class="controls">
		        <div class="input-prepend">
		             <span class="add-on">Прайс</span><input class="input-small" id="prependedInput" size="14" type="text">
		        </div>&nbsp;&nbsp;
		        <div class="input-prepend">
		             <span class="add-on">Скидка %</span><input style="width: 30px;" id="prependedInput" size="3" type="text">
		        </div>&nbsp;&nbsp;
		        <div class="input-prepend">
		             <span class="add-on">Подитог</span><input class="input-small" id="prependedInput" size="14" type="text">
		        </div>&nbsp;&nbsp;
		        <div class="input-prepend">
		             <span class="add-on">Селлинг %</span><input style="width: 30px;" id="prependedInput" size="10" type="text">
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
		        <select name="payer">
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
	             <div id=agreementText>Приложение не указано</div>
	             <div><a href=# onclick="showBox()">Выбрать договор и приложение</a></div>
	             
	             <div id="doc_select_box" style="display: none;">
	             
	             <select name="payer" id="doc_company" class="doc_company">
		            <option>-- Выберите компанию --</option>
		        	<?php 
		        		foreach ($companys_with_agreement as $company)
		        		{
			        		echo "<option value=$company->id>$company->name</option>\n";
		        		}
		        	?>
		        </select>
		        
		        <select name="payer1" id="doc_dogovor_number" class="doc_dogovor_number" style="display:none">
		            <option>-- Укажите номер договора --</option>		        	
		        </select>
		        
		        
		        <select name="payer2" id="doc_agreement" class=doc_agreement style="display:none">
		            
		        </select>
		        <a href=# onclick="setAgreementId()" class=btn>Выбрать</a>
	             </div>
              </div>
		    </div>		    
		    		
		</td></tr>   
		 
		</table>
	 
	  </fieldset>
	</form>
</div>
</div>
</div>

<script type="text/javascript">
    
    $(document).ready(function(){
      
        $(".doc_company").change(function(event){
            event.preventDefault();
            formAgreementAjaxValue( $('.doc_company').val() );
        });
    
        $("#agreement_number").change(function(event){
            alert("s");
            event.preventDefault();
            formAppositionAjaxValue( $('.agreement_number').val() );
        });
        
    });
   

    function formAgreementAjaxValue(company_id)
    {        
        $("#doc_dogovor_number").attr('disabled', 'true');

        $.ajax({
            type: "POST",
            url: "/ajax/dogovor_select/"+ company_id,
            data: "",
            success: function(msg){            	

                $('.doc_dogovor_number').replaceWith(msg);
                $('#doc_dogovor_number').replaceWith(msg);
                $('#doc_dogovor_number').css('display', 'block');
               
            }
        });
    }

  
    function formAppositionAjaxValue(agreement_id)
    {
    	alert("2");
        $.ajax({
            type: "POST",
            url: "/ajax/apposition_select/"+ agreement_id,
            data: "",
            success: function(msg){            	
                $('.doc_agreement').replaceWith(msg);
                $('#doc_agreement').replaceWith(msg);
                $('#doc_agreement').css('display', 'block');
            }
        });
    }


    
    function showBox()
    {
	    $("#doc_select_box").css('display', 'block');	    
    }
    
    function setAgreementId()
    {
	 	$("#doc_select_box").css('display', 'none');   
	    $("#agreementText").replaceWith("Задали!");
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