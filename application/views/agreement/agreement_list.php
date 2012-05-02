<div class="container-fluid">
  <div class="row-fluid">
    <div class="span3">
      <? $this->load->view('agreement/agreement_leftmenu'); ?>
    </div>
    <div class="span9">
    	<h2 style="padding-bottom: 15px;">Договора</h2>        
           
        <a href=/agreement/edit_form/ class="btn btn-small btn-success" style="float: right; clear: both;"><i class='icon-file icon-white'></i> Зарегистрировать новый договор</a><br><br>
        
        <table class="table table-striped">
		  <tbody>
		    <? foreach ($agreements as $agreement) { ?>
		    <tr>
		      <td><?=$agreement->number?> </td>
		      
		      <td><? if ($agreement->is_sent == 0) { ?> <span class="label label-important">Не отослан</span> <? }
		      		 else if ($agreement->is_returned == 0) { ?> <span class="label label-important">Нам не вернули</span> <? } ?></td>
		      
		      <td><? echo $this->company_model->get_company_name($agreement->company_id); ?></td>
		      <td>Приложений - <? echo $this->agreement_model->get_appositions_count($agreement->id); ?></td>
		      <td><i class='icon-pencil'></i> <a href=/agreement/edit_form/<?=$agreement->id?>/>Редактировать</a></td>	      
		    </tr>
		    <? } ?>
		  </tbody>
		</table>
        
    </div>
  </div>
</div>