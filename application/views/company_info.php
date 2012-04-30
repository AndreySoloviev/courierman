<div class="container-fluid">
  <div class="row-fluid">
    <div class="span3">
      <? $this->load->view('documents_leftmenu'); ?>
    </div>
    <div class="span9">
    	<h1 style="padding-bottom: 15px;"><?=$company->name?></h1>
    	<p><? echo nl2br($company->phone);?></p>
    	<p><? echo nl2br($company->address);?></p> 
    	       
        <h2 style="padding:15px 0px;">Сотрудники</h2>
        <table class="table table-striped">
		  <tbody>
		    <? foreach ($persons as $person) { ?>
		    <tr>
		      <td><?=$person->surname?> <?=$person->name?> <a href=/companys/edit_person_form/<?=$company->id?>/<?=$person->id?>/><i class=icon-pencil></i></a></td>
		      <td><?=$person->position?></td>
		      <td><a href=mailto:<?=$person->email?>><?=$person->email?></a><br><? echo nl2br($person->phone); ?></td>
		    </tr>
		    <? } ?>
		  </tbody>
		</table>
		
		<i class=icon-plus></i> <a href=/companys/edit_person_form/<?=$company->id?>>Добавить сотрудника</a>
        
    </div>
  </div>
</div>