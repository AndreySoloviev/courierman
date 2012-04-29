<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <ul class="nav">
		  <? if (@$this->session->userdata["flags"] & U_COURIER) { echo "<li><a href=/courier>Курьер</a></li>"; } ?>
		  <li><a href="/bookings">Букинги</a></li>
		  <li><a href="/users">Пользователи</a></li>
	  </ul>
    </div>
  </div>
</div>
