
    	<form class="well form-inline">
		  <select class="input-medium">
		  	<option>Дата бронирования</option>
		  	<option>Начало кампании</option>
		  	<option>Конец компании</option>
		  	<option>Дата закрытия</option>
		  </select>
		  c <input type="text" class="input-small" id="dp1" value="<?=date("d-m-Y", strtotime("today - 1 week"));?>">
		  по <input type="text" class="input-small"  id="dp2" value="<?=date("d-m-Y", strtotime("today + 1 day"));?>">
		  тип <input type="password" class="input-small" placeholder="Password">
		  
		  <button type="submit" class="btn">Отфильтровать</button>
		</form>
		
		<script>
		$(function(){
			//window.prettyPrint && prettyPrint();
			$('#dp1').datepicker({
				format: 'dd-mm-yyyy',
				weekStart: 1
			});
			
			$('#dp2').datepicker({
				format: 'dd-mm-yyyy',
				weekStart: 1
			});
			
		});
		</script>
