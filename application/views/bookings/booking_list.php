<div class="container-fluid">
  <div class="row-fluid">    
    <div class="span12">
    
    <a href=/booking/edit_form/ class="btn btn-small btn-success" style="float: right; clear: both;"><i class='icon-briefcase icon-white'></i> Добавить бронь</a><br><br>
    
	<? $this->load->view("bookings/booking_search_form"); ?>	
		      
        <table class="table table-bordered table-condensed">
		  <tbody>
		    <? foreach ($bookings as $booking) { ?>
		    <tr>
		      <td><?=@$booking->name?></td>
		      <td> 
		      	<i class=icon-user></i> <a href=/companys/show_company/<?=@$booking->id?>/>Контакты</a>
		      </td>
		      <td> 
		      	<i class=icon-pencil></i> <a href=/companys/edit_form/<?=@$booking->id?>/>Редактировать компанию</a>
		      </td>
		    </tr>
		    <? } ?>
		  </tbody>
		</table>
        
    </div>
  </div>
</div>