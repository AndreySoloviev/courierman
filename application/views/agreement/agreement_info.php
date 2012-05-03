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
    		Договор №<?=$agreement->number?> 
 		 </li>
		</ul>
    
    	<h1 style="padding-bottom: 15px;">Договор №<?=$agreement->number?></h1>
    	<p>Контагент &mdash; <? echo $this->company_model->get_company_name($agreement->company_id); ?></p>
    	<p>Подписан &mdash; <? echo $this->useful->date_human_from_mysql($agreement->date_sign); ?></p>      
    	<? if ($agreement->is_sent == 0) { ?> <p style="color: red;">Еще не отправлен заказчику</p> <? }
		      		 else if ($agreement->is_returned == 0) { 
		      		 	?> <p style="color: red;">Не возвращен оригинал договора</p> <? } 
		      		 else {
		      		 	echo "<p style='color: green;'>Договор подписан, оригинал возвращен.</p>";
		      		 }?>  
        <p><i class=icon-pencil></i> <a href=/agreement/edit_form/<?=$agreement->id?>/>Редактировать</a></p>
        <br><br>
        <h2>Приложения</h2>
           
        <a href=/agreement/edit_apposition_form/<?=$agreement->id?>/ class="btn btn-small btn-success" style="float: right; clear: both;"><i class='icon-file icon-white'></i> Зарегистрировать новое приложение</a><br><br>
        
        
        <table class="table table-bordered">
		<thead>
			<tr>
				<th>Номер</th>
				<th>Дата подписания</th>
				<th>Менеджер</th>
				<th>Дата выставления счета</th>
				<th>Дата акта и счета-фактуры</th>
				<th>Статус документов</th>				
			</tr>
		</thead>
		  <tbody>
		    <? foreach ($appositions as $apposition) { ?>
		    <tr>
		      <td><a href=/agreement/edit_apposition_form/<?=$agreement->id?>/<?=$apposition->id?>/><?=$apposition->number?></a></td>		      
		      <td><? echo $this->useful->date_human_from_mysql($apposition->sign_date);?></td>		      
		      <td><? if ($apposition->user_id != "0") {
		      			echo $this->user_model->get_user_fio($apposition->user_id);
		      			}
		      			else
		      			{
		      				echo "&mdash;";
		      			} ?></td>
		      <td><? 
		      		if ($apposition->invoice_date != "0000-00-00")
		      		{
		      			echo $this->useful->date_human_from_mysql($apposition->invoice_date);
		      		}
		      		else
		      		{
		      			echo "&mdash;";
		      		}
		      
		      ?>
		      <br>
		      <? 
		      		if ($apposition->payment_date == "0000-00-00" || $apposition->payment_date == "")
		      		{
		      			echo "<span style='color: red'>Не оплачен</span>";
		      			
		      		}
		      		else
		      		{
		      			echo "Оплачен ".$this->useful->date_human_from_mysql($apposition->payment_date);
		      		}		      
		      ?>
		      		
		      </td>
		      <td>
		      <? 
		      		if ($apposition->statement_date != "0000-00-00")
		      		{
		      			echo $this->useful->date_human_from_mysql($apposition->statement_date);
		      		}
		      		else
		      		{
		      			echo "&mdash;";
		      		}		      
		      ?>
		       <br>
		      <? 
		      		if ($apposition->is_statement_signed == 0)
		      		{
		      			echo "<span style='color: red'>Не сформирован</span>";
		      		}
	      
		      ?>

		      
		      </td>	     
		      <td>
		      <?
		      		if ($apposition->is_statement_signed == 1)
		      		{
		      			if ($apposition->is_statement_returned == 1)
		      			{
		      				echo "<span color='green;'>Оригиналы закрывающих возвращены.</span>";
		      			}
		      			else
		      			{
		      				echo "<span color='red;'>Ждем возврата закрывающих</span>";
		      			}
		      		}
		      		else
		      		{
		      			echo "Ожидаем формирование закрывающих";
		      		}
		      ?>
		      </td> 
		    </tr>
		    <? } ?>
		  </tbody>
		</table>
        
    </div>
  </div>
</div>