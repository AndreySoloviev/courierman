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

		</ul>
    	
    	<h2 style="padding-bottom: 15px;">Договора</h2>        
           
        <a href=/agreement/edit_form/ class="btn btn-small btn-success" style="float: right; clear: both;"><i class='icon-file icon-white'></i> Зарегистрировать новый договор</a><br><br>
        
        <table class="table table-striped">
		  <tbody>
		    <? foreach ($agreements as $agreement) { ?>
		    <tr>
		      <td><a href=/agreement/agreement_info/<?=$agreement->id?>/><?=$agreement->number?></a></td>
		      
		      
		      
		      <td><? echo $this->company_model->get_company_name($agreement->company_id); ?></td>
		      <td>Приложений - <? echo $this->agreement_model->get_appositions_count($agreement->id); ?></td>
		      <td><? if ($agreement->is_sent == 0) { ?> <span class="label label-important">Договор не отослан</span> <? }
		      		 else if ($agreement->is_returned == 0) { ?> <span class="label label-important">Договор нам не вернули</span> <? } ?>
		      		
		      		<?
		      			if ($this->agreement_model->get_unpayed_agreements_count($agreement->id) > 0)
		      			{
		      				echo "<span class='label label-important'>Неоплаченые счета</span> ";
		      			}
		      			
		      			if ($this->agreement_model->get_unclosed_appositions_count($agreement->id) > 0)
		      			{
		      				echo "<span class='label label-important'>Нет закрывающих</span> ";
		      			}
		      			
		      			if ($this->agreement_model->get_unreturned_appositions_count($agreement->id) > 0)
		      			{
		      				echo "<span class='label label-important'>Нет закрывающих</span> ";
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