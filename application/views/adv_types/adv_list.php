<div class="container-fluid">
  <div class="row-fluid">
    <div class="span3">
      <? $this->load->view('/adv_types/adv_types_leftmenu'); ?>
    </div>
    <div class="span9">
    	<h2 style="padding-bottom: 15px;">Типы размещений</h2>        
        <table class="table table-striped">
		  <tbody>
		    <? foreach ($adv_types as $adv_type) { ?>
		    <tr>
		      <td><a href=/adv_types/edit_form/<?=$adv_type->id?>/><?=$adv_type->name?></a></td> 
		    </tr>
		    <? } ?>
		  </tbody>
		</table>
        
    </div>
  </div>
</div>
