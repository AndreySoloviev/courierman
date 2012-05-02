<div class="container-fluid">
  <div class="row-fluid">
    <div class="span3">
      <? $this->load->view('agreement/agreement_leftmenu'); ?>
    </div>
    <div class="span9">
    	<h1 style="padding-bottom: 15px;">Договор №<?=$agreement->number?></h1>
    	<p>Контагент &mdash; <? echo $this->company_model->get_company_name($agreement->company_id); ?></p>
    	<p>Подписан &mdash; <? echo $this->useful->date_human_from_mysql($agreement->date_sign); ?></p>      
    	<td><? if ($agreement->is_sent == 0) { ?> <p style="color: red;">Еще не отправлен заказчику</p> <? }
		      		 else if ($agreement->is_returned == 0) { ?> <p style="color: red;">Не возвращен оригинал договора</p> <? } ?></td>  
        <br><br>
        <h2>Приложения</h2>
           
        <a href=/agreement/edit_form/ class="btn btn-small btn-success" style="float: right; clear: both;"><i class='icon-file icon-white'></i> Зарегистрировать новое приложение</a><br><br>
        
        
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
		      <td><?=$apposition->number?></td>		      
		      <td><? echo $this->useful->date_human_from_mysql($apposition->date_sign);?></td>		      
		      <td><? echo $this->user_model->get_user_fio($apposition->user_id); ?></td>
		      <td><? ?>
		      		
		      </td>
		      <td><a href=/agreement/edit_form/<?=$agreement->id?>/>Просмотр</a></td>	     
		      <td></td> 
		    </tr>
		    <? } ?>
		  </tbody>
		</table>
        
    </div>
  </div>
</div>