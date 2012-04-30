<div class="container-fluid">
  <div class="row-fluid">
    <div class="span3">
      <? $this->load->view('documents_leftmenu'); ?>
    </div>
    <div class="span9">
    	<h2 style="padding-bottom: 15px;">Компании-корреспонденты</h2>        
        <table class="table table-striped">
		  <tbody>
		    <? foreach ($companys as $company) { ?>
		    <tr>
		      <td><?=$company->name?></td>
		      <td> 
		      	<i class=icon-user></i> <a href=/companys/show_company/<?=$company->id?>/>Контакты</a>
		      </td>
		      <td> 
		      	<i class=icon-pencil></i> <a href=/companys/edit_form/<?=$company->id?>/>Редактировать компанию</a>
		      </td>
		    </tr>
		    <? } ?>
		  </tbody>
		</table>
        
    </div>
  </div>
</div>