<div class="container-fluid">
  <div class="row-fluid">
    <div class="span3">
      <? $this->load->view('users_leftmenu'); ?>
    </div>
    <div class="span9">
    	<h2>Пользователи системы</h2>        
        <table class="table table-striped">
		  <tbody>
		    <? foreach ($users as $user) { ?>
		    <tr>
		      <td><?=$user->surname?> <?=$user->name?></td>
		      <td><? if (@$user->flags & U_BANNED) { echo "<span class='label label-inverse'>Отключен</span>"; } else {

		      }
		      ?></td>
		      <td> 
		      	<a href=/users/edit_form/<?=$user->id?>/>Редактировать</a>
		      </td>
		    </tr>
		    <? } ?>
		  </tbody>
		</table>
        
    </div>
  </div>
</div>